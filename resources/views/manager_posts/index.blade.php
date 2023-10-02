<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@extends('layout.Admin_nav');
<main>

    <div class="card-header ">
        <a class="btn btn-primary mb-0 ml-2" href="{{ route('posts.create') }}"><i class="fa fa-plus icon"
                aria-hidden="true"></i> POST</a>
    </div>
    <div class="card-body">
        <table id="table1" class="table table-striped table-bordered table-responsive-lg ">
            <thead>
                <tr class="font-weight-bold">
                    <th>ID</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Thump</th>
                    {{-- <th >Content</th> --}}
                    {{-- <th>Created-at</th> --}}
                    {{-- <th>Updated-at</th> --}}
                    <th colspan="2"></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>

                        <td>{{ $post->id }}</td>
                        <td>{{ $post->categories->categories_name }}</td>
                        <td>{{ $post->title }}</td>
                        {{-- <td>{{$post->thumb}}</td> --}}
                        {{-- @foreach ($files as $file)
                            {{ $post->files->filename }}
                        @endforeach --}}
                        {{-- {{ $post->files }} --}}

                        <td class="mr-auto">
                            @if ($post->files != null)
                                <div class="row">
                                    @foreach ($post->files as $file)
                                        <div class="col-6">

                                            <img class="w-100" style="height: 120px;"
                                                src=" {{ asset('/admin/img/uploads/') . '/' . $file->filename }}"
                                                alt="">

                                        </div>
                                        @endforeach

                                </div>
                          
                @endif
                <img class="w-50 h-50 " src=" {{ asset('/admin/img/uploads/') . '/' . $post->thumb }}" alt="">

                </td>

                {{-- <td>
                            <p class="content" style="width: 200px"> {{ $post->content }}</p>
                        </td> --}}
                {{-- <td>{{ $post->created_at }}
                        </td>
                        <td>{{ $post->updated_at }}</td> --}}
                <td>
                    <a class="btn btn-warning text-white " href="{{ route('posts.edit', $post->id) }}">
                        Edit
                    </a>
                </td>
                <td>
                    <form action="{{ route('posts.delete', $post->id) }}" method="post">
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
<style>
    /* .content {
        max-height: 150px;
        overflow: auto;
        background: #0f0fd3;
    } */
</style>
{{-- @section('ex-script')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
                },

            });
        });
    </script>
@endsection --}}
