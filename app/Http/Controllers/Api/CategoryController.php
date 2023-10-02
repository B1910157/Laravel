<?php

namespace App\Http\Controllers\Api;


use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use App\Http\Resources\Category as CategoryResource;
use App\Models\Categories;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return response()->json($categories, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categories_name' => 'required',
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
        // echo json_encode($input) ;
        $slug = $input['categories_name'];
        $slug = Str::slug($slug);
        $input['slug'] = $slug;
        $category = Categories::create($input);
        $arr = [
            'status' => true,
            'message' => "Post created successfully",
            'data' => new CategoryResource($category)
        ];
        return response()->json($arr, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Categories::find($id);
        return response()->json($category, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'categories_name' => 'required',
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
        // echo json_encode($input) ;
        $slug = $input['categories_name'];
        $slug = Str::slug($slug);
        $input['slug'] = $slug;
        $category = Categories::find($id)->update($input);
        $arr = [
            'status' => true,
            'message' => "Post created successfully",
            'data' => new CategoryResource($category)
        ];
        return response()->json($arr, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categories::find($id);
        return response()->json("Delete category successfully", 200);
    }
}
