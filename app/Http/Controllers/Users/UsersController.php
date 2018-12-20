<?php

namespace App\Http\Controllers\Users;

use App\UseCases\Users\SearchService;
use App\User;
use App\Wall;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    private $search;

    public function __construct(SearchService $search)
    {
        $this->search = $search;
    }

    // Все пользователи сайта
    public function index(Request $request, User $user)
    {
        // Название Страницы
        $title = "Люди";

        $q = $request->get('search');



        $max_page = 30;
        if (empty($q)) {
            $users = User::orderByDesc('id')->paginate(5);
        } else {
            $users = $this->search->search($q, $max_page);
        }

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
