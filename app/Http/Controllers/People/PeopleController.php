<?php

namespace App\Http\Controllers\People;

use App\User;
use App\Wall;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PeopleController extends Controller
{
    public function index(Request $request)
    {
        $title = "Люди";
        $query = User::orderByDesc('id');

        if (!empty($value = $request->get('search'))) {
            $query->where('name', 'like', '%' . $value . '%')
                ->orWhere('first_name', 'like', '%' . $value . '%')
            ->orWhere('last_name', 'like', '%' . $value . '%');
        }

        $users = $query->paginate(5);

        return view('users.index', compact('users', 'title'));
    }

    public function show (User $user) {

        $title_wall = 'Wall Messages';
        $followers = $user->followers()->get();
        $followers_count = $user->followers()->count();

        $followings = $user->followings()->take(6)->get();
        $followings_count = $user->followings()->count();


        $wall_messages = Wall::forUser($user)->orderByDesc('updated_at')->paginate(20);

        if ($user != Auth::user()) {
            return view('users.show', compact('user', 'followers', 'followers_count', 'title_wall', 'wall_messages', 'followings', 'followings_count'));
        } return redirect()->route('profile.home');
    }

    public function ajaxRequest(Request $request){

        if ($request->ajax()) {
            $user = User::find($request->user_id);
            $response = auth()->user()->toggleFollow($user);
            return response()->json(['success' => $response]);
        } return redirect('/');
    }
}
