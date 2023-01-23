<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Classes\Constants\RequestParam;
use App\Exceptions\TransactionNotCreatedException;
use App\Interfaces\TransactionRepositoryInterface;
use App\Models\Transaction;
use Exception;

class TransactionRepository implements TransactionRepositoryInterface
{
    /**
     * @param string $userId
     * @param string $orderId
     * @param string $refCode
     * @param float $point
     * @param string $hash
     * @return bool
     * @throws TransactionNotCreatedException
     */
    public function createTransaction(
        string $userId,
        string $orderId,
        string $refCode,
        float  $point,
        string $hash
    ): bool
    {
        try {
            $requestParam = RequestParam::getInstance();

            $transaction = new Transaction;
            $transaction->user_id = $userId;
            $transaction->order_id = $orderId;
            $transaction->ref_code = $refCode;
            $transaction->price = $requestParam->getPrice();
            $transaction->point = $point;
            $transaction->hash = $hash;
            $transaction->callback_success_url = $requestParam->getCallBackSuccessUrl();
            $transaction->callback_fail_url = $requestParam->getCallbackFailUrl();

            return $transaction->save();
        } catch (Exception $e) {
            throw new TransactionNotCreatedException($e->getMessage(), (int) $e->getCode());
        }
    }
}
