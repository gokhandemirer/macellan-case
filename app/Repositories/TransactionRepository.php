<?php

declare(strict_types=1);

namespace App\Repositories;

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
     * @param float $price
     * @param float $point
     * @param string $hash
     * @param string $callbackSuccessUrl
     * @param string $callbackFailUrl
     * @return bool
     * @throws Exception
     */
    public function createTransaction(
        string $userId,
        string $orderId,
        string $refCode,
        float  $price,
        float  $point,
        string $hash,
        string $callbackSuccessUrl,
        string $callbackFailUrl
    ): bool
    {
        try {
            $transaction = new Transaction;
            $transaction->user_id = $userId;
            $transaction->order_id = $orderId;
            $transaction->ref_code = $refCode;
            $transaction->price = $price;
            $transaction->point = $point;
            $transaction->hash = $hash;
            $transaction->callback_success_url = $callbackSuccessUrl;
            $transaction->callback_fail_url = $callbackFailUrl;

            return $transaction->save();
        } catch (Exception $e) {
            throw new TransactionNotCreatedException($e->getMessage(), (int) $e->getCode());
        }
    }
}
