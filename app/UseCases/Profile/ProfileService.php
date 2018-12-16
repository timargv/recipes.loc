<?php

namespace App\UseCases\Profile;

use App\Http\Requests\Profile\ProfileEditRequest;
use App\User;

class ProfileService
{
    public function edit($id, ProfileEditRequest $request): void
    {
        /** @var User $user */
        $user = User::findOrFail($id);
        $user->update($request->only('name', 'last_name', 'first_name'));
    }
}
