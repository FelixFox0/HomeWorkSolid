<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
class Error extends Model
{
    use HasFactory;

    protected $collection = 'errors';
    protected $connection = 'mongodb';
    protected $fillable = ['className', 'textError'];
//    public $timestamps = false;
}
