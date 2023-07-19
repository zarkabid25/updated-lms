<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#">
                <i class="feather icon-menu"></i>
            </a>
            <a href="#">
                <img class="img-fluid pt-3 pl-4" src="{{asset('images/dummy-logo.png')}}" width="130" height="130" alt="Theme-Logo" />
            </a>
            <a class="mobile-options">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>

        @php
            $notifications = (new \App\Models\Notification())->where('status', 0)->where('role', '!=', 'admin')->get();
        @endphp

        <div class="navbar-container">
            <ul class="nav-right">
                <li class="header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-bell"></i>
{{--                            <span class="badge bg-c-pink">{{$count = notificationCount() }}</span>--}}
                            <span class="badge bg-c-pink">{{ count($notifications) }}</span>
                        </div>
                        <ul class="show-notification notification-view dropdown-menu"
                            data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="overflow: auto; max-height: 250px;">
                            <li>
                                <h6>Notifications</h6>

                                @if(count($notifications) > 0)
                                    <label class="label label-danger">New</label>
                                @endif
                            </li>
                            @forelse($notifications as $notification)
                                <li style="padding: 0 25px;">
                                    <a href="{{ route('admin.request-detail', ['id' => encrypt($notification->id), 'notif' => true]) }}" style="background-color: transparent;">
                                        <div class="media">
                                            @php
                                                $img = (new \App\Models\User())->where('id', $notification->user_id)->first()->image;
                                                $imagePath = !is_null($img) ? $img : 'TelK7BnW63IAN6zuTTwJkqZeuM0YI5aNc7aFqOyz.jpg';
                                            @endphp
{{--                                            <img class="d-flex align-self-center img-radius"--}}
{{--                                                 src="{{ asset('files/assets/images/'.$imagePath) }}"--}}
{{--                                                 alt="Generic placeholder image">--}}
                                            <div class="media-body">
                                                <h5 class="notification-user">{{ ucwords($notification->title) }}
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <span style="font-size: 12px;">{{ date('Y-m-d', strtotime($notification->created_at)) }}</span>
                                                </h5>

                                                <p class="notification-msg">{{ $notification->description }}</p>
                                                <span class="notification-time"></span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </li>

{{--                @php--}}
{{--                    $data = get_admin_auth(session()->get('data'));--}}
{{--                    $imagePath = explode('.', !is_null($data['image']) ? $data['image'] : 'TelK7BnW63IAN6zuTTwJkqZeuM0YI5aNc7aFqOyz.jpg');--}}
{{--                @endphp--}}
                <li class="user-profile header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
{{--                            <span>--}}
{{--                                        <img src="{{ asset('images/boy.png') }}"--}}
{{--                                             alt="" width="30"--}}
{{--                                             style="height:40px; width:40px; border-radius:50%;"> &nbsp;&nbsp; {{ auth()->user()->first_name }}--}}
{{--                            </span>--}}

                            <span>
                                        {{ auth()->user()->first_name }}</span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu"
                            data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <a href="{{ url('/logout') }}">
                                    <i class="feather icon-log-out"></i>Logout
                                </a>

                            </li>
{{--                            <li>--}}
{{--                                <a href="{{ route('admin.my-profile') }}">--}}
{{--                                    <i class="feather icon-user"></i>My Profile--}}
{{--                                </a>--}}

{{--                            </li>--}}
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

