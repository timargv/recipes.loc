<?php

namespace App\Http\Controllers\Profile;

use App\Http\Requests\Profile\ProfileEditRequest;
use App\UseCases\Profile\ProfileService;
use App\User;
use App\Wall;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

/**
 * @property  service
 */
class ProfileController extends Controller
{
    private $service;

    public function __construct(ProfileService $service)
    {
        $this->service = $service;
    }

    //Моя страница
    public function show(User $user)
    {
        $title = 'Profile';
        $title_wall = 'Wall';
//        $wall_messages = $user->walls()->paginate(10);

        // Подписчики
        $followers_title = 'Подписчики: ' . $user->followers()->count();
        $followers = $user->followers()->get(5);

        // Подписки
        $followings_title = 'Подписки: ' . $user->followings()->count();
        $followings  = $user->followings()->take(6)->get();

        $wall_messages_query = Wall::orderBy('created_at');
        $wall_messages_query->where('user_id', $user->id);
        $wall_messages = $wall_messages_query->paginate(5);

        if ($user == Auth::user()) {
            return view('profile.index', compact('title', 'user', 'title_wall', 'wall_messages', 'followers', 'followers_title', 'followings', 'followings_title'));
        }
        return view('users.show', compact('user', 'title_wall', 'wall_messages', 'followers', 'followers_title', 'followings', 'followings_title'));

    }

    // Новостная лента
    public function feed (Request $request, Wall $wall) {
        $title = 'Лента';
        $user = Auth::user();

        //        $user_id = User::find($request->user()->id);

        $followings = Auth::user()->followings()->get();


        $wall_messages = Wall::where('user_id', '=', [1,2])->paginate(10);


        return view('home', compact('title', 'followings', 'user', 'wall_messages'));
    }


    // Редактирование профиля
    public function edit() {
        $title = 'Edit Profile';
        $user = Auth::user();
        return view('profile.edit', compact('user', 'title'));
    }



    // Обнавление пользователя
    public function update(ProfileEditRequest $request)
    {
        try {
            $this->service->edit(Auth::id(), $request);
        } catch (\DomainException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->route('profile.edit');
    }
}
