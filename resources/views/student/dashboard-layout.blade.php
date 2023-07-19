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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <!-- Plugins files -->
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <!-- <link href="css/font-awesome.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">--}}
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

        .dropdown-toggle:after {
            display: none;
        }
    </style>

    @yield('css')

</head>

<body class="" style="">
@include('user.layout.lumiba-nav')

{{--<div class="banner-two" style="width: 100%;"></div>--}}

<div class="container-fluid" style="padding: 0px">
    <div class="row" style="padding-top: 0px; margin-right: 0px;">

        @if(request()->routeIs('student.categories') || request()->routeIs('student.instruction-page') || request()->routeIs('test.categories'))
            <div class="col-md-12 tab-content-col">
                @include('student.layouts.alert')

                @yield('content')
            </div>
        @else
            <div class="col-md-3" style="">
                @include('student.layouts.sidebar')
            </div>

            <div class="col-md-9 tab-content-col">
                @include('student.layouts.alert')

                @yield('content')
            </div>
        @endif
    </div>
</div>

@include('user.layout.footer')

@yield('JS')

</body>
</html>
