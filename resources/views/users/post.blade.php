<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container">
    @include('layout.user_nav')


    <div class=" row" >
        <div class="col-8 text-center  p-3">

            <hr><br>
            <h5 class=" bg-light p-3" style=" text-shadow: 2.5px 1.5px #11e9f4;"> Detail post</h5>
            <div class="row">
                <h4 class="col-12 text-left">{{ $post->title }}</h4>
                <img class="w-50 h-50 col-5 img-circle mt-3 "
                    src="{{ asset('/admin/img/uploads/') . '/' . $post->thumb }}" alt="">
                {{-- <p class="col-6 m-2">{{$post->content}}</p> --}}
                <div class="col-6 m-2 text-justify">
                    <p>{{ $post->content }}</p>

                </div>

            </div>
            <hr>
            <h3>Suggest</h3><br>

            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-6 row">
                        <h5 class="col-12 text-center" style="height: 20px;">{{ $post->title }}</h5>
                        <a href="{{ route('post', ['category_id' => $post->categories_id, 'post_id' => $post->id]) }}">
                            <img class=" col-6 m-2 img-circle "
                                src="{{ asset('/admin/img/uploads/') . '/' . $post->thumb }}" alt="">
                        </a>


                        {{-- <a href="{{ route('post', ['category_id' => $post->categories_id, 'post_id' => $post->id]) }}"
                            class="col-5 text-center mr-auto">see more</a> --}}
                    </div>
                @endforeach
            </div>

        </div>
        <div class="col-4 p-3">
            <h3 class="text-center text-secondary">Quảng cáo</h3>
            <hr>
            <h5>Quảng cáo 1</h5>
            <div class="row">
                <img class="col-4" style="height: 60px; width: 80px"
                    src="{{ asset('/admin/img/uploads/100523044116_img2.JPG') }}">
                <p class="col-8">Nội dung</p>

            </div>

            <hr>
            <h5>Quảng cáo 1</h5>
            <div class="row">
                <img class="col-4" style="height: 60px; width: 80px"
                    src="{{ asset('/admin/img/uploads/100523044116_img2.JPG') }}">
                <p class="col-8">Nội dung</p>

            </div>

            <hr>
            <h5>Quảng cáo 1</h5>
            <div class="row">
                <img class="col-4" style="height: 60px; width: 80px"
                    src="{{ asset('/admin/img/uploads/100523044116_img2.JPG') }}">
                <p class="col-8">Nội dung</p>

            </div>

            <hr>
            <h5>Quảng cáo 1</h5>
            <div class="row">
                <img class="col-4" style="height: 60px; width: 80px"
                    src="{{ asset('/admin/img/uploads/100523044116_img2.JPG') }}">
                <p class="col-8">Nội dung</p>

            </div>
        </div>

    </div>




</div>
