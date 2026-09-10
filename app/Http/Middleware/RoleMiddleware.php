<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        // 1. Ensure user is authenticated
        if (! $user) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthenticated.'], 401);
            }
            return redirect()->guest(route('login'));
        }

        // 2. Account active status check
        if ($user->status !== 'active') {
            auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->withErrors([
                'email' => 'Your account is inactive or suspended. Please contact operations support.',
            ]);
        }

        // 3. Verify user has at least one of the permitted roles
        if (! in_array($user->role, $roles, true)) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Forbidden. Insufficient permissions.'], 403);
            }

            // Redirect to the user's appropriate portal rather than a broken page
            return match ($user->role) {
                'admin' => redirect()->route('admin.dashboard'),
                'employee' => redirect()->route('portal.dashboard'),
                'customer' => redirect()->route('client.dashboard'),
                default => abort(403, 'Unauthorized portal access.'),
            };
        }

        return $next($request);
    }
}
