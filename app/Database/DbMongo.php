<?php

namespace App\Database;
use Illuminate\Support\Facades\DB;
use MongoDB\Laravel\Query\Builder;
class DbMongo
{
    public static function collection($collection): Builder
    {
        return DB::connection('mongodb')->collection($collection);
    }
}
