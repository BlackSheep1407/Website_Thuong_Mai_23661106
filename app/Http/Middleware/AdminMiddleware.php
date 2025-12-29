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
        $sess = session('user');
        $isAdmin = false;
        if (is_array($sess)) {
            if (isset($sess['user_role']) && $sess['user_role'] == 1) $isAdmin = true;
            if (isset($sess['user_role']) && $sess['user_role'] == '1') $isAdmin = true;
            if (isset($sess[0]) && is_array($sess[0]) && isset($sess[0]['user_role']) && $sess[0]['user_role'] == 1) $isAdmin = true;
        }
        if (!$isAdmin) {
            return response()->view('errors.access-denied', [], 403);
        }
        return $next($request);
    }
}
