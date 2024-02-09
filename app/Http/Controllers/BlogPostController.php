<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogPostController extends Controller
{
    // 
	public function getPosts($categoryId,$postId)
		{
			
			$request = DB::table('comments')
            ->join('posts', 'comments.post_id', '=', 'posts.id')
            ->select("posts.*","comments.*","comments.text as comments_text",'posts.name as posts_name','posts.text as post_text','comments.author_id as comment_author_id','posts.author_id as posts_author_id'  )
            ->where('post_id', '=', $postId )
            ->where('posts.category_id', '=', $categoryId);
    			
	    	dd($request->get()); 

		}


    public function updatePost(Request $request)
    {
    	
    	$get = $request->all();
    	$request = DB::table('posts');
    	if(isset($get['id']))
    		{
    			  $request->where('id', $get['id']);
                    $dataToUpdate = [];
    			  foreach ($get as $key => $value) 
    			  {
    			  	switch ($key) {
                        case 'name':
                        case 'text':
                        case 'author_id':
                            $dataToUpdate[$key]=$value;
                        break;
                        default:
                            break;
                    }
    			  }
                  $request->update($dataToUpdate);
    			  dd(DB::table('posts')->find($get['id']));
    			  

    		}
    }
}
