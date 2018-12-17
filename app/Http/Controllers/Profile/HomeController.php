<?php

namespace App\Http\Controllers\Profile;

use App\Http\Requests\Profile\ProfileEditRequest;
use App\UseCases\Profile\ProfileService;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    public function index (User $id) {
        $title = 'Profile';
        $user = Auth::user();
        return view('profile.index', compact('title', 'user', 'id'));
    }

    public function edit()
    {
        $title = 'Edit';
        $user = Auth::user();
        return view('profile.edit', compact('user', 'title'));
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
