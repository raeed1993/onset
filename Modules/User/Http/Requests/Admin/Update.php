<?php

namespace Modules\User\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;


class Update extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => ['required', 'numeric', 'exists:users,id'],
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255','email'],
            'password' => ['nullable'],
            'phone' => ['nullable'],
        ];
    }
}
