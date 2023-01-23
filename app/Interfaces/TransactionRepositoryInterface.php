<?php

declare(strict_types=1);

namespace App\Interfaces;

interface TransactionRepositoryInterface
{
    /**
     * @param string $userId
     * @param string $orderId
     * @param string $refCode
     * @param float $point
     * @param string $hash
     * @return bool
     */
    public function createTransaction(
        string $userId,
        string $orderId,
        string $refCode,
        float $point,
        string $hash
    ): bool;
}
