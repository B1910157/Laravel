<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Categories;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
{
    // dd($request);
    $searchTerm = $request->input('search');
    // dd($searchTerm);
    $categories = Categories::all();
    $results = Posts::where('title', 'like', '%'.$searchTerm.'%')->orWhere('content', 'like', '%'.$searchTerm.'%')->get();

    return view('users.search_results',compact('categories', 'results'));
}
}
