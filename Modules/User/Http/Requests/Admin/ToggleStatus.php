<?php

namespace Modules\User\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ToggleStatus extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => ['required', 'numeric', 'exists:users,id'],
        ];
    }
}
