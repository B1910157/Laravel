<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;


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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Route::get('/page-guest',  [UserController::class, "showPageGuest"]);

    // Route::get('/page-admin',  [UserController::class, "showPageAdmin"]);

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('admin/categories', [CategoriesController::class, 'Show_categories'])->name('show.categories');
    Route::get('admin/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('admin/categories/create', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('admin/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::post('admin/categories/edit/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::post('admin/categories/delete/{id}', [CategoriesController::class, 'delete'])->name('categories.delete');
    Route::get('admin/posts', [PostsController::class, 'show_posts'])->name('show.posts');
    Route::get('admin/posts/create', [PostsController::class, 'create'])->name('posts.create');
    Route::post('admin/posts/create', [PostsController::class, 'store'])->name('posts.store');
    Route::get('admin/posts/edit/{id}', [PostsController::class, 'edit'])->name('posts.edit');
    Route::post('admin/posts/edit/{id}', [PostsController::class, 'update'])->name('posts.update');
    Route::post('admin/posts/delete/{id}', [PostsController::class, 'delete'])->name('posts.delete');
} );



// Route::middleware('auth')->group(['prefix' => 'admin'], function(){
//     Route::get('/categories', [CategoriesController::class, 'Show_categories'])->name('show.categories');
//     Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
//     Route::post('categories/create', [CategoriesController::class, 'store'])->name('categories.store');
//     Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
//     Route::post('/categories/edit/{id}', [CategoriesController::class, 'update'])->name('categories.update');
//     Route::post('/categories/delete/{id}', [CategoriesController::class, 'delete'])->name('categories.delete');
//     Route::get('/posts', [PostsController::class, 'show_posts'])->name('show.posts');
//     Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
//     Route::post('/posts/create', [PostsController::class, 'store'])->name('posts.store');
//     Route::get('/posts/edit/{id}', [PostsController::class, 'edit'])->name('posts.edit');
//     Route::post('/posts/edit/{id}', [PostsController::class, 'update'])->name('posts.update');
//     Route::post('/posts/delete/{id}', [PostsController::class, 'delete'])->name('posts.delete');
// });


Route::group(['prefix' => '/'], function () {
    Route::get('/', [UserController::class, "home"])->name('home');
    Route::get('/search', [SearchController::class, "search"])->name('search');
    Route::get('/category/{id}', [UserController::class, "category"])->name('category');
    Route::get('/category/{category_id}/posts/{post_id}', [UserController::class, "get_post"])->name('post');
});









require __DIR__ . '/auth.php';
