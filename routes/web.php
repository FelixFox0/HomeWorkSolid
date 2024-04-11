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
Route::any('/', function () {
    // ...
});

//Route::get('/', function () {
//    return view('welcome')->name('home');
//});
//
//Route::match(['get', 'post', 'put'], '/', function () {
//    // ...
//});
////
//


////
////Route::redirect('/here', '/there', 301);
////
//Route::get('/user/{id}', function (string $id) {
//    // ...
//})->where('id', '[0-9]+')->name('profile');
////
//Route::get('/user-{id}', function (string $id) {
//    // ...
//})
////
//Route::get('/category/{category}', function (string $category) {
//    // ...
//})->whereIn('category', ['movie', 'song', 'painting']);
////
//Route::get('/user/{id}/{name}', function (string $name, string $id) {
//    // ...
//})
//    ->whereAlpha('name')
//    ->whereNumber('id');
////
//Route::get('/user/{name}', function (string $name) {
//    // ...
//})->whereAlphaNumeric('name');
////
//Route::get('/user/{id}', function (string $id) {
//    // ...
//})->whereUuid('id');
//
//Route::get('/user/{id}/test', function (string $id) {
//    // ...
//})->whereUuid('id');
////
//Route::get('/search/{search}', function (string $search) {
//    return $search;
//})->where('search', '.*');

//Route::middleware(['first', 'second'])->group(function () {
//    Route::get('/', function () {
//        // Uses first & second middleware...
//    });
//
//    Route::get('/user/profile', function () {
//        // Uses first & second middleware...
//    });
//});
//
//Route::get('/user/{id?}', function (string $id) {
//    // ...
//});
//Route::get('/user', function () {
//    // ...
//});
//
Route::controller(UserController::class)->group(function () {
    Route::get('/user/{id}', 'show');
    Route::post('/users', 'store');
});

Route::get('/homeWorkSolid', [App\Http\Controllers\HomeWorkSolidController::class, 'index'])
->middleware(App\Http\Middleware\ValidateSearch::class);
