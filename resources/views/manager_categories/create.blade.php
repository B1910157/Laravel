@extends('layout.Admin_nav');

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<main>
    <div class="card w-50 m-auto shadow">
        <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
                Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại!!!
            </div>
            @endif
            <form action="{{route('categories.store')}}" method="post" >
                @csrf
                <div class="form-group">
                    <label for="categories_name">Category Name </label>
                    <input type="text" name="categories_name"  class="form-control" value="{{old('categories_name')}}">
                    @error('categories_name')

                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    {{-- <label for="slug">Slug</label>
                    <input type="text" name="slug"  class="form-control" value=""> --}}
                </div>
                <button name="btnSave" class="btn btn-primary rounded-pill float-right" type="submit">Add</button>
            </form>
        </div>
    </div>

</main>
