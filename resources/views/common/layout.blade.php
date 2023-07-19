<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home | {{ env('APP_NAME') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{--    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style4.css') }}">
   


    <style>
        @font-face {
            font-family: KaushanScript-Regular;
            src: url('{{asset('fonts/KaushanScript-Regular.ttf')}}');
        }


        @font-face {
            font-family: Louis George Cafe Bold;
            src: url('{{asset('fonts/Louis George Cafe Bold.ttf')}}');

        }
        h3{
            font-family:KaushanScript-Regular !important;
        }

        body{
            font-family: Circular-Loom;

        }

        .banner{
            position: relative;
        }
        .banner_text{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }
        .textbold{
            color: white;
            font-size: 42px;
            font-family: Louis George Cafe Bold;
        }

        .nav li a{
            color: black !important;
        }

        .active-header .login-text{
            color: #fff !important;
        }

        .nav li a{
            color: black !important;
        }

        .active-header .nav li a{
            color: #fff !important;
        }

        .active-header .nav li ul .top-nav-items{
            color: #000 !important;
        }

        .active-header .nav li

        .active-header .login-text{
            color: #fff !important;
        }

        .our-community-right .cards{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-left: -15px;
            margin-right: -15px;
        }

        .our-community-right .cards.two-col .card{
            min-width: 0;
            flex: 0 0 50%;
            padding-bottom: 5px;
            padding-top: 5px;
            margin-left: -7px;
        }

        .our-community-right .cards.two-col .card .card-inner{
            border: solid 1px #dedede;
            height: auto;
            overflow: visible;
            padding: 0 25px 25px;
            border-radius: 20px;
        }

        .our-community-right .cards.two-col .card .card-inner .image{
            height: 180px;
            display: flex;
            align-items: flex-end;
            justify-content: center;
        }

        .our-community-right .cards.two-col .card .card-inner .image img{
            image-rendering: -webkit-optimize-contrast;
            height: auto;
            max-width: 100%;
            vertical-align: middle;
            width: auto;
            border: 0;
        }

        .our-community-right .cards .card .card-content{
            padding: 30px;
        }

        .our-community-right .cards.two-col .card .card-inner .card-content h3{
            font-size: 28px;
        }

        .our-community-right .cards.two-col .card:nth-child(2n){
            margin-top: 70px;
        }
    </style>
</head>
<body>

@yield('content')



@yield('JS')


</body>
</html>
