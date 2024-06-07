<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     */
    public function handle(Request $request, Closure $next, string $permission)
    {
        if (Auth::check() && in_array($permission, Session::get('permissions', []), true)) {
            return $next($request);
        }

        return abort(403);
    }
}
