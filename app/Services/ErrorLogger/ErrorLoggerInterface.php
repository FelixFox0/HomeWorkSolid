<?php

namespace App\Services\ErrorLogger;

interface ErrorLoggerInterface
{
    public function addError($className, $textError): void;
}
