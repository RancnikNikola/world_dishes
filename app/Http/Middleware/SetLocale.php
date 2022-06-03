<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $language = 'en';
        $language = request('lang');

        if (request('lang')) {
            session()->put('lang', request('lang'));
            $language = request('lang');
        }

        if (isset($language) && config('app.languages.' . $language)) {
            app()->setLocale($language);
        }

        app()->setLocale($language);

        return $next($request);
    }
}
