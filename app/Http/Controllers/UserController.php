<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userCan($action, $option = NULL)
    {
        $user = Auth::user();
        return Gate::forUser($user)->allows($action, $option);
    }
    public function showPageGuest()

    {

        if (!$this->userCan('view-user')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
        }
        $categories = Categories::all();
        $posts = Posts::all();
        return view('users.home', compact('categories', 'posts'));
        // return view("users.post");
        // return redirect()->route('home');
    }


    public function showPageAdmin()

    {

        if (!$this->userCan('view-admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này nhé nhé'));
        }

        // return view('manager_categories.index');
        // return redirect()->route('show.categories');
        return redirect()->route('categories.create');
       
    }

    public function home()
    {
        $categories = Categories::all();
        $posts = Posts::all();
        // $posts = $posts->sortByDesc('created_at');
        return view('users.home', compact('categories', 'posts'));
    }
    public function category($id)
    {
        $categories = Categories::all();
        $category = Categories::find($id);
        $posts = Posts::where('categories_id', '=', $id)->get();
        return view('users.category', compact('categories', 'category', 'posts'));
    }

    public function get_post($category_id, $post_id)
    {
        $categories = Categories::all();
        $categories2 = Categories::find($category_id);
        // $posts = Posts::all();
        $posts = Posts::where('categories_id', '=', $category_id)->get();
        $post = Posts::find($post_id);

        return view('users.post', compact('categories', 'categories2', 'posts', 'post'));
    }
}
