<style>
    .badge {
        position: relative;
        top: -20px;
        left: -25px;
        border: 1px solid black;
        border-radius: 50%;
    }
    button {
        margin:5px;
    }

    .nav-link{
        text-decoration: none !important;
    }
</style>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        @if(auth()->user())
            <a class="navbar-brand" href="{{ route('student.dashboard') }}">
                <img src="{{ asset('images/lumiba-logo.png') }}" width="80" alt="no image">
            </a>
        @else
            <a class="navbar-brand" href="{{ route('user-dashboard') }}">
                <img src="{{ asset('images/lumiba-logo.png') }}" width="80" alt="no image">
            </a>
        @endif

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
            <div class="row" style="width: 100% !important;">
                <div class="col-md-11 d-flex justify-content-end" style="padding-right: 0px !important;">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            @if(auth()->user())
                                <a class="nav-link active" aria-current="page" href="{{ route('student.dashboard') }}">Home</a>
                            @else
                                <a class="nav-link active" aria-current="page" href="{{ route('user-dashboard') }}">Home</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user-featured-courses') }}">Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user-instructors') }}">Tutor</a>
                        </li>

                        @if(!auth()->user())
                            @php
                                $entry_tests = (new \App\Models\EntryTestType())->all();
                            @endphp
                            <li class="nav-item dropdown">
                                <a class="nav-link " href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    Quiz
                                </a>
                                <ul class="dropdown-menu">
                                    @forelse($entry_tests as $entry_test)
                                        <li><a class="dropdown-item" href="{{ route('user-courses', ['id' => encrypt($entry_test->id)]) }}">{{ $entry_test->name }}</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                    @empty
                                    @endforelse
                                </ul>
                            </li>

{{--                            <li class="nav-item dropdown">--}}
{{--                                <a class="nav-link " href="#" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    Quiz--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu">--}}
{{--                                    <li><a class="dropdown-item" href="@if(!auth()->user()) {{ route('user-courses') }} @else {{ route('student.categories') }} @endif">BCAT</a></li>--}}
{{--                                    <li><hr class="dropdown-divider"></li>--}}
{{--                                    <li><a class="dropdown-item" href="@if(!auth()->user()) {{ route('user-courses') }} @else {{ route('student.categories') }} @endif">ECAT</a></li>--}}
{{--                                    <li><hr class="dropdown-divider"></li>--}}
{{--                                    <li><a class="dropdown-item" href="@if(!auth()->user()) {{ route('user-courses') }} @else {{ route('student.categories') }} @endif">MDCAT</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
                        @elseif(auth()->user() && auth()->user()->role === 2)
                        @else
                            @php
                                $entry_tests = (new \App\Models\EntryTestType())->all();
                            @endphp
                            <li class="nav-item dropdown">
                                <a class="nav-link " href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    Quiz
                                </a>
                                <ul class="dropdown-menu">
                                    @forelse($entry_tests as $entry_test)
                                        <li><a class="dropdown-item" href="{{ route('user-courses', ['id' => encrypt($entry_test->id)]) }}">{{ $entry_test->name }}</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                    @empty
                                    @endforelse
{{--                                    <li><a class="dropdown-item" href="@if(!auth()->user()) {{ route('user-courses') }} @else {{ route('student.categories') }} @endif">ECAT</a></li>--}}
{{--                                    <li><hr class="dropdown-divider"></li>--}}
{{--                                    <li><a class="dropdown-item" href="@if(!auth()->user()) {{ route('user-courses') }} @else {{ route('student.categories') }} @endif">MDCAT</a></li>--}}
                                </ul>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user-blogs') }}">Blogs</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact-us') }}">Contact</a>
                        </li>

                        @if(auth()->user())
                            <li class="nav-item">
                                @php
                                    $notifications = (new \App\Models\Notification())
                                    ->with('paymPlan')
                                    ->where('status', 0)
                                    ->where('user_id', auth()->user()->id)
                                    ->where('role', 'admin')
                                    ->get();
                                    //dd($notifications);
                                @endphp

                                <div class="dropdown">
                                <span id="group">
                                 <button type="button" class="btn btn-light shadow" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                 </button>
                                 <span class="badge" style="background-color: #eb4040; border: #eb4040">{{ count($notifications) }}</span>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @forelse($notifications as $notification)
                                        <li>
                                            <a class="dropdown-item" href="{{ route('user-update-notif', ['notif_id' => encrypt($notification->id) , 'p_id' => encrypt($notification->p_id)]) }}">
                                                <h5 class="notification-user"><strong>{{ substr_replace(ucwords($notification->title), "...", 20) }}</strong>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <span style="font-size: 12px;">12-04-2023</span>
                                                </h5>

                                                <p class="notification-msg">{{ substr_replace(ucwords($notification->description), "...", 40) }}</p>
                                            </a>
                                             <hr class="mt-0">
                                        </li>
                                    @empty
                                        <li>
                                            <p class="">No new notification</p>
                                            <hr class="mt-0">
                                        </li>
                                    @endforelse
                                </ul>
                            </span>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>

                <div class="col-md-1">
{{--                    <div class="dropdown">--}}
{{--                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                            Dropdown button--}}
{{--                        </button>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                    @if(auth()->user())
                        <div class="dropdown" style="text-align: right">
                            <div class="dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false">

                                    @php
                                        $imagePath = explode('.', !is_null(auth()->user()->image) ? auth()->user()->image : 'user-avatar.png');
                                    @endphp

                                    <img src="{{asset('images')."/". $imagePath[0].".".$imagePath[1]}}" alt="Image" width="40"
                                         style="color: white; border-radius: 50%;" class="tab-img show_prof_img" />
                                    {{--                            <i class="fa fa-caret-down"></i>--}}
                            </div>
                            <ul class="dropdown-menu nav-dropdown" style="inset: 40px auto auto -80px;">
                                @if(auth()->user()->hasRole('Student'))
                                    <li><a class="dropdown-item" href="{{ route('student.my-profile') }}">My Profile</a></li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('teacher.upload-profile') }}">My Profile</a></li>
                                @endif

                                @if(auth()->user()->hasRole('Student'))
                                    <li><a class="dropdown-item" href="{{ route('student.change-password') }}">Change Password</a></li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('teacher.teach-change-password') }}">Change Password</a></li>
                                @endif

                                <hr class="mt-0">
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
    {{--                            <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
                            </ul>
                        </div>
                    @else
                    @endif
                </div>
            </div>
        </div>

        @if(!auth()->user())
            <div class="Request-link">
                <a href="{{ route('login') }}" class="login-btn">Login</a>
                <a href="{{ route('register') }}" class="theme-btn">Get Started Free</a>

            </div>
        @else
        @endif
    </div>
</nav>
