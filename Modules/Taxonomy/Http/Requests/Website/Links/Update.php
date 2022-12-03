<?php

namespace Modules\Taxonomy\Http\Requests\Website\Links;

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
            'instgram-links' => ['required', 'array'],
            'facebook-links' => ['required', 'array'],
            'behance-links' => ['required', 'array'],
            'youtube-links' => ['required', 'array'],
            'linkedin-links' => ['required', 'array'],
            'phone-links' => ['required', 'array'],
            'email-links' => ['required', 'array'],
            'location-links' => ['required', 'array'],
            'location-labels' => ['required', 'array'],
            'ids' => ['array', 'required'],
            'ids.*' => ['numeric', 'exists:taxonomies,id'],

        ];
    }
}
