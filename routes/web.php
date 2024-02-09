<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () 
{
	echo "okay";
});

Route::get('/homeWorkSolid0', [App\Http\Controllers\HomeWorkSolidController::class, 'index']);


Route::get('/homeWorkSolid', [App\Http\Controllers\HomeWorkSolidControllerTWO::class, 'index']);

Route::get('/testdb', [App\Http\Controllers\testdb::class, 'index']);


Route::get('/homeWorkServiceContainers', [App\Http\Controllers\HomeWorkServiceContainers::class, 'index']);


Route::get('/blog', 'App\Http\Controllers\BlogController@getBlog');


Route::get('/blog/addCategory', 'App\Http\Controllers\BlogCategoryController@addCategory');

Route::get('/blog/updatePost', 'App\Http\Controllers\BlogPostController@updatePost');

Route::get('/blog/deleteComment', 'App\Http\Controllers\BlogCommentController@deleteComment');

Route::get('/blog/{categoryId}', 'App\Http\Controllers\BlogCategoryController@getCategories');

Route::get('/blog/{categoryId}/{postId}', 'App\Http\Controllers\BlogPostController@getPosts');
