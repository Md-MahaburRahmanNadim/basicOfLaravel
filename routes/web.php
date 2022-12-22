<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\SinglePostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::prefix('/blog')->group(function(){
    Route::get('/',[PostsController::class,'index'])->name('blog.index');
    Route::get('/{id}',[PostsController::class,'show'])->name('blog.show');
    Route::get('/create',[PostsController::class,'create'])->name('blog.create');
    Route::post('/',[PostsController::class,'store'])->name('blog.store');
    Route::get('/edit/{id}',[PostsController::class,'edit'])->name('blog.edit');
    Route::patch('/{id}',[PostsController::class,'update'])->name('blog.update');
    Route::delete('/{id}',[PostsController::class,'destory'])->name('blog.destory');

});
// let's create a resource route
Route::resource('blog',PostsController::class);
// // route for single action controller
// Route::get('/',SinglePostController::class);