<?php

namespace App\Repositories;
use App\Database\DbMongo;

class MongoStartupLogBuilderRepository
{
    public function getData()
    {

//        dd(DB::connection('mongodb')->collection('startup_log'));
        $books = DbMongo::collection('startup_log')->get();
//        $books = DB::collection('startup_log')->get();
//        DB::table()
        var_dump($books);
        die();
    }
}
