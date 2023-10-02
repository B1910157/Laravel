<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
    @include('layout.user_nav')


    <div class=" row">
        <div class="col-8 text-center">
            <hr><br>
            <h2 class=" bg-light" style=" text-shadow: 2.5px 1.5px #11e9f4;">Posts</h2>
            <br>
            <hr>
            <div class="row">
                @foreach ($posts as $key => $post)
                    @if ($key == 0)
                        <div class="col-xl-8 col-md-12">
                            <div class="card h-100">
                                <a
                                    href="{{ route('post', ['category_id' => $post->categories_id, 'post_id' => $post->id]) }}">
                                    <img class="card-img-top"
                                        src="{{ asset('/admin/img/uploads/') . '/' . $post->thumb }}" alt="">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text text-justify font-italic" style="height: 50px">
                                        {{ Str::limit($post->content, 80, '...') }}</p>
                                    <a href="{{ route('post', ['category_id' => $post->categories_id, 'post_id' => $post->id]) }}"
                                        class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12  ml-2 row">
                           
                        @elseif ($key == 1)
                            <div class="card col-12 pt-2 ">
                                <a
                                    href="{{ route('post', ['category_id' => $post->categories_id, 'post_id' => $post->id]) }}">
                                    <img class="card-img-top"
                                        src="{{ asset('/admin/img/uploads/') . '/' . $post->thumb }}" alt="">
                                </a>
                                <h5 class="card-title">{{ $post->title }}</h5>
                            </div>
                          
                        @elseif ($key == 2)
                        
                            <div class=" card col-12 pt-2">
                                <a
                                    href="{{ route('post', ['category_id' => $post->categories_id, 'post_id' => $post->id]) }}">
                                    <img class="card-img-top"
                                        src="{{ asset('/admin/img/uploads/') . '/' . $post->thumb }}" alt="">
                                </a>
                                <h5 class="card-title">{{ $post->title }}</h5>
                            </div>
                        </div>
                    @else
                        <div class="col-xl-4 col-md-6">
                            <hr>
                            <div class="card h-80">
                                <a
                                    href="{{ route('post', ['category_id' => $post->categories_id, 'post_id' => $post->id]) }}">
                                    <img class="card-img-top" style="height: 150px;"
                                        src="{{ asset('/admin/img/uploads/') . '/' . $post->thumb }}" alt="">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title" style="height: 50px">{{ $post->title }}</h5>
                                    <p class="card-text text-justify font-italic" style="height: 50px">
                                        {{ Str::limit($post->content, 40, '...') }}</p>
                                    <p class="card-text font-weight-bold" style="height: 30px">
                                        {{ $post->categories->categories_name }}</p>
                                    <a href="{{ route('post', ['category_id' => $post->categories_id, 'post_id' => $post->id]) }}"
                                        class="stretched-link"></a>
                                </div>
                            </div>
                            <hr>
                        </div>
                    @endif
                @endforeach
                
                    {{-- 
                    <div class="col-md-6 col-lg-4 mb-4 post-card">
                        <div class="card h-100">
                            <a
                                href="{{ route('post', ['category_id' => $post->categories_id, 'post_id' => $post->id]) }}">
                                <img class="card-img-top" src="{{ asset('/admin/img/uploads/') . '/' . $post->thumb }}"
                                    alt="">
                            </a>

                            <div class="card-body">
                                <h5 class="card-title" style="height: 50px">{{ $post->title }}</h5>
                                <p class="card-text text-justify font-italic" style="height: 80px">
                                    {{ Str::limit($post->content, 50, '...') }}</p>
                                <p class="card-text font-weight-bold" style="height: 30px">
                                    {{ $post->categories->categories_name }}</p>
                                <a href="{{ route('post', ['category_id' => $post->categories_id, 'post_id' => $post->id]) }}"
                                    class="stretched-link"></a>
                                <a href="{{ route('post', ['category_id' => $post->categories_id, 'post_id' => $post->id]) }}"
                                    class="">
                                    see more
                                </a>
                            </div>
                        </div>
                    </div> --}}
            </div>
            {{-- <div class="row">
                <div class="col-12 text-right">
                    <button class="btn btn-primary" id="load-more">more >></button>
                </div>
            </div> --}}
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
<style>
    .card:hover {
        box-shadow: 0 0.5rem 2rem 1rem rgba(6, 28, 153, 0.15);
    }

    /* .post-card.show {
        display: block;
    } */
</style>

<script>
    $(document).ready(function() {
        $('.post-card:gt(2)').hide(); // ẩn các thẻ bài viết từ thứ 4 trở đi

        $('#load-more').on('click', function() { // Xử lý khi nhấn nút Xem thêm
            $('.post-card:hidden:lt(3)').show(); // Hiển thị 3 bài viết tiếp theo
            if ($('.post-card:hidden').length == 0) { // Ẩn nút khi đã hiển thị tất cả bài viết
                $('#load-more').hide();
            }
        });
    });
</script>
