<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roleName)
    {
        foreach ($roleName as $role) {
            // Check if user has the role This check will depend on how your roles are set up
            if ($request->user()->role == $role)
                return $next($request);
        }
        return response()->json([
            'success' => false,
            'message' => 'Unauthorized'
        ]);
    }
}
