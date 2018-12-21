<?php

namespace App\Http\Controllers\Profile\Wall;

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

    //
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'nullable|string|max:255',
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
