<?php

namespace Modules\Taxonomy\Http\Requests\Slider;

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
            'link' => ['nullable', 'array'],
            'title-ar' => ['nullable', 'string'],
            'label-ar' => ['nullable', 'string'],
            'title-en' => ['nullable', 'string'],
            'label-en' => ['nullable', 'string'],
            'primary_image' => ['required', 'string'],
        ];
    }
}
