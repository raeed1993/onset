<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $locale;

    public function __construct()
    {
        if (request()->segment(1) != 'en')
            $this->locale = 'ar';
        else
            $this->locale = str_replace('_', '-', request()->segment(1));

    }
}
