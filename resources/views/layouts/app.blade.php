<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Darzi Shop</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css')  }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css')  }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.css')  }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')  }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.css')  }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.theme.default.min.css')  }}">
    <!-- End plugin css for this page -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css')  }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')  }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')  }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')  }}" />
</head>
<body>
<div class="container-scroller">
             @include('layouts.sidebar')

            <div class="container-fluid page-body-wrapper">
                @include('layouts.header')
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="page-header">
                            <h3 class="page-title"> {{isset($pageName) ? $pageName : ''}} </h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{isset($pageName) ? $pageName : ''}}</li>
                                </ol>
                            </nav>
                        </div>
                        @yield('content')
                    </div>
                    @include('layouts.footer')
                </div>
            </div>
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js')  }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('assets/vendors/chart.js/Chart.min.js')  }}"></script>
<script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js')  }}"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.min.js')  }}"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')  }}"></script>
<script src="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.js')  }}"></script>
<!-- End plugin js for this page -->
<!-- Plugin js for this page -->
<script src="{{ asset('assets/vendors/select2/select2.min.js')  }}"></script>
<script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js')  }}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('assets/js/off-canvas.js')  }}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js')  }}"></script>
<script src="{{ asset('assets/js/misc.js')  }}"></script>
<script src="{{ asset('assets/js/settings.js')  }}"></script>
<script src="{{ asset('assets/js/todolist.js')  }}"></script>
<script src="{{ asset('assets/js/select2.js')  }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('assets/js/dashboard.js')  }}"></script>
<!-- End custom js for this page -->
</body>
</html>
