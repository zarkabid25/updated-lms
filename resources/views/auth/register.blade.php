@extends('student.layouts.mcqs-layout')

@section('title', 'Register')
@section('css')
    <style>
        body {
            background: #dfe7e9;
            font-family: 'Roboto', sans-serif;
        }
        .form-control {
            font-size: 16px;
            transition: all 0.4s;
            box-shadow: none;
        }
        .form-control:focus {
            border-color: #5cb85c;
        }
        .form-control, .btn {
            border-radius: 50px;
            outline: none !important;
        }
        .signup-form {
            width: 480px;
            margin: 0 auto;
            padding: 30px 0;
        }
        .signup-form form {
            border-radius: 5px;
            margin-bottom: 20px;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 40px;
        }
        .signup-form a {
            color: #5cb85c;
        }
        .signup-form h2 {
            text-align: center;
            font-size: 34px;
            margin: 10px 0 15px;
        }
        .signup-form .hint-text {
            color: #999;
            text-align: center;
            margin-bottom: 20px;
        }
        .signup-form .form-group {
            margin-bottom: 20px;
        }
        .signup-form .btn {
            font-size: 18px;
            line-height: 26px;
            font-weight: bold;
            text-align: center;
        }
        .signup-btn {
            text-align: center;
            border-color: #5cb85c;
            transition: all 0.4s;
        }
        .signup-btn:hover {
            background: #5cb85c;
            opacity: 0.8;
        }
        .or-seperator {
            margin: 50px 0 15px;
            text-align: center;
            border-top: 1px solid #e0e0e0;
        }
        .or-seperator b {
            padding: 0 10px;
            width: 40px;
            height: 40px;
            font-size: 16px;
            text-align: center;
            line-height: 40px;
            background: #fff;
            display: inline-block;
            border: 1px solid #e0e0e0;
            border-radius: 50%;
            position: relative;
            top: -22px;
            z-index: 1;
        }
        .social-btn .btn {
            color: #fff;
            margin: 10px 0 0 15px;
            font-size: 15px;
            border-radius: 50px;
            font-weight: normal;
            border: none;
            transition: all 0.4s;
        }
        .social-btn .btn:first-child {
            margin-left: 0;
        }
        .social-btn .btn:hover {
            opacity: 0.8;
        }
        .social-btn .btn-primary {
            background: #507cc0;
        }
        .social-btn .btn-info {
            background: #64ccf1;
        }
        .social-btn .btn-danger {
            background: #df4930;
        }
        .social-btn .btn i {
            float: left;
            margin: 3px 10px;
            font-size: 20px;
        }
    </style>
@endsection

@section('content')

<section style="margin-top: 15px;" class="cardbgcolor">
    <div class="signup-form">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <h2>Create an Account</h2>
            <p class="hint-text">Sign up with your social media account or email address</p>
            <div class="social-btn text-center">
                <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-facebook"></i> Facebook</a>
                <a href="#" class="btn btn-info btn-lg"><i class="fa fa-twitter"></i> Twitter</a>
                <a href="#" class="btn btn-danger btn-lg"><i class="fa fa-google"></i> Google</a>
            </div>
            <div class="or-seperator"><b>or</b></div>
            <div class="form-group">
                <input type="text" class="form-control input-lg @error('name') is-invalid @enderror" name="name"
                       value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Username" >
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <input type="email" class="form-control input-lg @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control input-lg @error('phone') is-invalid @enderror" name="phone"
                       value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Phone Number"
                       oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" class="form-control input-lg @error('password') is-invalid @enderror" name="password"
                       value="{{ old('password') }}" required autocomplete="password" autofocus id="password" placeholder="Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control input-lg @error('confirm_password') is-invalid @enderror" name="confirm_password"
                       value="{{ old('confirm_password') }}" required autocomplete="confirm_password" autofocus placeholder="Confirm Password">
                @error('confirm_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <select name="role" id="role"
                        class="form-control input-lg @error('role') is-invalid @enderror"
                        autocomplete="role" autofocus required>
                    <option selected disabled>Select Role</option>
                    <option value="2">Teacher</option>
                    <option value="3">Student</option>
                </select>
                @error('role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block signup-btn">Sign Up</button>
            </div>
        </form>
        <div class="text-center">Already have an account? <a href="{{ url('/login') }}">Login here</a></div>
    </div>

</section>

@endsection

{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>--}}
{{--<script src="{{ asset('js/custom.js') }}"></script>--}}

{{--<script>--}}
{{--    function check_alarm(){--}}
{{--        $(".main-header").toggle();--}}
{{--    }--}}
{{--</script>--}}

{{--</body>--}}
{{--</html>--}}

