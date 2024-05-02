<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // جلب معلومات مسجل الدخول
        $auth = auth()->user();

        // التحقق من أن مسجل الدخول موجود وأن دوره يساوي 'admin'
        if ($auth && $auth->role !== 'admin') {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
