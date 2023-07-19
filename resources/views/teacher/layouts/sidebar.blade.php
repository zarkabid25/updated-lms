{{--<button type="button" onclick="check_alarm2()" style="background-color: #f2f2f2;color:black" class="btn btn-primary res_nav2" id="show_nav">--}}
{{--    <i class="fas fa-bars 3_d"></i>--}}
{{--    <i class="fa-solid fa-xmark krs"></i>--}}
{{--</button>--}}

<div class="sidebar shadow-lg vh-100" style="padding-top: 20px; padding-left: 0px; margin-left: 0px; height: 100% !important;">
    <div style="text-align: center">
        {{--        @php--}}
        {{--            $imagePath = explode('.', !is_null(auth()->user()->image) ? auth()->user()->image : 'user-avatar.png');--}}
        {{--        @endphp--}}

        {{--        <img src="{{asset('images')."/". $imagePath[0].".".$imagePath[1]}}" alt="Image"--}}
        {{--             style="color: white; border-radius: 50%;" class="tab-img show_prof_img" />--}}

        <p style="font-size: 22px; color: #122B83; font-weight: bold; margin-bottom: 0px;">{{ ucwords(auth()->user()->name) }}</p>
{{--        <h5 style="color: #122B83; font-weight: bold">{{ (auth()->user()->role == 2) ? '(Teacher)' : ''}}</h5>--}}
    </div>

    <ul class="nav-tabs tabs-left sideways" style="margin-top: 20px; list-style: none; padding-left: 0px !important; ">
        <li style="padding-left: 60px; margin-bottom: 20px" class=" {{ request()->routeIs('teacher.dashboard') ? 'active' : '' }}">
            <a href="{{ route('teacher.dashboard') }}" style="text-decoration: none">
                <span><i class="fa fa-home" style="font-size: 18px"></i></span>
                <span style="padding-left: 15px">Dashboard</span>
            </a>
        </li>

        <li style="padding-left: 60px; margin-bottom: 20px" class="{{ request()->routeIs('teacher.my-courses') ? 'active' : ''}}">
            <a href="{{ route('teacher.my-courses') }}" style="text-decoration: none">
                <span><i class="fa fa-play-circle" style="font-size: 18px"></i></span>
                <span style="padding-left: 15px">My Courses</span>
            </a>
        </li>

        <li style="padding-left: 60px; margin-bottom: 20px" class="{{ request()->routeIs('teacher.all-courses') ? 'active' : ''}}">
            <a href="{{ route('teacher.all-courses') }}" style="text-decoration: none">
                <span><i class="fa fa-play-circle" style="font-size: 18px"></i></span>
                <span style="padding-left: 15px">All Courses</span>
            </a>
        </li>

        <li style="padding-left: 60px; margin-bottom: 20px" class="{{ request()->routeIs('teacher.create-course') ? 'active' : ''}}">
            <a href="{{ route('teacher.create-course') }}" style="text-decoration: none">
                <span><i class="fa fa-play-circle" style="font-size: 18px"></i></span>
                <span style="padding-left: 15px">Create Course</span>
            </a>
        </li>

{{--        <li style="padding-left: 60px; margin-bottom: 20px" class="{{ request()->routeIs('teacher.my-students') ? 'active' : ''}}">--}}
{{--            <a href="{{ route('teacher.my-students') }}" style="text-decoration: none">--}}
{{--                <span><i class="fa fa-user" style="font-size: 18px"></i></span>--}}
{{--                <span style="padding-left: 15px">My Students</span>--}}
{{--            </a>--}}
{{--        </li>--}}

        <li style="padding-left: 60px; margin-bottom: 20px" class="{{ request()->routeIs('teacher.zoom-meeting') ? 'active' : ''}}">
            <a href="{{ route('teacher.zoom-meeting') }}" style="text-decoration: none">
                <span><i class="fa fa-meetup" style="font-size: 18px"></i></span>
                <span style="padding-left: 15px">Zoom Meeting</span>
            </a>
        </li>

        <li style="padding-left: 60px; margin-bottom: 20px" class="{{ request()->routeIs('teacher.create_meeting') ? 'active' : ''}}">
            <a href="{{ route('teacher.create_meeting') }}" style="text-decoration: none">
                <span><i class="fa fa-meetup" style="font-size: 18px"></i></span>
                <span style="padding-left: 15px">Create Meeting</span>
            </a>
        </li>

        <li style="padding-left: 60px; margin-bottom: 20px" class="{{ request()->routeIs('teacher.upload-profile') ? 'active' : ''}}">
            <a href="{{ route('teacher.upload-profile') }}" style="text-decoration: none">
                <span><i class="fa fa-bank" style="font-size: 18px"></i></span>
                <span style="padding-left: 15px">My Account</span>
            </a>
        </li>
    </ul>
    {{--    <div class="std_side_bar_profile" style="">--}}
    {{--        --}}
    {{--    </div>--}}

    {{--@if(\Request::route()->getName() == 'student.my-profile' || request()->route()->getName() == 'student.change-password'--}}
    {{--        || request()->route()->getName() == 'student.my-status')--}}
    {{--    <ul class="nav-tabs tabs-left sideways" style="margin-top: 20px;">--}}
    {{--        <li class="{{ request()->routeIs('student.my-profile') ? 'active' : ''}}">--}}
    {{--            <a href="{{ route('student.my-profile') }}" style="text-decoration: none">My profile</a></li>--}}
    {{--        <li class="{{ request()->routeIs('student.change-password') ? 'active' : ''}}">--}}
    {{--            <a href="{{ route('student.change-password') }}" style="text-decoration: none">Password</a>--}}
    {{--        </li>--}}
    {{--        <li class="#">--}}
    {{--            <a href="#" style="text-decoration: none">My Status</a>--}}
    {{--        </li>--}}
    {{--    </ul>--}}

    {{--    <div class="sidebar-logout">--}}
    {{--        <a href="{{ route('logout') }}">Logout</a>--}}
    {{--    </div>--}}

    {{--    <div class="" style="text-align: start; margin-top: 80px;">--}}
    {{--        <img src="{{ asset('images/dt1.png') }}" alt="no image" width="30">--}}
    {{--    </div>--}}
    {{--@else--}}


    {{--    <div class="" style="text-align: start; margin-top: 80px;">--}}
    {{--        <img src="{{ asset('images/dt1.png') }}" alt="no image" width="30">--}}
    {{--    </div>--}}


    {{--@endif--}}

</div>


{{--<script>--}}

{{--    function check_alarm2(){--}}
{{--        $(".side_bar_res").toggle();--}}
{{--        $(".krs").toggle();--}}
{{--        $(".3_d").toggle();--}}
{{--}--}}




{{--</script>--}}
