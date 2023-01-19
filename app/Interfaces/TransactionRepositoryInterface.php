<?php

declare(strict_types=1);

namespace App\Interfaces;

interface TransactionRepositoryInterface
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
     */
    public function createTransaction(
        string $userId,
        string $orderId,
        string $refCode,
        float $price,
        float $point,
        string $hash,
        string $callbackSuccessUrl,
        string $callbackFailUrl
    ): bool;
}
