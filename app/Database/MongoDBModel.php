<?php

namespace App\Database;

use MongoDB\Laravel\Eloquent\Model;

class MongoDBModel extends Model
{
    protected $connection = 'mongodb';
}
