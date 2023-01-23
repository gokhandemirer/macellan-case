<?php

namespace App\Http\Controllers;

use App\Classes\Constants\RequestParam;
use App\Classes\Utils\HashGenerator;
use App\Classes\Utils\ResponseManager;
use App\Exceptions\TransactionNotCreatedException;
use App\Http\Requests\Gate\OpenGateRequest;
use App\Interfaces\TransactionRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class GateController extends Controller
{
    /**
     * @param TransactionRepositoryInterface $transactionRepository
     */
    public function __construct(
        public TransactionRepositoryInterface $transactionRepository
    )
    {
        $this->middleware([
            'throttle:open-gate',
            'throttle:open-gate-per-user',
            'verified.hash'
        ]);
    }

    /**
     * @param OpenGateRequest $request
     * @return JsonResponse
     * @throws TransactionNotCreatedException
     */
    public function openGate(OpenGateRequest $request): JsonResponse
    {
        try {
            $this->transactionRepository->createTransaction(
                $request->input('user_id'),
                $request->input('order_id'),
                $request->input('ref_code'),
                $request->input('point'),
                $request->input('hash')
            );

            // Success
            $this->sendCallbackRequest(true);
            return ResponseManager::getGenericResponse('Success');
        } catch (TransactionNotCreatedException $exception) {
            // Fail
            $this->sendCallbackRequest(false);
            throw $exception;
        }
    }

    /**
     * @param bool $isSuccess
     * @return void
     */
    private function sendCallbackRequest(bool $isSuccess): void
    {
        $requestParam = RequestParam::getInstance();
        $callbackHash = HashGenerator::getCallbackHash();
        Http::contentType('application/json')->post(
            $isSuccess ? $requestParam->getCallBackSuccessUrl() : $requestParam->getCallbackFailUrl(),
            [
                'hash' => $callbackHash
            ]
        );
    }
}
