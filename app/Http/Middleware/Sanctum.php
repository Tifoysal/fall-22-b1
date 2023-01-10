<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Sanctum
{

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return response()->json([
                'message'=>'unauthenticated'
            ]);
        }
    }
}
