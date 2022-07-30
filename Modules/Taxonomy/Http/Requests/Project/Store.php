<?php

namespace Modules\Taxonomy\Http\Requests\Project;

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
            'primary-image' => ['nullable', 'string'],
            'status' => ['nullable'],
            'service_id' => ['required', 'numeric', 'exists:taxonomies,id'],
            'links' => ['array', 'nullable'],
            'links.*' => ['required', 'string'],
            'images' => ['array', 'nullable'],
            'images.*' => ['required', 'string'],
            'image_link' => ['array', 'nullable'],
            'image_link.*' => ['nullable', 'string'],
        ];
    }
}
