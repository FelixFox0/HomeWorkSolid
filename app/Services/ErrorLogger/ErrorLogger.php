<?php

namespace App\Services\ErrorLogger;

class ErrorLogger implements ErrorLoggerInterface
{
    private $repository;
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function addError($className, $textError): void
    {
        $this->repository->writeError($className, $textError);
    }
}
