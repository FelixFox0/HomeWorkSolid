<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use App\Database\MongoDBModel;

class StartupLog extends MongoDBModel
{
    use HasFactory;

    protected $collection = 'startup_log';

}
