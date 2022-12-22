<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\SinglePostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// // get
Route::get('blog',[PostsController::class,'index']);
// // show a specific post
// Route::get('blog/1',[PostsController::class,'show']);
// // show the form to submit the data of a form
// Route::get('blog/create',[PostsController::class,'create']);
// // to store that data
// Route::post('blog',[PostsController::class,'store']);

// // put or patch request
// Route::get('blog/edit/1',[PostsController::class,'edit']); // to show the edit row
// method chaning and impliment the regular expression
// Route::get('/blog/{id}',[PostsController::class,'update'])->whereNumber('id');//to update a spcific field no hole row
Route::get('/blog/{id}',[PostsController::class,'update'])->whereAlpha('name');//to update a spcific field no hole row
Route::get('/blog/{id}/{name}',[PostsController::class,'update'])->whereAlphaNumeric('id')->whereAlpha('name');// multiple parameter regular expression
// Route::put('/blog/1',[PostsController::class,'update']);// to update a hole row 

// // delete
// Route::delete('blog/1', [PostsController::class,'destory']);

// multiple route
Route::match(['post','get'],'blog',[PostsController::class,'index']);
// Route::any('blog',[PostsController::class,'index']);
// returning a simple view
Route::view('/blog','blog.index');

// let's create a resource route
// Route::resource('blog',PostsController::class);
// // route for single action controller
// Route::get('/',SinglePostController::class);