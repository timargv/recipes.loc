<?php

namespace App\Http\Controllers\Profile\Wall;

use App\Comment;
use App\User;
use App\Wall;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{

    public function index()
    {
        $comments = Comment::forUser(Auth::user())->orderByDesc('created_at')->paginate(20);
        return view('profile.comments.index', compact('comments'));
    }

    //
    public function store(Request $request, $user, $wall_message_id)
    {

        if ($user != Auth::id()) {
            return redirect()->back()->with('error', 'У вас нет прав');
        }

        $this->validate($request, [
            'body' => 'required|string|max:3000ss',
        ]);

        Comment::create([
            'body' => $request['body'],
            'wall_message_id' => $wall_message_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Комментарий Добавлен');
    }
}
