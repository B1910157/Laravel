<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@extends('layout.Admin_nav');
<div class="card w-50 m-auto shadow">
    <div class="card-body">
        <form action="{{ route('posts.update', $posts->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title" class="text-secondary text-uppercase">Title </label>
                <input type="text" name="title" class="form-control" value="{{ $posts->title }}"> 
                @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <br>
                <label for="categories_id" class="text-secondary text-uppercase">Category</label>
                <div class="form-group">
                    {{-- <select name="categories_id" id="categories_id" class="custom-select">
                        <option value="">{{$old_category->categories_name}}</option>
                        @foreach ($categorys as $category)
                            <option value="{{$category->id}}" >{{$category->categories_name}}</option>
                            
                        @endforeach
                    </select> --}}
                    <select name="categories_id" id="categories_id" class="custom-select">
                        @if (!$old_category)
                            <option value="">{{ $old_category->categories_name }}</option>
                        @endif
                        @foreach ($categorys as $category)
                            <option value="{{ $category->id }}"
                                {{ $old_category->id == $category->id ? 'selected' : '' }}>
                                {{ $category->categories_name }}</option>
                        @endforeach
                    </select>
                </div>

                <label for="thumb" class="text-secondary text-uppercase">Thumb </label>
                <img class="w-25 h-25" src="{{ asset('/admin/img/uploads/') . '/' . $posts->thumb }}" alt="">
                <br>

                {{-- @if ($posts->thumb)
                    <input type="text" value="{{ $posts->thumb}}" name="thumb">
                    
                @endif --}}

                {{-- <input type="file" name="thumb" class="form-control" value="{{ $posts->thumb }}"> --}}

                @if ($posts->thumb)
                    <input type="file" name="thumb" id="thumb" />
                @else
                    <button type="button" id="change-thumb">Change</button>
                    <input type="hidden" name="thumb" value="{{ $posts->thumb }}" />
                @endif
               

                <br>
                <label for="content" class="text-secondary text-uppercase">Content </label><br>
                <textarea name="content" id="content" cols="60" rows="10" placeholder="Enter content post..."> {{ $posts->content }} </textarea>
                @if ($errors->has('content'))
                <span class="text-danger">{{ $errors->first('content') }}</span>
            @endif
                <label for="title" class="text-secondary text-uppercase">Created-at: </label>
                {{ $posts->created_at }} <br>
                <label for="title" class="text-secondary text-uppercase">Updated-at: </label>
                {{ $posts->updated_at }}
            </div>
            <button class="btn btn-primary rounded-pill float-right" type="submit">Update post</button>
        </form>
    </div>
</div>
<script>
    const changeThumb = document.querySelector('#change-thumb');
    const thumb = document.querySelector('#thumb');
    changeThumb.addEventListener('click', function() {
        thumb.click();
    });
</script>
