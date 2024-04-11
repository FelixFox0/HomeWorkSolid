<?php

namespace App\Repositories\LogErrorRepository;
use App\Database\DbMongo;
use Illuminate\Support\Facades\DB;
class LogErrorBuilderRepository implements LogErrorRepositoryInterface
{
    public function writeError($className, $textError)
    {
        DbMongo::collection('errors')->insert([
            'className' => $className,
            'text' => $textError,
        ]);

//        DB::connection('mongodb')->collection('errors')
//            ->insert([
//            'className' => $className,
//            'text' => $textError,
//        ]);

    }
}
