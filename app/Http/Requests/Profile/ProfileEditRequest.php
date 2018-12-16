<?php

namespace App\Http\Requests\Profile;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed user
 */
class ProfileEditRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:users',
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
        ];
    }
}
