<?php

namespace App\Http\Controllers\Profile\Wall;

use App\Comment;
use App\CommentSpam;
use App\CommentVote;
use App\User;
use App\Wall;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Psy\Command\Command;

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
            'reply_id' => 'nullable|integer',
        ]);

        Comment::create([
            'body' => $request['body'],
            'wall_message_id' => $wall_message_id,
            'reply_id' => $request['reply_id'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Комментарий Добавлен');
    }


    public function destroy($user, $wall_message, $comment)
    {

        $comment = Comment::where(['user_id' => $user, 'id' => $comment, 'wall_message_id' => $wall_message])->firstOrFail();

        if ($comment->user_id == Auth::id() || $comment->wall->user_id == Auth::id()) {
            $comment->delete();
            return back()->with('success', 'Удалено');
        }
        return back()->with('error', 'У Вас нет прав');

//        return redirect()->route('profile.show', Auth::user())->with('warning', 'У Вас нет прав');
    }

}
