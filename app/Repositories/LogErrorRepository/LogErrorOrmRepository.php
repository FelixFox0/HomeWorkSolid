<?php

namespace App\Repositories\LogErrorRepository;

use App\Models\Error;

class LogErrorOrmRepository implements LogErrorRepositoryInterface
{
    public function writeError($className, $textError)
    {
        Error::create([
            'className' => $className,
            'textError' => $textError,
        ]);
    }
}
