<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {

        $locale = $request->header('Accept-Language');

        if (in_array($locale, ['uz', 'ru','en'])) {
            app()->setLocale($locale);
        } else {
            app()->setLocale('uz'); 
        }
        return $next($request);
    }
}