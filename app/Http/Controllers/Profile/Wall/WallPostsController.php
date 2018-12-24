<?php

namespace App\Http\Controllers\Profile\Wall;

use App\Comment;
use App\User;
use App\Wall;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WallPostsController extends Controller
{

    public function index(Wall $walls) {
        return view('profile.wall.messages', compact('walls'));
    }

    public function create() {
        return view('profile.wall.create_messages');
    }

    // SHOW WALL MESSAGE
    public function show($user, $wall_message_id) {

        $wall_message = Wall::where('id', $wall_message_id)->firstOrFail();
        $comments = Comment::where('wall_message_id', $wall_message_id)->orderByDesc('created_at')->paginate(5);

        return view('profile.wall.show', compact('comments', 'user', 'wall_message'));
    }

    //
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:3000',
        ]);

        Wall::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('profile.show', $request->user());
    }

    public function wall_message_destroy(Wall $message)
    {
        if ($message->user_id == Auth::id()) {
            $message->delete();
            return back()->with('success', 'Удалено');
        }
        return back()->with('error', 'У Вас нет прав');

//        return redirect()->route('profile.show', Auth::user())->with('warning', 'У Вас нет прав');
    }
}
