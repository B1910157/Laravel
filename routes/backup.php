<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get(
//     '/hello/{name?}',
//     function (string $name = 'TIN') {
//         return $name;
//     }
// );

// Route::get('user/profile', function () {
//     return "profile";
// });
// Route::get('/controller/{id}/{status}', [HelloController::class, 'findOne'] );
Route::get('admin/login',  [AdminController::class, 'login'])->name('login.admin');
Route::post('admin/login', [AdminController::class, 'checkLogin'])->name('checkLogin.admin');

Route::group(['prefix' => 'admin'], function () {

    
    Route::get('/categories', [CategoriesController::class, 'Show_categories'])->name('show.categories');
    Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('categories/create', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/edit/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::post('/categories/delete/{id}', [CategoriesController::class, 'delete'])->name('categories.delete');
    Route::get('/posts', [PostsController::class, 'show_posts'])->name('show.posts');
    Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
    Route::post('/posts/create', [PostsController::class, 'store'])->name('posts.store');
    Route::get('/posts/edit/{id}', [PostsController::class, 'edit'])->name('posts.edit');
    Route::post('/posts/edit/{id}', [PostsController::class, 'update'])->name('posts.update');
    Route::post('/posts/delete/{id}', [PostsController::class, 'delete'])->name('posts.delete');
});


Route::group(['prefix' => '/'], function(){
    Route::get('/', [UserController::class, "home"])->name('home');
    Route::get('/category/{id}', [UserController::class, "category"])->name('category');
    Route::get('/category/{category_id}/posts/{post_id}', [UserController::class, "get_post"])->name('post');
});



//Test Middleware
// Route::get('/', function(){
//     return "heello middleware!!";
// })->name('test');

Route::prefix('test')->group(function(){
    Route::get('/', [AdminController::class, 'test'])->middleware('auth.admin')->name('test1');

});


Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class ,'store'] )->name('register.submit');

Route::get('/login', [LoginController::class, 'login'])->name('testLogin');
Route::post('/login', [LoginController::class, 'CheckLogin'])->name('login.submit');



// Route::group(['prefix' => '/test1', 'middleware' => ['auth.admin']], function(){
//     Route::get('/', [AdminController::class, 'test']);
// });

// Route::get('/admin',  [AdminController::class, 'login'])->name('login.admin');
// Route::get('/admin/categories', [CategoriesController::class, 'Show_categories'])->name('show.categories');
// Route::get('/admin/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
// Route::post('/admin/categories/create', [CategoriesController::class, 'store'])->name('categories.store');
// Route::get('/admin/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
// Route::post('/admin/categories/edit/{id}', [CategoriesController::class, 'update'])->name('categories.update');
// Route::post('/admin/categories/delete/{id}', [CategoriesController::class, 'delete'])->name('categories.delete');
// Route::get('admin/posts',[PostsController::class, 'show_posts'])->name('show.posts');
// Route::get('/admin/posts/create', [PostsController::class, 'create'])->name('posts.create');
// Route::post('/admin/posts/create', [PostsController::class, 'store'])->name('posts.store');