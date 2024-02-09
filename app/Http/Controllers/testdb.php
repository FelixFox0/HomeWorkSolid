<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Author;
use App\Models\Category;
use App\Models\Post;

class testdb extends Controller
{
    public function index()
    	{
        $author = Post::find(1);
        $category = Category::find(1);

        dd($author);
    	}
}
