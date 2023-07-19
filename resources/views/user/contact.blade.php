@extends('user.layout')
@section('content')
    <!--<section class="page-banner">-->
    <!--    <img src="{{ asset('images/books.png') }}" alt="" class="books-banner">-->
    <!--    <img src="{{ asset('images/PLANT.png') }}" alt="" class="plant-img">-->
    <!--    <img src="{{ asset('images/lite.png') }}" alt="" class="lite-img">-->
    <!--    <img src="{{ asset('images/Vector11.png') }}" alt="" class="vector-img">-->
    <!--    <div class="container">-->
    <!--        <div class="page-banner-title">-->
    <!--            <h2>Contact Page</h2>-->
    <!--            <div class="bread-crumb">-->
    <!--                <p>Home <i class="fa-solid fa-chevron-right"></i> Contact Page</p>-->

    <!--            </div>-->
    <!--        </div>-->

    <!--    </div>-->
    <!--</section>-->
    <!-- Service-card -->
    <section class="service-card-section contact-page-services">
        <div class="container">
            <div class="services-card-wrapper">
                <div class="service-card">
                    <img src="{{ asset('images/msg.png') }}" alt="">
                    <div class="card-content">
                        <h3>Email</h3>
                        <p>lumibaprepsteam@gmail.com</p>
                    </div>
                </div>
                <div class="service-card">
                    <img src="{{ asset('images/icon.png') }}" alt="">
                    <div class="card-content">
                        <h3>Location</h3></h3>
                        <p>Karachi, Pakistan</p>
                    </div>
                </div>
                <div class="service-card">
                    <img src="{{ asset('images/call.png') }}" alt="">
                    <div class="card-content">
                        <h3>Phone Number</h3>
                        <p>+92 319 2330965</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Page -->

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 border border[#133344] rounded py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-11 mx-auto ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="contact-text">
                                            <h2>Drop Us a Line</h2>
                                            <p>Your email address will not be published. Required fields are marked
                                                *</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Form Tag Started -->

                                <form id="contact-form" name="contact-form" action="" method="POST">
                                    <div class="row">
                                        <div class="col-md-6 py-2">
                                            <input type="text" id="name" name="name" placeholder="Enter Your Name*"
                                                   class="form-control">
                                            <i class="fa-regular fa-user-large"></i>
                                        </div>
                                        <div class="col-md-6 py-2">
                                            <input type="email" id="name" name="email"
                                                   placeholder="Enter Your Email*" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 py-2">
                                            <select id="services">
                                                <option value="">Select service type</option>
                                                <option value="Service 2">Courses</option>
                                                <option value="Service 3">Quiz</option>
                                                <option value="Service 4">Tutor</option>
                                                <option value="Service 5">Student</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 py-2">
                                            <input type="tel" id="phone" name="phone"
                                                   placeholder="Enter Your Phone Number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 py-2 ">
                                                <textarea name="txtMsg" class="form-control"
                                                          placeholder="Enter Your Message here*"
                                                          style="width: 100%; height: 250px;"></textarea>
                                        </div>
                                    </div>
                                </form>

                                <!-- Form Tag Ended -->
                                <div class="row">
                                    <div class="col-md-12 py-5">
                                        <button type="button" class="contact-btn">POST A COMMENT</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
