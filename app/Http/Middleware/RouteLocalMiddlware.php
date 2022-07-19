<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RouteLocalMiddlware
{

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $segments = $request->segments();
        session()->put('defaultCurrencyType', 'en');
        session()->save();
        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        }
        if ($segments) {
            if (count($segments) > 1 && $segments[0] == 'set-locale') {
                $referrer = url()->previous();
                return Redirect::to($this->toggleUrl($referrer));
            }
        }
        return $next($request);
    }

    /**
     * @param string $referrer
     * @param string $from
     * @param string $to
     * @return string
     */
    private function getNewUrl(string $referrer, string $from, string $to): string
    {
        if (substr($referrer, -3) == $from) {
            return str_replace('/' . $from, '/' . $to, $referrer);
        }
        return str_replace('/' . $from . '/', '/' . $to . '/', $referrer);
    }

    /**
     * @param string $referrer
     * @return string
     */
    private function toggleUrl(string $referrer): string
    {
        if (app()->getLocale() == 'ar') {
            return $this->getNewUrl($referrer, 'en', 'ar');
        }
        return $this->getNewUrl($referrer, 'ar', 'en');
    }
}
