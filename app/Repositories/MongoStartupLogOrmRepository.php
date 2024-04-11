<?php

namespace App\Repositories;
use App\Models\StartupLog;

class MongoStartupLogOrmRepository
{
    public function getData()
    {
        dd(StartupLog::all());
    }

}
