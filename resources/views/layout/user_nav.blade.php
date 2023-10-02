{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
<div class="">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

                    @foreach ($categories->take(5) as $category)
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('category', $category->id) }}">{{ $category->categories_name }}</a>
                        </li>
                    @endforeach
                 
                    @if(count($categories) > 5)
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>More

                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                             @foreach ($categories->skip(5) as $category)
                               <a  class="dropdown-item"
                                        href="{{ route('category', $category->id) }}">{{ $category->categories_name }}</a>
                                
                            @endforeach
                          

                           
                        </div>
                    </li>
                    @endif
                    
                </ul>
               <div class="p-3 m-4">
                <form class="d-flex " method="get" action="{{ route('search') }}">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

               </div>
                
            </div>
        </div>
    </nav>
    
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
    integrity="sha384-wpNlSSZqOK/9GMk2D/83YIENw6qblz7TcQLQatM0fvzxAr0BkRBA7LuCiTR6J23Y"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7J+AK8YYDg5Pz9LJfZGKkC5L5ckiiG5Rwqi5+NpKKIb+GBWpXlvXJ"
    crossorigin="anonymous"></script>
 --}}

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div>




{{-- <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container row">

            <div class="collapse navbar-collapse col-8" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-item text-secondary " href="{{route('home')}}">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                   
                    @foreach ($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('category', $category->id) }}">{{ $category->categories_name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-4">
                <form class="d-flex">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
</div>
</nav>

</div> --}}
