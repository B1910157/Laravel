@extends('layout.Admin_nav');

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<main>
    <div class="card w-50 m-auto shadow">
        <div class="card-body">

            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <div class="form-group">
                        <select name="category_id" id="category_id" class="custom-select">
                            <option value="">--Select--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->categories_name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                        @endif
                    </div>
                    <label for="title">Title </label>
                    <input type="text" name="title" class="form-control" value="">
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif <br>
                    <label for="thumb">Image </label>
                    <input type="file"  class="form-control" name="thumb[]" multiple>
                    @if ($errors->has('thumb'))
                        <span class="text-danger">{{ $errors->first('thumb') }}</span>
                    @endif <br>
                    {{-- <label for="thumbs">ADD MORE </label>
                    <input type="file"  class="form-control" name="thumbs[]" multiple>
                    @if ($errors->has('thumbs'))
                        <span class="text-danger">{{ $errors->first('thumb') }}</span>
                    @endif <br> --}}
                    <label for="content">Content</label><br>

                    <textarea name="content" id="content" cols="50" rows="10" placeholder=" Nhập vào nội dung..."></textarea>
                    @if ($errors->has('content'))
                        <span class="text-danger">{{ $errors->first('content') }}</span>
                    @endif
                </div>
                <button name="btnSave" class="btn btn-primary rounded-pill float-right" type="submit">Add post</button>
            </form>
        </div>
    </div>

</main>
