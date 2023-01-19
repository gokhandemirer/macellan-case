<?php

namespace App\Http\Middleware;

use App\Classes\Utils\HashValidator;
use App\Classes\Utils\ResponseManager;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ValidateRequestHash
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return JsonResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->has('hash') || !HashValidator::requestHashValidator($request->input('hash'))) {
            return ResponseManager::getGenericResponse(status: 403);
        }

        return $next($request);
    }
}
