<?php

declare(strict_types=1);

namespace App\Classes\Constants;

use App\Interfaces\RequestParamInterface;

class RequestParam implements RequestParamInterface
{
    /**
     * @var RequestParam
     */
    private static RequestParam $instance;

    private const SALT_KEY = 'case2023';
    private const CALLBACK_FAIL_URL = 'https://case.altpay.dev/fail';
    private const CALLBACK_SUCCESS_URL = 'https://case.altpay.dev/success';
    private const PRICE = '55.33';

    /**
     * @return RequestParam
     */
    public static function getInstance(): RequestParam
    {
        if (!isset(self::$instance)) {
            self::$instance = new RequestParam();
        }

        return self::$instance;
    }

    /**
     * @return string
     */
    public function getSalt(): string
    {
        return self::SALT_KEY;
    }

    public function getCallbackFailUrl(): string
    {
        return self::CALLBACK_FAIL_URL;
    }

    public function getCallBackSuccessUrl(): string
    {
        return self::CALLBACK_SUCCESS_URL;
    }

    public function getPrice(): string
    {
        return self::PRICE;
    }
}
