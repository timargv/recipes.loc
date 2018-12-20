<?php

namespace App\Http\Controllers\Users\Wall;

use App\Wall;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WallPostsController extends Controller
{
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

        return redirect()->route('my.home', $request->user());
    }
}
