<?php

declare(strict_types=1);

namespace App\Interfaces;

interface RequestParamInterface
{
    /**
     * @return string
     */
    public function getSalt(): string;

    /**
     * @return string
     */
    public function getCallbackFailUrl(): string;

    /**
     * @return string
     */
    public function getCallBackSuccessUrl(): string;

    /**
     * @return string
     */
    public function getPrice(): string;
}
