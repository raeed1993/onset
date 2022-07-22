<?php

namespace Modules\Taxonomy\Http\Requests\ClientBig;

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
            'primary-image' => ['string'],
            'status' => ['nullable'],
        ];
    }
}
