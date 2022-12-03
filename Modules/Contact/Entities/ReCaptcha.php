<?php

namespace Modules\Contact\Entities;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class ReCaptcha implements Rule
{

    public function passes($attribute, $value)
    {
        $response = Http::asForm()->post('https://www.google.com.recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $value,
            'ip' => request()->ip()
        ]);
        if ($response->successful() && $response->json('success') && $response->json('score') > config('services.recaptcha.min_score')) {
            return true;
        }
        return  false;
    }

    public function message()
    {
       return 'failed to validate ReCaptcha';
    }
}