<?php

namespace App\Http\Middleware;

use Closure;

class HttpsProtocol
{
    public function handle($request, Closure $next)
    {
        if (strpos(url('/'), 'www'))
            return redirect()->away('https://alpharabic.com'.$request->getRequestUri(), 301);
        if (!$request->secure())
            return redirect()->secure($request->getRequestUri(), 301);

        return $next($request);
    }
}
