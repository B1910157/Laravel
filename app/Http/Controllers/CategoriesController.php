<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
// use VietUnicode\UrlSlugGenerator\UrlSlugGenerator;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    // public function Manager_categories(){
    //     return view('manager_categories');
    // }
    public function Show_categories()
    {
        $categories =  Categories::all();
        return view('manager_categories.index', compact('categories'));
    }
    public function create()
    {
        return view('manager_categories.create');
    }
    public function store(Request $payload)
    {
        // $payload->validate(
        //     [
        //         'category_name' => 'required|string|max:100',
        //     ],
        //     [
        //         'required' => 'Chưa nhập :attribute!',
        //         'max' => ':attribute lớn nhất 100 ký tự!'
        //     ],
        //     [
        //         'category_name' => 'tên danh mục',
        //     ],
        // );
        $payload->validate([
            'categories_name' => 'required|min:2'

        ],[
            'categories_name.required' => 'Tên không được trống',
            'categories_name.min' => 'Tên danh mục ít nhất 2 kí tự',
        ]);
        $data = $payload->input();
        // dd($data);
        $slug = $data['category_name'];
        $slug = Str::slug($slug); 
        // dd($slug);
        Categories::create([
            'categories_name' => $data['category_name'],
            'slug' => $slug,
        ]);
        return redirect()->route('show.categories')->with('status', 'Đã thêm 1 danh mục mới');
    }
    public function edit($id)
    {
        $category = Categories::find($id);
        // return 'hi';
        return view('manager_categories.update', compact('category'));
    }
    public function update(Request $payload, $id)
    {
        
        $payload->validate(
            [
                'category_name' => 'required|string|max:100',
            ],
            [
                'required' => 'Chưa nhập :attribute!',
                'max' => ':attribute phải bé hơn hoặc bằng 100 ký tự!'
            ],
            [
                'category_name' => 'tên danh mục',
            ],
        );
        $data = $payload->input();
         $data = $payload->input();
        // dd($data);
        $slug = $data['category_name'];
        $slug = Str::slug($slug); 
        // print_r($data);
        Categories::find($id)->update([
            'categories_name' => $data['category_name'],
            'slug' => $slug,
        ]);
        return redirect()->route('show.categories');
    }

    public function delete($id)
    {
        $category = Categories::find($id);
        if ($category->post()->count() > 0) {
            // Không cho phép xóa danh mục nếu có bài viết
            // abort(403, "Không thể xóa danh mục");
            return redirect()->route('show.categories')->with('error', 'Không thể xóa danh mục có bài viết');
        }
        Categories::find($id)->delete();
        return redirect()->route('show.categories');
    }
}
