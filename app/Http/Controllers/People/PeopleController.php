<?php

namespace App\Http\Controllers\People;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeopleController extends Controller
{
    public function index(Request $request)
    {
        $title = "Люди";
        $query = User::orderByDesc('id');

        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'like', '%' . $value . '%');
        }

        $users = $query->paginate(5);

        return view('users.index', compact('users', 'title'));
    }

    public function show (User $user) {
        return view('users.show', compact('user'));
    }

    public function ajaxRequest(Request $request){

        if ($request->ajax()) {
            $user = User::find($request->user_id);
            $response = auth()->user()->toggleFollow($user);
            return response()->json(['success' => $response]);
        } return redirect('/');
    }
}
