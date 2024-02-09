<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogCategoryController extends Controller
{
    //
		public function getCategories($categoryId)
			{
				$getCategories=DB::table('categories')
    					->join('posts', 'categories.id', '=', 'posts.category_id')
    					->select('categories.*', 'categories.name as category_name','posts.name as post_name', 'posts.text as post_text')
    					->where('categories.id', $categoryId);
    
    dd($getCategories->get());


			
			}

        public function addCategory(Request $data)
    {
    	$get = $data->all();
    		$categoryData=[];
    		foreach ($get as $key => $value) {
    			switch ($key) {
    				case 'name':
    				case 'is_active':
    						$categoryData[0]=[$key=>$value];
    					break;
    				
    				default:

    				break;
    			}
    		}
    	$getCategories=DB::table('categories')->insert($categoryData);
    	
    	dd(DB::table('categories')->get());

    }
}
