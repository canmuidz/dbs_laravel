<!DOCTYPE html>
<html lang="en">

<head>
    <title>Findstate - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/client/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('assets/client/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('assets/client/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('assets/client/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/client/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{asset('assets/client/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/style.css')}}">


    <style>
        .truncated {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 300px;
            /* Điều chỉnh giá trị theo nhu cầu của bạn */
            display: inline-block;
            /* Đảm bảo tiêu đề giữ nguyên kích thước */
            position: relative;
        }
    </style>
    @yield('css')
</head>

<body>


    @include('clients.blocks.header')

    <!-- main -->
    @yield('content')


    @include('clients.blocks.footer')



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="{{asset('assets/client/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/client/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('assets/client/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/client/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/client/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('assets/client/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/client/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('assets/client/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/client/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/client/js/aos.js')}}"></script>
    <script src="{{asset('assets/client/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('assets/client/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/client/js/jquery.timepicker.min.js')}}"></script>
    <script src="{{asset('assets/client/js/scrollax.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{asset('assets/client/js/google-map.js')}}"></script>
    <script src="{{asset('assets/client/js/main.js')}}"></script>
    @yield('js')

</body>

</html>