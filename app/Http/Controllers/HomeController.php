<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::check()) {

            return redirect()->route('feed');

        } return view('auth.login');
    }

    public function feed (Request $request) {

        $title = 'Лента';
        $user = User::find($request->user()->id);
        $followings = $user->followings()->get();
        return view('home', compact('title', 'followings'));
    }


}
