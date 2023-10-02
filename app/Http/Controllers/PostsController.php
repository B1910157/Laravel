<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Posts;
use App\Models\File as File123;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{
    public function show_posts()
    {
        $posts = Posts::all();
        $categories =  Categories::all();
        return view('manager_posts.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = Categories::all();
        $posts = Posts::all();
        return view('manager_posts.create', compact('categories', 'posts'));
    }

    //UPLOAD MULTIPLE FILE in post
    public function store(Request $request)
    {


        // $post = Posts::create([
        //     'title' => $validatedData['title'],
        // ]);
        $data = $request->input();
        $post = Posts::create([
            'title' => $data['title'],
            'categories_id' => $data['category_id'],
            'content' => $data['content'],
        ]);
        // dd($data);
        $files = $request->file('thumb');
        // dd($files);
        foreach ($files as $file) {
            // echo $file->getClientOriginalName();
            $image_name = date("dmyhis_") . $file->getClientOriginalName();
            $path = $file->move(public_path('admin/img/uploads'), $image_name);
            $pathImg = $path->getPathname();
            $pathImg = str_replace("public/", "", $pathImg);
            $pathImg = str_replace("\\", "/", $pathImg);
            // echo $image_name;
            // echo ":";
           $post->files()->create([
                'filename' => $image_name
            ]);
            // $filename = $file->store('public');
            // $post->files()->create([
            //     'post_id' => $post->id,
            //     'filename' => $image_name,
            // ]);
            // dd($post->id);
            // $file123 = File123::create([
            //     'post_id'=>$post->id,
            //     'filename' => $image_name,
            // ]);
            // dd($file123);
        }

        // return redirect()->route('show.posts');

        // Thông báo thành công hoặc chuyển hướng tới trang khác (nếu cần)
    }

    //Thêm post với 1 ảnh
    // public function store(Request $payload)
    // {

    //     $payload->validate([
    //         'category_id' => 'required',
    //         'thumb' => 'required|image|mimes:jpeg,png,PNG,jpg,gif',
    //         'content' => 'required|min:10',
    //         'title' => 'required|min:10',

    //     ], [

    //         'content.min' => 'Content more 10 chars',
    //         'thumb.required' => 'chosse image!!!',
    //         'thumb.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
    //         'thumb.image' => 'file not format',
    //         'title.min' => 'title more 10 chars'

    //     ]);
    //     $data = $payload->input();
    //     $file = $payload->file('thumb');
    //     if ($file) {
    //         $image_name = date("dmyhis_") . $file->getClientOriginalName();
    //         // $ext = $file->extension();
    //         // print_r($ext);
    //         // print_r($image_name);
    //         $path = $file->move(public_path('admin/img/uploads'), $image_name);
    //         $pathImg = $path->getPathname();
    //         $pathImg = str_replace("public/", "", $pathImg);
    //         $pathImg = str_replace("\\", "/", $pathImg);
    //         echo "<pre>";
    //         print_r($pathImg);
    //         Posts::create([
    //             'title' => $data['title'],
    //             'categories_id' => $data['category_id'],
    //             'thumb' => $image_name,
    //             'content' => $data['content'],
    //         ]);
    //         return redirect()->route('show.posts');
    //     }
    // }
    public function edit($id)
    {
        $categorys = Categories::all();
        $posts = Posts::find($id);
        // dd($posts->categories_id);
        $id_category = $posts->categories_id;
        $old_category = Categories::find($id_category);


        return view('manager_posts.update', compact('categorys', 'posts', 'old_category'));
    }
    public function update(Request $payload, $id)
    {

        $payload->validate([

            'content' => 'required|min:10',
            'title' => 'required|min:10',

        ], [

            'content.min' => 'Content more 10 chars',
            'title.min' => 'title more 10 chars'

        ]);
        $data = $payload->input();
        $a = $payload->hasFile('thumb');
        $old_post = Posts::find($id);
        // dd($old_post);
        // dd($a);
        if (!$a) {
            echo "chưa chọn up ảnh mới";
            $thumb = $old_post->thumb;
            echo $thumb;
            Posts::find($id)->update([
                'title' => $data['title'],
                'categories_id' => $data['categories_id'],
                'thumb' => $thumb,
                'content' => $data['content'],
            ]);
            return redirect()->route('show.posts');
        } else {
            $file = $payload->file('thumb');
            if ($file) {
                $image_name = date("dmyhis_") . $file->getClientOriginalName();
                // $ext = $file->extension();
                // print_r($ext);

                // print_r($image_name);
                $path = $file->move(public_path('admin/img/uploads'), $image_name);
                $pathImg = $path->getPathname();
                $pathImg = str_replace("public/", "", $pathImg);
                $pathImg = str_replace("\\", "/", $pathImg);
                if ($old_post->thumb) {
                    File::delete(public_path('admin/img/uploads/' . $old_post->thumb));
                }
                Posts::find($id)->update([
                    'title' => $data['title'],
                    'categories_id' => $data['categories_id'],
                    'thumb' => $image_name,
                    'content' => $data['content'],
                ]);
                return redirect()->route('show.posts');
            }
        }
        // $data = $payload->input();
        // $file = $payload->file('thumb');
        // print_r($data);
        // if($file){
        //     $image_name = date("dmyhis_").$file->getClientOriginalName();
        //     // $ext = $file->extension();
        //     // print_r($ext);

        //     // print_r($image_name);
        //     $path = $file->move(public_path('admin/img/uploads'), $image_name);
        //     $pathImg = $path->getPathname();
        //     $pathImg = str_replace("public/", "", $pathImg);
        //     $pathImg = str_replace("\\", "/", $pathImg);
        //     echo "<pre>";
        //     print_r($pathImg);
        //     Posts::find($id)->update([
        //         'title' => $data['title'],
        //         'categories_id' => $data['categories_id'],
        //         'thumb' => $image_name,
        //         'content' => $data['content'],
        //     ]);
        //     return redirect()->route('show.posts');
        // }else{
        //     echo "Vui lòng chọn ảnh";
        // }


    }
    public function delete($id)
    {
        $post = Posts::find($id);
        File::delete(public_path('admin/img/uploads/' . $post->thumb));
        $post->delete();
        return redirect()->route('show.posts');
    }
}
