<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Darrzi - Shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
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
    <style>

        .parent{
            height: 100vh;
        }
        .parent>.row{
            display: flex;
            align-items: center;
            height: 100%;
        }
        .col img{
            height:100px;
            width: 100%;
            cursor: pointer;
            transition: transform 1s;
            object-fit: cover;
        }
        .col label{
            overflow: hidden;
            position: relative;
        }
        .imgbgchk:checked + label>.tick_container{
            opacity: 1;
        }
        /*         aNIMATION */
        .imgbgchk:checked + label>img{
            transform: scale(1.25);
            opacity: 0.3;
        }
        .tick_container {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            cursor: pointer;
            text-align: center;
        }
        .tick {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            padding: 6px 12px;
            height: 40px;
            width: 40px;
            border-radius: 100%;
        }
        .modal {
            /*From Right/Left */
        }
        .modal.drawer {
            display: flex !important;
            pointer-events: none;
        }
        .modal.drawer * {
            pointer-events: none;
        }
        .modal.drawer .modal-dialog {
            margin: 0px;
            display: flex;
            flex: auto;
            transform: translate(25%, 0);
        }
        .modal.drawer .modal-dialog .modal-content {
            border: none;
            border-radius: 0px;
        }
        .modal.drawer .modal-dialog .modal-content .modal-body {
            overflow: auto;
        }
        .modal.drawer.show {
            pointer-events: auto;
        }
        .modal.drawer.show * {
            pointer-events: auto;
        }
        .modal.drawer.show .modal-dialog {
            transform: translate(0, 0);
        }
        .modal.drawer.right-align {
            flex-direction: row-reverse;
        }
        .modal.drawer.left-align:not(.show) .modal-dialog {
            transform: translate(-25%, 0);
        }
        /* CSS for round radio buttons */
        .radio-group {
            display: flex;
            flex-direction: row;
        }

        .radio-group label {
            display: flex;
            align-items: center;
            margin-right: 10px;
        }

        .radio-group input[type="radio"] {
            display: none;
        }

        .radio-button {
            position: relative;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 2px solid #000;
            margin-right: 5px;
        }

        .radio-group input[type="radio"]:checked + .radio-button {
            background-color: #000;
        }

        .radio-group input[type="radio"]:checked + .radio-button span {
            color: #fff;
        }

        .radio-button span {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            font-size: 14px;
            font-weight: bold;
        }

    </style>
</head>
<body>

<!-- preloader -->
<div id="loader-wrapper">
    <div id="loader"></div>
</div>


                @include('frontend.layouts.header')

                @yield('content')

                @include('frontend.layouts.footer')

<!-- JS here -->
<script src="{{asset('frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/js/one-page-nav-min.js')}}"></script>
<script src="{{asset('frontend/js/slick.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.meanmenu.min.js')}}"></script>
<script src="{{asset('frontend/js/ajax-form.js')}}"></script>
<script src="{{asset('frontend/js/fontawesome.min.js')}}"></script>
<script src="{{asset('frontend/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('frontend/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('frontend/js/plugins.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
<script>
    $('#search-result-list-div').hide();
    function searchProdcut(val) {
        $('#search-result-list-div').toggle();
        // alert("changed")
        $('#search-result-list').html('');

        $.ajax({
            url: '{{route('searchOption')}}',
            method: 'GET',
            data: {
                searchKeyword: val,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // console.log(response.html);
                $('#search-result-list').append(response.html)
            },
            error: function(error) {
                console.error(error);
            }
        });

    }
    function changeTotal(val, cart_id, product_item_id) {
        // console.log(val)
        // console.log(cart_id)
        // console.log(product_item_id)

        $.ajax({
            type: "POST",
            url: '{{route('update.my.cart.items')}}',
            data: {val: val, cart_id: cart_id, product_item_id: product_item_id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // dataType: json,
            success: function(res){
                // console.log(res)
                window.location.reload()
            },
            error: function(err){
                console.log(err);
            }
        });
    }
</script>
</body>
</html>
