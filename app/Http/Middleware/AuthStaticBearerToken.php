<?php

namespace App\Http\Middleware;

use App\Services\ApiResponse;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthStaticBearerToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $bearerToken = $request->bearerToken();
        $validTokens = config('app.bearer_tokens', []);

        if (!in_array($bearerToken, $validTokens, true)) {
            return ApiResponse::error('Unauthorized access', 401);
        }

        return $next($request);
    }
}
