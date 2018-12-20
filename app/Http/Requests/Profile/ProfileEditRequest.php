<?php

namespace App\Http\Requests\Profile;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property User user
 */
class ProfileEditRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $user = Auth::user();
        return [
//            'name' => 'required|string|max:255|unique:users,id,' . $userss->id,
            'name' => [
                'required',
                'alpha_dash',
                'string',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
        ];
    }
}
