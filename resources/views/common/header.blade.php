<!-- Toggle NavBar Button -->
<button type="button" onclick="check_alarm()" style="background-color: #2c3250;" class="btn btn-primary res_nav" id="show_nav">
    <i class="fas fa-bars"></i>
</button>

<header class="main-header active-header active-header2">
    <div class="row">
        <div class="col-md-3 logo-col" style="text-align: center; padding-bottom: 10px; padding-top: 10px;">
            @if(auth()->user())
                @if(auth()->user()->role == '2')
                    <a href="{{url('/teacher/dashboard')}}">
                        <img src="{{url('/images/lumiba-logo.png')}}"  alt="Image" style="width: 100px; height: auto"/>
                    </a>
                @endif
            @elseif(auth()->user())
                @if(auth()->user()->role == '3')
                    <a href="{{url('/student/dashboard')}}">
                        <img src="{{url('/images/lumiba-logo.png')}}"  alt="Image" style="width: 100px; height: auto"/>
                    </a>
                @endif
            @else
                <a href="{{url('/')}}">
                    <img src="{{url('/images/lumiba-logo.png')}}"  alt="Image" style="width: 100px; height: auto"/>
                </a>
            @endif
        </div>
        <div class="col-md-7 menu-col" style="padding-top: 27px;">
            <nav class="navbar navbar-expand-lg navbar-light ">
                {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-lable="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}
                <div class="" id="navbarNavDropdown">
                    <ul class="nav navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="text-decoration: none" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <b>Home</b>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="top-nav-items dropdown-item" href="#">Action</a></li>
                                <li><a class="top-nav-items dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="top-nav-items dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        {{--                                @if(auth()->user())--}}
                        {{--                                    @if(auth()->user()->role == '2')--}}
                        {{--                                        <li><a class="" href="{{ url('/teacher/dashboard') }}">Home</a></li>--}}
                        {{--                                    @endif--}}
                        {{--                                @elseif(auth()->user())--}}
                        {{--                                    @if(auth()->user()->role == '3')--}}
                        {{--                                        <li><a class="" href="{{ url('/student/dashboard') }}">Home</a></li>--}}
                        {{--                                    @endif--}}
                        {{--                                @else--}}
                        {{--                                    <li><a class="" href="{{ url('/') }}">Home</a></li>--}}
                        {{--                                @endif--}}
                        {{--                                <li><a class="" href="{{ url('/about') }}">About Us</a></li>--}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="text-decoration: none" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <b>Pricing</b>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class=""><a class="top-nav-items dropdown-item" href="#">Action</a></li>
                                <li><a class="top-nav-items dropdown-item" href="#">Another action</a></li>
{{--                                <li><hr class="dropdown-divider"></li>--}}
                                <li><a class="top-nav-items dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>

{{--                        <li class="nav-item dropdown">--}}
{{--                            <a class="nav-link dropdown-toggle" style="text-decoration: none" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                <b>MCQ's</b>--}}
{{--                            </a>--}}

{{--                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                                <li class="p-0"><a class="top-nav-items dropdown-item" href="{{ route('get-year-mcqs') }}">Yearly</a></li>--}}
{{--                                <hr class="dropdown-divider mt-0">--}}

{{--                                <li class="p-0"><a class="top-nav-items dropdown-item" href="#">Topical</a></li>--}}
{{--                                <hr class="dropdown-divider mt-0">--}}

{{--                                <li class="p-0"><a class="top-nav-items dropdown-item" href="#">Mocks</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
                        {{--                                <li><a class="" href="{{ url('/features') }}">Features</a></li>--}}
                        <li class="nav-item"><a class="nav-link" href="#" style="text-decoration: none"><strong>Courses</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="#" style="text-decoration: none"><strong>Learning Material</strong></a></li>
                        {{--                                <li><a class="" href="{{ url('/contact') }}">Contact</a></li>--}}
                    </ul>
                </div>
            </nav>
        </div>

        @if(auth()->user())
            <div class="col-md-2 man-img-col text-end-btn" style="display: none">
                <a href="{{ url('/login') }}" class="btn loginbtn">Login</a>
                <a href="{{ url('register/here') }}" style="margin-left: 3%;" class="btn registerbtn">Sign Up</a>
            </div>
        @else
            <div class="col-md-2 man-img-col text-end-btn" style="padding-left: 0px; padding-top: 28px;">
                {{--                        <a href="{{ url('/login') }}" class="btn loginbtn">Login</a>--}}
                <a href="{{ url('/login') }}" class="login-text" style="text-decoration: none; color: black; font-size: 16px"><strong>Log in</strong></a>
                <a href="{{ url('register/here') }}" style="margin-left: 3%; border-radius: 50px; padding: 7px 35px;" class="btn btn-primary">Sign Up</a>
            </div>
        @endif
    </div>
</header>
