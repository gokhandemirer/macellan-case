<?php

declare(strict_types=1);

namespace App\Classes\Utils;

use App\Classes\Constants\RequestParam;

abstract class HashGenerator
{
    /**
     * @return string
     */
    public static function getCallbackHash(): string
    {
        $requestParam = RequestParam::getInstance();

        return sha1(sprintf(
            '%s%s%s%s',
            $requestParam->getPrice(),
            $requestParam->getCallBackSuccessUrl(),
            $requestParam->getCallbackFailUrl(),
            $requestParam->getSalt(),
        ));
    }
}
