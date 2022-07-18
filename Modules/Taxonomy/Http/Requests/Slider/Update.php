<?php

namespace Modules\Taxonomy\Http\Requests\Slider;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'sliders' => ['array', 'required'],
            'sliders.*.link' => ['nullable', 'array'],
            'sliders.*.title-ar' => ['nullable', 'string'],
            'sliders.*.label-ar' => ['nullable', 'string'],
            'sliders.*.title-en' => ['nullable', 'string'],
            'sliders.*.label-en' => ['nullable', 'string'],
            'sliders.*.primary_image' => ['required', 'string'],
        ];
    }
}
