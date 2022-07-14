<?php

namespace Modules\Taxonomy\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [

            'title-ar' => ['required', 'string'],
            'title-en' => ['required', 'string'],
            'primary-image' => ['string'],
            'status' => ['nullable'],
            'content-ar' => ['nullable', 'string'],
            'content-en' => ['nullable', 'string'],
        ];
    }
}
