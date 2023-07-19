<!-- last blue section start -->
{{--<div class="next-project">--}}
{{--    <div class="two-img">--}}
{{--        <img src="{{url('/images/dot-shape-primary.svg')}}" alt="Image"/>--}}
{{--        <img src="{{url('/images/dot-shape-white.svg')}}" alt="Image"/>--}}
{{--    </div>--}}
{{--    <div class="container">--}}
{{--        <h1>Have A Vision For Your</h1>--}}
{{--        <h1>Next Project? Let's Get Your</h1>--}}
{{--        <h1>14 Day Trial Started Now!</h1>--}}
{{--        <div class="btn-sec mt-5">--}}
{{--            <button>Learn More <img src="{{url('/images/arrow.png')}}" alt="Image"/></button>--}}
{{--            <button>Join With Us!</button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="one-img">--}}
{{--        <img src="{{url('/images/dot-shape-white.svg')}}" alt="Image"/>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 footer-first-col">
                <img src="{{url('/images/logo-main.svg')}}" alt="Image"/>
                <p>Virtual teaching is a marketplace filled with qualified teachers that will provide excellent teaching resources. We are happy to work with you in your learning journey.</p>
                <h4 class="m_right">Follow Us:</h4>
                <ul class="footer-icon">
                    <li><i class="fa fa-linkedin"></i></li>
                    <li><i class="fa fa-facebook"></i></li>
                    <li><i class="fa fa-twitter"></i></li>
                    <li><i class="fa fa-instagram"></i></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h4>Product</h4>
                <ul class="footer-link">

                    {{--                        <li><i class="fa fa-angle-right"></i>&nbsp;  <a class="" href="{{ url('/features') }}">Features</a></li>--}}
                    <li><i class="fa fa-angle-right"></i>&nbsp;  <a class="" href="{{ url('/price') }}">Pricing</a></li>
                    <li><i class="fa fa-angle-right"></i>&nbsp;  <a class="" href="{{ (auth()->user()) ? route('teacher.dashboard') : url('/login') }}">Log in</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h4>Company</h4>
                <ul class="footer-link">
                    <li><i class="fa fa-angle-right"></i>&nbsp;  <a class="" href="{{ url('/about') }}">About Us</a></li>
                    <li><i class="fa fa-angle-right"></i>&nbsp;  <a class="" href="{{ url('/blog') }}">Blog</a></li>
                </ul>
            </div>
            <div class="col-md-4 forth-col">
                <h4>Help</h4>
                <ul class="footer-link">
                    <li><i class="fa fa-angle-right"></i>&nbsp;  <a class="" href="{{ url('/contact') }}">Contact Us</a></li>
                    <li><i class="fa fa-angle-right"></i>&nbsp;  <a class="" href="{{ url('/term') }}">Terms Of Service</a></li>
                    <li><i class="fa fa-angle-right"></i>&nbsp;  <a class="" href="{{ url('/policy') }}">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-float-right">
        <img src="{{url('/images/dot-shape-primary.svg')}}" alt="Image"/>
    </div>
</div>
