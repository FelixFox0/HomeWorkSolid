<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    //
    public function getBlog()
    {
    	$result = DB::table('categories');
    	dd($result->get());
    }
}
