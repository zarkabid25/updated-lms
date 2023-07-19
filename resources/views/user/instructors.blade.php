@extends('student.layouts.mcqs-layout')

@section('title', 'Instructors')

@section('content')
    <!--<section class="page-banner">-->
    <!--    <img src="{{ asset('images/books.png') }}" alt="" class="books-banner">-->
    <!--    <img src="{{ asset('images/PLANT.png') }}" alt="" class="plant-img">-->
    <!--    <img src="{{ asset('images/lite.png') }}" alt="" class="lite-img">-->
    <!--    <img src="{{ asset('images/Vector11.png') }}" alt="" class="vector-img">-->
    <!--    <div class="container">-->
    <!--        <div class="page-banner-title">-->
    <!--            <h2>instructor page</h2>-->
    <!--            <div class="bread-crumb">-->
    <!--                <p>Home <i class="fa-solid fa-chevron-right"></i> Featured Courses</p>-->

    <!--            </div>-->
    <!--        </div>-->

    <!--    </div>-->
    <!--</section>-->

    <!-- mem-section -->
    <section class="team-mem">
        <div class="container">
            <div class="py-5 team4">
                <div class="row justify-content-center mb-4">
                    <div class="col-md-7 text-center">
                        <h5 class="mb-3 text-danger">EXPERT TEACHER</h5>
                        <h2>Our Expert Teacher</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 mb-4 col-md-6">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/team/t1.jpg"
                                     alt="wrapkit" class="img-fluid rounded-circle" />
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="pt-2">
                                    <h5 class="mt-4 font-weight-medium mb-0"><b><a href="{{ route('user-instructor-detail') }}">Michael Doe</a></b></h5>
                                    <h6 class="subtitle mb-3 text-primary">Manager</h6>
                                    <ul class="list-inline social-links-list">
                                        <li><i class="fa-brands fa-twitter"></i></li>
                                        <li><i class="fa-brands fa-instagram"></i></li>
                                        <li><i class="fa-brands fa-facebook-f"></i></li>
                                        <li><i class="fa-brands fa-twitter"></i></li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 col-md-6">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/team/t1.jpg"
                                     alt="wrapkit" class="img-fluid rounded-circle" />
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="pt-2">
                                    <h5 class="mt-4 font-weight-medium mb-0"><b><a href="{{ route('user-instructor-detail') }}">Michael Doe</a></b></h5>
                                    <h6 class="subtitle mb-3 text-primary">Manager</h6>
                                    <ul class="list-inline social-links-list">
                                        <li><i class="fa-brands fa-twitter"></i></li>
                                        <li><i class="fa-brands fa-instagram"></i></li>
                                        <li><i class="fa-brands fa-facebook-f"></i></li>
                                        <li><i class="fa-brands fa-twitter"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 col-md-6">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/team/t1.jpg"
                                     alt="wrapkit" class="img-fluid rounded-circle" />
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="pt-2">
                                    <h5 class="mt-4 font-weight-medium mb-0"><b><a href="{{ route('user-instructor-detail') }}">Michael Doe</a></b></h5>
                                    <h6 class="subtitle mb-3 text-primary">Manager</h6>
                                    <ul class="list-inline social-links-list">
                                        <li><i class="fa-brands fa-twitter"></i></li>
                                        <li><i class="fa-brands fa-instagram"></i></li>
                                        <li><i class="fa-brands fa-facebook-f"></i></li>
                                        <li><i class="fa-brands fa-twitter"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 col-md-6">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/team/t1.jpg"
                                     alt="wrapkit" class="img-fluid rounded-circle" />
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="pt-2">
                                    <h5 class="mt-4 font-weight-medium mb-0"><b><a href="{{ route('user-instructor-detail') }}">Michael Doe</a></b></h5>
                                    <h6 class="subtitle mb-3 text-primary">Manager</h6>
                                    <ul class="list-inline social-links-list">
                                        <li><i class="fa-brands fa-twitter"></i></li>
                                        <li><i class="fa-brands fa-instagram"></i></li>
                                        <li><i class="fa-brands fa-facebook-f"></i></li>
                                        <li><i class="fa-brands fa-twitter"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 col-md-6">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/team/t1.jpg"
                                     alt="wrapkit" class="img-fluid rounded-circle" />
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="pt-2">
                                    <h5 class="mt-4 font-weight-medium mb-0"><b><a href="{{ route('user-instructor-detail') }}">Michael Doe</a></b></h5>
                                    <h6 class="subtitle mb-3 text-primary">Manager</h6>
                                    <ul class="list-inline social-links-list">
                                        <li><i class="fa-brands fa-twitter"></i></li>
                                        <li><i class="fa-brands fa-instagram"></i></li>
                                        <li><i class="fa-brands fa-facebook-f"></i></li>
                                        <li><i class="fa-brands fa-twitter"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 col-md-6">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/team/t1.jpg"
                                     alt="wrapkit" class="img-fluid rounded-circle" />
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="pt-2">
                                    <h5 class="mt-4 font-weight-medium mb-0"><b><a href="{{ route('user-instructor-detail') }}">Michael Doe</a></b></h5>
                                    <h6 class="subtitle mb-3 text-primary">Manager</h6>
                                    <ul class="list-inline social-links-list">
                                        <li><i class="fa-brands fa-twitter"></i></li>
                                        <li><i class="fa-brands fa-instagram"></i></li>
                                        <li><i class="fa-brands fa-facebook-f"></i></li>
                                        <li><i class="fa-brands fa-twitter"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection
