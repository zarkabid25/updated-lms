@php
    $categories = (new \App\Models\MCQsCategory())->all();
@endphp

<button type="button" onclick="check_alarm()" style="background-color: #2c3250;" class="btn btn-primary res_nav" id="show_nav">
    <i class="fas fa2 fa-bars"></i>
    <i class="fa-solid fa1 fa-xmark"></i>
  </button>
<header class="main-header active-header" style="padding: 0px; margin: 0px;">
    <div class="row " style="padding: 0px; margin: 0px; padding-bottom: 20px;">
        <div class="col-md-3 logo-col" style="padding-top: 10px;">
            <a href="{{ route('student.dashboard') }}" style="text-decoration: none">
                <img src="{{url('/images/lumiba-logo.png')}}" alt="Image"
                style="width: 80px; height: auto"/>
            </a>
        </div>
        <div class="col-md-7 menu-col" style="padding-top: 10px; display: flex; justify-content: center">
            <nav class="navbar navbar-default navbar-expand-lg navbar-light"
                 style="background-color: unset; border: 0px">
                <div class="container-fluid">

                    <div class="container-fluid collapse navbar-collapse" id="myNavbar"
                         style="padding: 0px;">
                        <ul class="nav navbar-nav" style="padding-top: 5px; color: white ">
                            <li><a href="{{ url('/about') }}" style="padding-top: 5px;">About Us</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" style="text-decoration: none; padding-top: 0px" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    MCQs
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @forelse($categories as $category)
                                        <a class="dropdown-item mcq-cat" href="{{ route('student.get-mcqs', ['id' => encrypt($category->id)]) }}">{{ ucwords($category->category_name) }}</a>
                                    @empty
                                    @endforelse
                                </div>
                            </li>
                            <li><a href="{{ url('/features') }}" style="padding-top: 5px;">Features</a></li>
                            <li><a href="{{ route('student.price-menu') }}" style="padding-top: 5px;">Pricing</a></li>
                            <li><a href="{{ route('my-blogs') }}" style="padding-top: 5px;">Blog</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="col-md-2 " style="padding-top: 20px;">
            <div class="dropdown dropdown-image">
                <button class="btn dropdown-toggle nav-img-btn" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: none">
                    @php
                        $imagePath = explode('.', !is_null(auth()->user()->image) ? auth()->user()->image : 'user-avatar.png');
                    @endphp

                    <img src="{{asset('images')."/". $imagePath[0].".".$imagePath[1]}}" alt="Image" class="show_prof_img head-user-img"
                         style="color: white; border-radius: 50%;" />

                    <span class="caret" style="color: white"></span>
                </button>

                <ul class="dropdown-menu" aria-labelledby="about-us" style="">
                    <li>
                        <a href="{{ route('student.my-profile') }}" style="text-decoration: none; color: black">My Profile</a></li>
                    <li>
                        <a href="{{ url('logout') }}" style="text-decoration: none; color: black">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<script>

    function check_alarm(){
        $(".main-header").toggle();
        $(".fa1").toggle();
        $(".fa2").toggle();
    }




</script>
