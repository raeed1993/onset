<?php

namespace Modules\Taxonomy\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class Id extends FormRequest
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
        ];
    }
}
