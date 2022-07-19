<?php

namespace Modules\User\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;


class Store extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'email' => ['required','email', 'max:255','unique:users,email'],
            'password' => ['required','min:6'],
            'phone' => ['nullable'],
        ];
    }
}
