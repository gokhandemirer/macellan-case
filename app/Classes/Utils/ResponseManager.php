<?php

declare(strict_types=1);

namespace App\Classes\Utils;

use Illuminate\Http\JsonResponse;

abstract class ResponseManager
{
    /**
     * @param string $message
     * @param int $status
     * @param array $extraFields
     * @return JsonResponse
     */
    public static function getGenericResponse(string $message = '', int $status = 200, array $extraFields = []): JsonResponse
    {
        return new JsonResponse(array_merge([
            'message' => $message,
            'status'  => $status
        ], $extraFields), $status);
    }

    /**
     * @param \Exception $exception
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    public static function getExceptionResponse(\Exception $exception, string $message, int $status): JsonResponse
    {
        $callerException = new \ReflectionClass($exception);

        return new JsonResponse([
            'message'   => $message,
            'status'    => $status,
            'exception' => $callerException->getShortName()
        ], $status);
    }
}
