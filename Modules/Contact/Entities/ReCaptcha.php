<?php

namespace Modules\Contact\Entities;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class ReCaptcha implements Rule
{

    public function passes($attribute, $value)
    {
        $header = [
            'Accept' => 'application/json'
        ];
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://www.google.com.recaptcha/api/siteverify',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $value,
                'ip' => request()->ip()
            ],
            CURLOPT_HTTPHEADER => $header,
        ));

        $response = curl_exec($curl);

        curl_close($curl);
//        dd($response);
//        $response = Http::post('https://www.google.com.recaptcha/api/siteverify', [
//            'secret' => config('services.recaptcha.secret_key'),
//            'response' => $value,
//            'ip' => request()->ip()
//        ]);
//
//        if ($response->successful() && $response->json('success') && $response->json('score') > config('services.recaptcha.min_score')) {
//            return true;
//        }
//        return  false;
        return $response;
    }

    public function message()
    {
       return 'failed to validate ReCaptcha';
    }
}
