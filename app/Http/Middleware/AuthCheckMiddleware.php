<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        dd(session()->all());
        if ($request->is('admin/*') && !auth()->check()) {
            // Kullanıcı giriş yapmamışsa, isteği reddet veya başka bir işlem yapabilirsiniz.
            return redirect()->route('login'); // Örnek olarak login sayfasına yönlendiriyoruz.
        }

        return $next($request);
    }
}
