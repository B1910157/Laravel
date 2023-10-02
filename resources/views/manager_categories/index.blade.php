<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@extends('layout.Admin_nav');
<main>

    <div class="card-header ">
        <a class="btn btn-primary mb-0 ml-2" href="{{ route('categories.create') }}"><i class="fa fa-plus icon"
                aria-hidden="true"></i> CATEGORY </a>
    </div>
    <div class="card-body">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <table id="table2" class="table table-striped table-bordered table-responsive-lg">
            <thead>
                <tr class="font-weight-bold ">
                    <th>ID</th>
                    <th>Category</th>
                    <th>slug</th>
                    {{-- <th>Created-at</th>
                    <th>Updated-at</th> --}}
                    <th colspan="2" width="10%"></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>

                        <td>{{ $category->id }}</td>
                        <td>{{ $category->categories_name }}</td>
                        <td>{{ $category->slug }}</td>
                        {{-- <td>{{ $category->created_at }}
                        </td>
                        <td>{{ $category->updated_at }}</td> --}}
                        {{-- {{ route('categories.edit', ['id'=>$category->id], 'id2' => $category->id2) }} --}}

                        <td>
                            <a class="btn btn-warning text-white " href="{{ route('categories.edit', $category->id) }}"> 
                                Edit
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('categories.delete', $category->id) }}" method="post">
                                @csrf
                                <button class="btn btn-danger text-white" type="submit"
                                    onclick="return confirm('Xác nhận xóa?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</main>

