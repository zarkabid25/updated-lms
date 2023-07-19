<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{env('APP_NAME')}}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- Plugins files -->
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <!-- <link href="css/font-awesome.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <!-- Fonts -->
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">--}}
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">--}}
    <link href="http://fonts.cdnfonts.com/css/times-new-roman" rel="stylesheet">
    {{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>--}}
    {{--    <link rel="stylesheet" href="{{ asset('css/style.css') }}">--}}
    {{--    <link rel="stylesheet" href="{{ asset('css/style4.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('css/student-style.css') }}">

    <style>
        body{
            font-family: Circular-Loom;
        }

        .navbar-nav .nav-item .dropdown-menu .mcq-cat{
            color: #000 !important;
        }

        .dropdown-image ul li {
            padding-left: 15px;
        }

        .dropdown-image ul li:hover{
            background-color: #c8c97d !important;
            color: white !important;
        }

        .dropdown-image ul li a:hover{
            color: white !important;
        }



        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            position:absolute;
            display: none;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rated:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
        .star-rating-complete{
            color: #c59b08;
        }
        .rating-container .form-control:hover, .rating-container .form-control:focus{
            background: #fff;
            border: 1px solid #ced4da;
        }
        .rating-container textarea:focus, .rating-container input:focus {
            color: #000;
        }
        .rated {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rated:not(:checked) > input {
            position:absolute;
            display: none;
        }
        .rated:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ffc700;
        }
        .rated:not(:checked) > label:before {
            content: '★ ';
        }
        .rated > input:checked ~ label {
            color: #ffc700;
        }
        .rated:not(:checked) > label:hover,
        .rated:not(:checked) > label:hover ~ label {
            color: #deb217;
        }
        .rated > input:checked + label:hover,
        .rated > input:checked + label:hover ~ label,
        .rated > input:checked ~ label:hover,
        .rated > input:checked ~ label:hover ~ label,
        .rated > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
    </style>

    @yield('css')

</head>

<body class="" style="">
{{-- @include('user.layout.lumiba-nav') --}}

{{--<div class="banner-two" style="width: 100%;"></div>--}}

<div class="container-fluid" style="padding: 0px">
    <div class="row" style="padding-top: 0px; margin-right: 0px;">
        <div class="col-md-12 tab-content-col">
            @include('student.layouts.alert')

            @yield('content')
        </div>
    </div>
</div>

{{-- @include('user.layout.footer') --}}
<!-- Bootstrap core JavaScript======= -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>--}}
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
@if(\Request::route()->getName() != 'student.chat')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endif
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        items: 1,
        // autoplay: true,
        autoPlaySpeed: 3000,
        autoPlayTimeout: 3000,
        autoplayHoverPause: true,
        autoplay: false,
        autoplayTimeout: 5000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    });

    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
    // html video with play-pause btn

    $(document).ready(function () {
        var ctrlVideo = document.getElementById("video");

        $('#video_play_btn').click(function () {
            if ($('#video_play_btn').hasClass("active"))
            {
                // console.log("play");
                ctrlVideo.play();

                // $('#video_play_btn').html("Pause");
                $('#video_play_btn').removeClass("active ");
                $('#video_play_btn').addClass("fa fa-pause-circle-o");
            } else
            {
                ctrlVideo.pause();

                // $('#video_play_btn').html("play");
                $('#video_play_btn').addClass("active");
                $('#video_play_btn').removeClass("fa fa-pause-circle-o ");
                $('#video_play_btn').addClass("fa fa-play-circle-o");
            }
        });

    });

</script>
@yield('JS')

</body>
</html>
