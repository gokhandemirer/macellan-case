<?php

namespace App\Exceptions;

use App\Classes\Utils\ResponseManager;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class TransactionNotCreatedException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report(): void
    {
        Log::debug($this->getMessage() ?: 'Transaction could not be created');
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return ResponseManager::getExceptionResponse(
            $this,
            $this->getMessage() ?: 'Transaction could not be created',
            409
        );
    }
}
