<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/default.css')}} ">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    <title>Document</title>
    <style>
        .login,
        .image {
            min-height: 100vh;
        }

        .bg-image {
            background-image: url("{{asset('frontend/img/banner_login.png')}}");
            background-size: cover;
            background-position: center center;
        }
    </style>
</head>

<body>
@include('frontend.layouts.header')

{{--<div class="row m-4">--}}
{{--    <div class="col-md-6"></div>--}}
{{--    <div class="col-md-6">--}}
{{--        <div class="card p-4">--}}
{{--            <h4>Login</h4>--}}
{{--            <form action="{{route('user.login.post')}}" method="POST">--}}
{{--                @csrf--}}
{{--                <div class="form-group">--}}
{{--                    <label for="email">Email address:</label>--}}
{{--                    <input type="email" name="email" class="form-control" placeholder="Enter email" id="email">--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="pwd">Password:</label>--}}
{{--                    <input type="password" name="password" class="form-control" placeholder="Enter password" id="pwd">--}}
{{--                </div>--}}
{{--                <div class="form-group float-right">--}}
{{--                    <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="m-5">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-6 d-none d-md-flex bg-image"></div>


        <!-- The content half -->
        <div class="col-md-6 bg-light">
            <div class="login d-flex align-items-center py-5">

                <!-- Demo content-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 mx-auto">
                            <h3 class="">Login Page</h3>
{{--                            <p class="text-muted mb-4">Login Page</p>--}}
                            <form action="{{route('user.login.post')}}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input id="inputEmail" type="email" name="email" placeholder="Email address" required="" autofocus="" class="form-control rounded-pill  shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input id="inputPassword" type="password" name="password" placeholder="Password" required="" class="form-control rounded-pill  shadow-sm px-4 text-primary">
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                                    <label for="customCheck1" class="custom-control-label">Remember password</label>
                                </div>
                                <button type="submit" class="generic-btn mt-4 float-right mb-4 red-hover-btn text-uppercase">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div><!-- End -->

            </div>
        </div><!-- End -->

    </div>
</div>

@include('frontend.layouts.footer')

<script>

</script>
</body>
</html>
