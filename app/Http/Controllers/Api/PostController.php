<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
// use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\Request;

use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use App\Http\Resources\Post as PostsResource;
use App\Models\Categories;
use App\Models\Posts;

use Illuminate\Support\Facades\File;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::all();
        return response()->json($posts, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'categories_id' => 'required',
            'content' => 'required',
            'thumb' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            $arr = [
                'status' => false,
                'message' => 'Lỗi kiểm tra dữ liệu',
                'data' => $validator->errors(),
            ];
            return response()->json($arr, 200);
        }

        $input = $request->all();
        $file = $request->file('thumb');
        if ($file) {
            $image_name = date("dmyhis_") . $file->getClientOriginalName();
            $path = $file->move(public_path('admin/img/upload123'), $image_name);
            $pathImg = $path->getPathname();
            $pathImg = str_replace("public/", "", $pathImg);
            $pathImg = str_replace("\\", "/", $pathImg);
            $input['thumb'] = $image_name;
            // return $image_name;
            $post = Posts::create($input);
            $arr = [
                'status' => true,
                'message' => "Post created successfully",
                'data' => new PostsResource($post)
            ];
            return response()->json($arr, 201);
        }
    }

    public function postOfCategory($category_id){
        // $category = Categories::find($category_id);
        $posts = Posts::where('categories_id', '=', $category_id)->get();
        return response()->json($posts, 200);
    }

    public function findOnePost($category_id, $post_id){
       
        $posts = Posts::where('id', '=', $post_id)->where('categories_id', '=', $category_id)->get();
        return response()->json($posts, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Posts::find($id);
        return response()->json($post, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // echo json_encode($request->all());

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'categories_id' => 'required',
            'content' => 'required',
            'thumb' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            $arr = [
                'status' => false,
                'message' => 'Lỗi kiểm tra dữ liệu',
                'data' => $validator->errors(),
            ];
            return response()->json($arr, 200);
        }

        $post = Posts::findOrFail($id);
        $input = $request->all();
        $file = $request->file('thumb');
        if ($file) {
            $image_name = date("dmyhis_") . $file->getClientOriginalName();
            $path = $file->move(public_path('admin/img/upload123'), $image_name);
            $pathImg = $path->getPathname();
            $pathImg = str_replace("public/", "", $pathImg);
            $pathImg = str_replace("\\", "/", $pathImg);
            $input['thumb'] = $image_name;
            if ($post->thumb) {
                File::delete(public_path('admin/img/upload123/' . $post->thumb));
            }
        }
        $post->update($input);
        $arr = [
            'status' => true,
            'message' => "Post updated successfully",
            'data' => new PostsResource($post)
        ];
        return response()->json($arr, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Posts::find($id);
        File::delete(public_path('admin/img/upload123/' . $post->thumb));
        $post->delete();

        return response()->json("Delete post successfully", 200);
    }
}
