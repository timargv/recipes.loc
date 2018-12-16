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

    public function feed () {
        $title = 'Лента';
        return view('home', compact('title'));
    }


}
