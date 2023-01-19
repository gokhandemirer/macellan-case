<?php

namespace Tests\Unit;

use App\Classes\Utils\HashGenerator;
use App\Classes\Utils\HashValidator;
use PHPUnit\Framework\TestCase;

class HashValidatorTest extends TestCase
{
    public function test_request_validator_method_returns_true()
    {
        $hash = '2918f946ce80bd37e7dbf4ade4888df9d281de0d';
        $result = HashValidator::requestHashValidator($hash);

        $this->assertTrue($result);
    }

    public function test_request_validator_method_returns_false()
    {
        $hash = 'test123';

        $result = HashValidator::requestHashValidator($hash);

        $this->assertFalse($result);
    }

    public function test_callback_hash_method_generates_a_hash()
    {
        $result = HashGenerator::getCallbackHash();

        $this->assertIsString($result);
    }
}
