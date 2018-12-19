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
class HomeController extends Controller
{
    private $service;

    public function __construct(ProfileService $service)
    {
        $this->service = $service;
    }

    public function index (Request $request, User $user) {
        $title = 'Profile';
        $title_wall = 'Wall Messages';
        $user = Auth::user();

        $user_id = User::find($request->user()->id);
        $followers = $user->followers()->get();
        $followers_count = $user->followers()->count();
        $followings = $user_id->followings()->take(6)->get();
        $followings_count = $user_id->followings()->count();

        $wall_messages = Wall::forUser(Auth::user())->orderByDesc('updated_at')->paginate(20);


        if ($wall_messages == null) {
            return view('profile.index', compact('title', 'title_wall', 'followings', 'followings_count', 'followers', 'followers_count'))->with('info', 'У Вас нет Записей');
        } return view('profile.index', compact('title', 'title_wall', 'user', 'wall_messages', 'followings', 'followings_count', 'followers', 'followers_count'));

    }

    public function edit()
    {
        $title = 'Edit';
        $user = Auth::user();
        return view('profile.edit', compact('user', 'title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        Wall::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('profile.home');
    }

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
