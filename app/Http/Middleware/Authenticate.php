<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if ($this->auth->guard('admin')->check()) {
                return route('panel.index');
            } else if ($this->auth->guard('web')->check()) {
                return url('/profile');
            }

            if (Route::is('panel.*')) {
                return route('panel.showLogin');
            } else if (Route::is('front.*')) {
                return route('front.auth.showLogin');
            }
        }
    }
}
