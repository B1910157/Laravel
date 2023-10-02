<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CategoryController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('posts',  [PostController::class, 'index'])->name('index.posts') ;
Route::post('post',  [PostController::class, 'store'])->name('store.post');
Route::post('post/{id}', [PostController::class, 'update'])->name('update.post');
Route::get('post/{id}', [PostController::class, 'show'])->name('show.post');
Route::delete('post/{id}', [PostController::class, 'destroy'])->name('destroy.post');

Route::get('categories', [CategoryController::class, 'index'])->name('index.categories') ;
Route::post('category', [CategoryController::class, 'store'])->name('store.category') ;
Route::post('category/{id}', [CategoryController::class, 'update'])->name('update.category');
Route::get('category/{id}', [CategoryController::class, 'show'])->name('show.category') ;
Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('destroy.category');

Route::get('postsofcategory/{category_id} ', [PostController::class, 'postOfCategory'])->name('show.post_of_category');
Route::get('category/{category_id}/post/{post_id} ', [PostController::class, 'findOnePost'])->name('showOnePost.post_of_category');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
