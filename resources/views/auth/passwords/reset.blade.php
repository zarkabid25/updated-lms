

@extends('student.layouts.mcqs-layout')

@section('title', 'Reset Password')
<link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
@section('css')

    <style>
        body {
            font-family: "Roboto", sans-serif;
            background-color: #fff; }

        p {
            color: #b3b3b3;
            font-weight: 300; }

        h1, h2, h3, h4, h5, h6,
        .h1, .h2, .h3, .h4, .h5, .h6 {
            font-family: "Roboto", sans-serif; }

        a {
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease; }
        a:hover {
            text-decoration: none !important; }

        .content {
            padding: 7rem 0; }

        h2 {
            font-size: 20px; }

        .half, .half .container > .row {
            height: 100vh;
            min-height: 700px; }

        @media (max-width: 991.98px) {
            .half .bg {
                height: 200px; } }

        .half .contents {
            background: #f6f7fc; }

        .half .contents, .half .bg {
            width: 50%; }
        @media (max-width: 1199.98px) {
            .half .contents, .half .bg {
                width: 100%; } }
        .half .contents .form-control, .half .bg .form-control {
            border: none;
            -webkit-box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            height: 54px;
            background: #fff; }
        .half .contents .form-control:active, .half .contents .form-control:focus, .half .bg .form-control:active, .half .bg .form-control:focus {
            outline: none;
            -webkit-box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1); }

        .half .bg {
            background-size: cover;
            background-position: center; }

        .half a {
            color: #888;
            text-decoration: underline; }

        .half .btn {
            height: 54px;
            padding-left: 30px;
            padding-right: 30px; }

        .half .forgot-pass {
            position: relative;
            top: 2px;
            font-size: 14px; }

        .control {
            display: block;
            position: relative;
            padding-left: 30px;
            margin-bottom: 15px;
            cursor: pointer;
            font-size: 14px; }
        .control .caption {
            position: relative;
            top: .2rem;
            color: #888; }

        .control input {
            position: absolute;
            z-index: -1;
            opacity: 0; }

        .control__indicator {
            position: absolute;
            top: 2px;
            left: 0;
            height: 20px;
            width: 20px;
            background: #e6e6e6;
            border-radius: 4px; }

        .control--radio .control__indicator {
            border-radius: 50%; }

        .control:hover input ~ .control__indicator,
        .control input:focus ~ .control__indicator {
            background: #ccc; }

        .control input:checked ~ .control__indicator {
            background: #fb771a; }

        .control:hover input:not([disabled]):checked ~ .control__indicator,
        .control input:checked:focus ~ .control__indicator {
            background: #fb8633; }

        .control input:disabled ~ .control__indicator {
            background: #e6e6e6;
            opacity: 0.9;
            pointer-events: none; }

        .control__indicator:after {
            font-family: 'icomoon';
            content: '\e5ca';
            position: absolute;
            display: none;
            font-size: 16px;
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease; }

        .control input:checked ~ .control__indicator:after {
            display: block;
            color: #fff; }

        .control--checkbox .control__indicator:after {
            top: 50%;
            left: 50%;
            margin-top: -1px;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%); }

        .control--checkbox input:disabled ~ .control__indicator:after {
            border-color: #7b7b7b; }

        .control--checkbox input:disabled:checked ~ .control__indicator {
            background-color: #7e0cf5;
            opacity: .2; }

    </style>
@endsection

@section('content')
    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('{{asset("images/bg_1.jpg")}}');"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <h3>Reset Password for <strong>Lumiba</strong></h3>
                        <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
                        @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group first my-3">
                                <label for="username">Email</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$email ?? old('email')}}" placeholder="your-email@gmail.com" id="username">
                            </div>
                            @error('email')
                            <span class="alert alert-danger my-3" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group first my-3">
                            <label for="username">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" id="username">
                        </div>
                        @error('password')
                        <span class="alert alert-danger my-3" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group first my-3">
                        <label for="username">Password Confirmation</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Password Confirmation" id="username">
                    </div>
                    @error('password_confirmation')
                    <span class="alert alert-danger my-3" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                            {{-- <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><span class="caption">Remember me &nbsp;&nbsp;</span>
                                    <input type="checkbox" checked="checked"/>
                                    <div class="control__indicator"></div>
                                </label>
                                <span class="ml-auto"><a href="{{route('password.request')}}" class="forgot-pass"> Forgot Password</a></span>
                            </div> --}}
                            <input type="submit" value="Reset Password" class="btn btn-block my-3 btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('JS')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection