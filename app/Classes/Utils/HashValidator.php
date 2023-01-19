<?php

declare(strict_types=1);

namespace App\Classes\Utils;

use App\Classes\Constants\RequestParam;

abstract class HashValidator
{
    /**
     * @param string $hash
     * @return bool
     */
    public static function requestHashValidator(
        string $hash
    ): bool
    {
        $requestParam = RequestParam::getInstance();

        $cHash = sha1(sprintf(
            '%s%s%s%s',
            $requestParam->getSalt(),
            $requestParam->getCallbackFailUrl(),
            $requestParam->getCallBackSuccessUrl(),
            $requestParam->getPrice(),
        ));

        return $hash === $cHash;
    }
}
