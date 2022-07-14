<?php

namespace Modules\Taxonomy\Http\Requests\Service;

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

            'taxonomy_id' => ['required', 'numeric', 'exists:taxonomies,id'],
            'title-ar' => ['required', 'string'],
            'title-en' => ['required', 'string'],
            'primary-image' => ['string'],
            'status' => ['nullable'],
            'services' => ['array', 'nullable'],
            'services.*.content-ar' => ['required', 'string'],
            'services.*.content-en' => ['required', 'string'],
            'services.*.primary-image' => ['required', 'string'],
        ];
    }
}
