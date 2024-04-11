<?php

namespace App\Repositories\LogErrorRepository;

interface LogErrorRepositoryInterface
{
    public function writeError($className, $textError);
}
