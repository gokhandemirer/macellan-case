<?php

namespace Tests\Feature;

use App\Classes\Constants\RequestParam;
use App\Repositories\TransactionRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionRepositoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_the_method_creates_a_transaction()
    {
        $requestParam = RequestParam::getInstance();

        $transactionRepository = new TransactionRepository();

        $result = $transactionRepository->createTransaction(
            $this->faker->uuid(),
            $this->faker->randomNumber(9),
            $this->faker->randomNumber(9),
            $requestParam->getPrice(),
            $this->faker->randomFloat(),
            $this->faker->uuid,
            $requestParam->getCallBackSuccessUrl(),
            $requestParam->getCallbackFailUrl()
        );

        $this->assertTrue($result);
    }
}
