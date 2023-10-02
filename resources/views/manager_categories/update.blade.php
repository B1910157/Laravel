<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@extends('layout.Admin_nav');
<div class="card  m-auto shadow" style="margin-left: 100px; width: 500px;" >
    <div class="card-body">
        <form action="{{route('categories.update', $category->id)}}" method="post" >
            @csrf
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" name="category_name"  class="form-control" value="{{old('categories_name') ?? $category->categories_name }}   ">
                <hr>
                <label for="slug" class="font-weight-bold">Slug: </label>
                {{$category->slug}} <br>
                <label for="created_at" class="font-weight-bold">Created-at: </label>
                {{$category->created_at}} <br>
                <label for="updated_at" class="font-weight-bold">Updated-at: </label>
                {{$category->updated_at}} <br>
            </div>
            <button name="btnSave" class="btn btn-primary rounded-pill float-right" type="submit">Update</button>
        </form>
    </div>
</div>