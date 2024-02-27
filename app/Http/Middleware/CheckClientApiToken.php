<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckClientApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */

//    public function handle(Request $request, Closure $next)
//    {
//        $token = config('api_token.token');
//
//        if ($token !== 'DifficultToken') {
//            return response()->json(['error' => 'Invalid token!'], 401);
//        }
//        return $next($request);
//    }
//}

    public function handle(Request $request, Closure $next): Response
    {
        $token = config(key: 'api_token.token');

        if ($request->header(key: 'Api-Token') !== $token) {
            return \response()->json(['error' => 'Invalid token!'], 401);
        }

        return $next($request);
    }
}
