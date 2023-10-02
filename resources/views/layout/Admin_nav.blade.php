<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('admin/style.css') }}">
   <script src="{{asset('admin/script.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav class="sidebar">

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="search-box">
                        <label for="search"><i class="fa fa-search icon"></i></label>
                        <input type="text" id="search" placeholder="Search...">
                    </li>
                    <li class="nav-link">
                        <a href="{{ route('show.categories') }}">
                            <i class="fa fa-list icon" aria-hidden="true"></i>
                            <span class="text nav-text">Category</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{ route('show.posts') }}">
                            <i class="fa fa-book icon" aria-hidden="true"></i>
                            <span class="text nav-text">Posts</span>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="bottom-content">
                <li class="nav-link">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();"
                            class="nav-link text-secondary">
                            <i class="fa fa-sign-out icon" style="transform: rotate(180deg);"></i>
                            <span class="text nav-text ">{{ __('Logout') }}</span>
                        </x-responsive-nav-link>
                    </form>
                </li>
                {{-- <li class="nav-link">
                    <a href="#">
                        <i class="fa fa-sign-out icon" style="transform: rotate(180deg);"></i>
                        <span class="text nav-text">Đăng xuất</span>
                    </a>
                </li> --}}
                {{-- <li class="mode">
                    <div class="moon-sun">
                        <i class="fa fa-moon-o icon moon"></i>
                        <i class="fa fa-sun-o icon sun"></i>
                    </div>
                    <span class="mode-text text">Dark Mode</span>
                    <div class="toggle-switch">
                        <div class="switch"></div>
                    </div>
                </li> --}}

            </div>
        </div>

    </nav>

</body>

</html>
