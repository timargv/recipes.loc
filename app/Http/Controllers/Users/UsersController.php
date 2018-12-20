<?php

namespace App\Http\Controllers\Users;

use App\User;
use App\Wall;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    // Все пользователи сайта
    public function index(Request $request)
    {
        // Название Страницы
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

//    // Показать одного пользователя
//    public function show(User $user) {
//
//        $title_wall = 'Wall';
//
//        $wall_messages_query = Wall::orderBy('created_at');
//        $wall_messages_query->where('user_id', $user->id);
//
//
//        $wall_messages = $wall_messages_query->paginate(5);
//
//        return view('users.show', compact('user', 'title_wall', 'wall_messages'));
//    }

    // Подписаться на Пользователя
    public function ajaxRequest(Request $request){

        if ($request->ajax()) {
            $user = User::find($request->user_id);
            $response = auth()->user()->toggleFollow($user);
            return response()->json(['success' => $response]);
        } return redirect('/');
    }
}
