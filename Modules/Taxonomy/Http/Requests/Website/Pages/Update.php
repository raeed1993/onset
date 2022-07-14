<?php

namespace Modules\Taxonomy\Http\Requests\Website\Pages;

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
            'services-primary-image' => ['required', 'string'],
            'projects-primary-image' => ['required', 'string'],
            'blogs-primary-image' => ['required', 'string'],
            'about-us-primary-image' => ['required', 'string'],
            'contact-us-primary-image' => ['required', 'string'],
            'services-title-ar' => ['required', 'string'],
            'services-title-en' => ['required', 'string'],
            'projects-title-ar' => ['required', 'string'],
            'projects-title-en' => ['required', 'string'],
            'blogs-title-ar' => ['required', 'string'],
            'blogs-title-en' => ['required', 'string'],
            'about-us-title-ar' => ['required', 'string'],
            'about-us-title-en' => ['required', 'string'],
            'contact-us-title-ar' => ['required', 'string'],
            'contact-us-title-en' => ['required', 'string'],
            'services-content-ar' => ['required', 'string'],
            'services-content-en' => ['required', 'string'],
            'projects-content-ar' => ['required', 'string'],
            'projects-content-en' => ['required', 'string'],
            'blogs-content-ar' => ['required', 'string'],
            'blogs-content-en' => ['required', 'string'],
            'about-us-content-ar' => ['required', 'string'],
            'about-us-content-en' => ['required', 'string'],
            'contact-us-content-ar' => ['required', 'string'],
            'contact-us-content-en' => ['required', 'string'],
            'ids' => ['array', 'required'],
            'ids.*' => ['numeric', 'exists:taxonomies,id'],

        ];
    }
}
