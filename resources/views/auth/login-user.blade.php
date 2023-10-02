<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>

    <div class="row container p-4">

        <div class="col-4 text-right p-3">
            <h2 class="text-primary">Login User</h2>
        </div>
        <div class="col-6">
            <form action="{{route('login.submit')}}" method="post">
                @csrf
                <table class="table table-bordered ">
                    <tr>
                        <th>Email: </th>
                        <td><input type="email" placeholder="Enter your email..." name="email"></td>
                    </tr>
                    <tr>
                        <th>Password: </th>
                        <td><input type="password" placeholder="Enter your passsword..." name="password"></td>
                    </tr>

                </table>
                <div class="row">
                    <div class="col-12 text-right">
                        <button class="btn btn-primary" type="submit">Đăng nhập</button>
                    </div>

                </div>
                @if (session()->has('login-error'))
                    <div class="alert text-danger">
                        {{ session()->get('login-error') }}
                    </div>
                @endif

            </form>

        </div>

        <div class="col-2">
        </div>

    </div>

</body>

</html>
@if (session('login-error'))
    <script>
        swal("Lỗi", "{{ session('login-error') }}", "error");
    </script>
@endif
