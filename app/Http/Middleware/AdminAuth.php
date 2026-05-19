<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Guard admin routes — redirect to login if the session flag is missing.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->session()->get('admin_authenticated')) {
            return redirect()
                ->guest(route('admin.login'))
                ->with('admin.notice', 'Please sign in to access the admin panel.');
        }

        return $next($request);
    }
}
