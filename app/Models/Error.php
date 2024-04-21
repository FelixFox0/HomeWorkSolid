<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
class Error extends Model
{
    use HasFactory;

    protected $collection = 'errors';
    protected $connection = 'mongodb';
    protected $fillable = ['className', 'textError'];
    protected $test = 'for test'
    public $timestamps = false; // dont us create and update time
}
