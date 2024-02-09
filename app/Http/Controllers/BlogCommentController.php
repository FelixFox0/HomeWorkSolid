<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogCommentController extends Controller
{
    //
    public function deleteComment(Request $data)
    {
    	$get = $data->all();
    	DB::table('comments')->where('id', $get['id'])->delete();
    
    	dd(DB::table('comments')->get());
    }
}
