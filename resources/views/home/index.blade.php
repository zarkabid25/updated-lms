@extends('user.layout')
@section('content')
    <!-- banner-section -->
    <section class="banner-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="banner-content">
                        <a href="" class="btn-tag">Education</a>
                        <h2>Cloud-based LMS
                            trusted by 1000+</h2>
                        <p class="pera-18 mb-3">Revolutionize Entry Test Preparation With Convenient, Budget-Friendly Learning On Our Platform </p>

                        <div class="contact-wrapper">

                            <div class="banner-links">
                                <a href="https://lumibapreps.com/featured_courses" class="category-btn">All Courses </a>
                                <a href="" class="banner-read">Read More </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="banner-image">
                        <img src="{{ asset('images/banner.png') }}" alt="">
                    </div>

                </div>
            </div>
        </div>

    </section>
    <!-- Service-card -->
    <div class="service-card-section">
        <div class="container">
            <div class="services-card-wrapper">
                <div class="service-card">
                    <img src="{{ asset('images/video.png') }}" alt="">
                    <div class="card-content">
                        <h3>Live Classes</h3>
                        <p>For Every Courses</p>
                    </div>
                </div>
                <div class="service-card">
                    <img src="{{ asset('images/user1.png') }}" alt="">
                    <div class="card-content">
                        <h3>Expert Teaceher</h3>
                        <p>With Unlimited Courses</p>
                    </div>
                </div>
                <div class="service-card">
                    <img src="{{ asset('images/user2.png') }}" alt="">
                    <div class="card-content">
                        <h3>Unlimited MCQs</h3>
                        <p>For Every University</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- info-management -->
    <section class="about-manage">
        <div class="container">

            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="info-management-image">
                                <img src="{{ asset('images/img.png') }}" alt="">
                            </div>

                        </div>
                        <div class="col-md-6 align-items-center d-flex">
                            <div class="about-content">
                                <a href="{{ route('user-about-us') }}" class="btn-tag">About Us</a>
                                <h2>Welcome To Lumiba Preps 
                                    
                                </h2>
                                <p>Since 2021, We Have Helped More Than 3.000 Student In Their Journey To Gain Admission To Their Dream University</p>
                                <ul class="about-pts">
                                    <li><i class="fa-regular fa-circle-check"></i><span>Explore a variety of preparation marterial</span></li>
                                    <li><i class="fa-regular fa-circle-check"></i><span>Re-imagined interective
                                                Live Classes</span></li>
                                    <li><i class="fa-regular fa-circle-check"></i><span>True white level course
                                                platform</span>
                                    </li>
                                </ul>
                                <a href="{{ route('user-about-us') }}" class="banner-read">More About <img src="{{ asset('images/right.png') }}" alt=""></a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- popular-sebject -->
    <!--<section class="popular-subject-section">-->
    <!--    <div class="container">-->
    <!--        <div class="main-content mb-5">-->
    <!--            <div class="popular-title">-->
    <!--                <a href="" class="btn-tag">Services</a>-->
    <!--                <h2>What We Are<span> Offering?</span>-->
    <!--                </h2>-->
    <!--            </div>-->
    <!--            <div class="popular-description">-->
                    <!--<p>Forging relationships between multi to national-->
                    <!--    governments and global NGOs begins.</p>-->

    <!--            </div>-->
                <!--<div class="btn-category-wrapp">-->
                <!--    <a href="" class="category-btn">All Categories <img src="{{ asset('images/right.png') }}" alt=""></a>-->

                <!--</div>-->

    <!--        </div>-->
    <!--        <div class="row">-->
    <!--            <div class="col-md-3">-->
    <!--                <div class="popular-card">-->
    <!--                    <img src="{{ asset('images/pop.png') }}" alt="">-->
    <!--                    <h3>ECAT</h3>-->
    <!--                    <p>Engineering University Entry Test</p>-->
    <!--                </div>-->

    <!--            </div>-->
    <!--            <div class="col-md-3">-->
    <!--                <div class="popular-card">-->
    <!--                    <img src="{{ asset('images/pop.png') }}" alt="">-->
    <!--                    <h3>BCAT</h3>-->
    <!--                    <p>Business University Enry Test</p>-->
    <!--                </div>-->

    <!--            </div>-->
    <!--            <div class="col-md-3">-->
    <!--                <div class="popular-card">-->
    <!--                    <img src="{{ asset('images/pop.png') }}" alt="">-->
    <!--                    <h3>Digital SAT </h3>-->
    <!--                    <p>Live Classes For SAT</p>-->
    <!--                </div>-->

    <!--            </div>-->
    <!--            <div class="col-md-3">-->
    <!--                <div class="popular-card">-->
    <!--                    <img src="{{ asset('images/pop.png') }}" alt="">-->
    <!--                    <h3>Career Guidance</h3>-->
    <!--                    <p>One On One Session</p>-->
    <!--                </div>-->

    <!--            </div>-->
    <!--            <div class="col-md-3">-->
    <!--                <div class="popular-card">-->
    <!--                    <img src="{{ asset('images/pop.png') }}" alt="">-->
    <!--                    <h3>SOP Writing</h3>-->
    <!--                    <p>Application Form</p>-->
    <!--                </div>-->

    <!--            </div>-->
    <!--            <div class="col-md-3">-->
    <!--                <div class="popular-card">-->
    <!--                    <img src="{{ asset('images/pop.png') }}" alt="">-->
    <!--                    <h3>IELTS</h3>-->
    <!--                    <p>Live Session</p>-->
    <!--                </div>-->

    <!--            </div>-->
    <!--            <div class="col-md-3">-->
    <!--                <div class="popular-card">-->
    <!--                    <img src="{{ asset('images/pop.png') }}" alt="">-->
    <!--                    <h3>Practice Course Pack</h3>-->
    <!--                    <p>For university Entry Test</p>-->
    <!--                </div>-->

    <!--            </div>-->
    <!--            <div class="col-md-3">-->
    <!--                <div class="popular-card">-->
    <!--                    <img src="{{ asset('images/pop.png') }}" alt="">-->
    <!--                    <h3>Live Recorded Classes</h3>-->
    <!--                    <p>For University Entry test</p>-->
    <!--                </div>-->

    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- online-courses -->
    <section class="online-courses">
        <div class="container">
            <div class="testimonial-section-title mb-5">
                <a href="" class="btn-tag">Course List</a>
                <h2>Perfect Online <span>Course</span><br>
                    For Your Carrer</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="course-card"> <!-- Main Card Div -->
                        <div class="card-image"> <!--  Card Image + Save icon #02747f -->
                            <i class="fa-regular fa-bookmark"></i>
                            <img src="{{ asset('images/lms.png') }}">
                        </div>
                        <div class="card-description"> <!--  Card rating star icon + rating number + reviews -->
                            <div class="star-icon">
                                <ul>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                                <span>5.00(99)</span>

                            </div>
                            <div class="card-heading"> <!-- Card Course title -->
                                <h3>IBA Karachi Round-2</h3>
                                <div class="card-user-icon">
                                    <!-- Card Course students icon + course Time in Hours -->
                                    <i class="fa-thin fa-user"></i>
                                    <span>12</span>

                                </div>
                            </div>
                            <div class="card-teacher-detail"> <!-- Card Mentor photo + name -->
                                <img src="{{ asset('images/lms-thumb.png') }}">
                                <span>By <a href="#">Shahid Rasool </a> in <br><a href="#">Karachi</a></span>
                            </div>
                        </div>

                        <div class="course-card-footer">
                            <h3 class="course-price">₨ 2,000.00 / month</h3>
                            <div class="text-center">
                                    <span class="course-booked"> <i class="fa-regular fa-circle"></i> 10% Booked
                                    </span>
                            </div>
                            <div class="addto-cart-box">
                                <a href="" class="add-cart">
                                    <svg width="13" height="15" viewBox="0 0 13 15"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.2422 3.51562H10.4567C10.2239 1.53873 8.53839 0 6.5 0C4.46161 0 2.7761 1.53873 2.54334 3.51562H0.757812C0.434199 3.51562 0.171875 3.77795 0.171875 4.10156V14.4141C0.171875 14.7377 0.434199 15 0.757812 15H12.2422C12.5658 15 12.8281 14.7377 12.8281 14.4141V4.10156C12.8281 3.77795 12.5658 3.51562 12.2422 3.51562ZM6.5 1.17188C7.89113 1.17188 9.04939 2.18716 9.27321 3.51562H3.72679C3.95062 2.18716 5.10887 1.17188 6.5 1.17188ZM11.6562 13.8281H1.34375V4.6875H2.51562V6.44531C2.51562 6.76893 2.77795 7.03125 3.10156 7.03125C3.42518 7.03125 3.6875 6.76893 3.6875 6.44531V4.6875H9.3125V6.44531C9.3125 6.76893 9.57482 7.03125 9.89844 7.03125C10.2221 7.03125 10.4844 6.76893 10.4844 6.44531V4.6875H11.6562V13.8281Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    Add to cart</a>
                            </div>

                        </div>
                    </div>


                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="course-card"> <!-- Main Card Div -->
                        <div class="card-image"> <!--  Card Image + Save icon #02747f -->
                            <i class="fa-regular fa-bookmark"></i>
                            <img src="{{ asset('images/Slide3.png') }}">
                        </div>
                        <div class="card-description"> <!--  Card rating star icon + rating number + reviews -->
                            <div class="star-icon">
                                <ul>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                                <span>5.00(99)</span>

                            </div>
                            <div class="card-heading"> <!-- Card Course title -->
                                <h3>IBA Karachi NTHP Test</h3>
                                <div class="card-user-icon">
                                    <!-- Card Course students icon + course Time in Hours -->
                                    <i class="fa-thin fa-user"></i>
                                    <span>12</span>

                                </div>
                            </div>
                            <div class="card-teacher-detail"> <!-- Card Mentor photo + name -->
                                <img src="{{ asset('images/lms-thumb.png') }}">
                                <span>By <a href="#">Shahid Rasool </a> in <br><a href="#">IBA</a></span>
                            </div>
                        </div>

                        <div class="course-card-footer">
                            <h3 class="course-price">₨ 2,000.00 / month</h3>
                            <div class="text-center">
                                    <span class="course-booked"> <i class="fa-regular fa-circle"></i> 100% Booked
                                    </span>
                            </div>
                            <div class="addto-cart-box">
                                <a href="" class="add-cart">
                                    <svg width="13" height="15" viewBox="0 0 13 15"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.2422 3.51562H10.4567C10.2239 1.53873 8.53839 0 6.5 0C4.46161 0 2.7761 1.53873 2.54334 3.51562H0.757812C0.434199 3.51562 0.171875 3.77795 0.171875 4.10156V14.4141C0.171875 14.7377 0.434199 15 0.757812 15H12.2422C12.5658 15 12.8281 14.7377 12.8281 14.4141V4.10156C12.8281 3.77795 12.5658 3.51562 12.2422 3.51562ZM6.5 1.17188C7.89113 1.17188 9.04939 2.18716 9.27321 3.51562H3.72679C3.95062 2.18716 5.10887 1.17188 6.5 1.17188ZM11.6562 13.8281H1.34375V4.6875H2.51562V6.44531C2.51562 6.76893 2.77795 7.03125 3.10156 7.03125C3.42518 7.03125 3.6875 6.76893 3.6875 6.44531V4.6875H9.3125V6.44531C9.3125 6.76893 9.57482 7.03125 9.89844 7.03125C10.2221 7.03125 10.4844 6.76893 10.4844 6.44531V4.6875H11.6562V13.8281Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    Add to cart</a>
                            </div>

                        </div>
                    </div>


                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="course-card"> <!-- Main Card Div -->
                        <div class="card-image"> <!--  Card Image + Save icon #02747f -->
                            <i class="fa-regular fa-bookmark"></i>
                            <img src="{{ asset('images/Thumbnail-2.png') }}">
                        </div>
                        <div class="card-description"> <!--  Card rating star icon + rating number + reviews -->
                            <div class="star-icon">
                                <ul>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                                <span>5.00(99)</span>

                            </div>
                            <div class="card-heading"> <!-- Card Course title -->
                                <h3>Digital SAT(Live Classes)</h3>
                                <div class="card-user-icon">
                                    <!-- Card Course students icon + course Time in Hours -->
                                    <i class="fa-thin fa-user"></i>
                                    <span>12</span>

                                </div>
                            </div>
                            <div class="card-teacher-detail"> <!-- Card Mentor photo + name -->
                                <img src="{{ asset('images/lms-thumb.png') }}">
                                <span>By <a href="#">Shahid Rasool </a> in <br><a href="#">IBA</a></span>
                            </div>
                        </div>

                        <div class="course-card-footer">
                            <h3 class="course-price">₨ 2,000.00 / month</h3>
                            <div class="text-center">
                                    <span class="course-booked"> <i class="fa-regular fa-circle"></i> 1000% Booked
                                    </span>
                            </div>

                            <div class="addto-cart-box">
                                <a href="" class="add-cart">
                                    <svg width="13" height="15" viewBox="0 0 13 15"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.2422 3.51562H10.4567C10.2239 1.53873 8.53839 0 6.5 0C4.46161 0 2.7761 1.53873 2.54334 3.51562H0.757812C0.434199 3.51562 0.171875 3.77795 0.171875 4.10156V14.4141C0.171875 14.7377 0.434199 15 0.757812 15H12.2422C12.5658 15 12.8281 14.7377 12.8281 14.4141V4.10156C12.8281 3.77795 12.5658 3.51562 12.2422 3.51562ZM6.5 1.17188C7.89113 1.17188 9.04939 2.18716 9.27321 3.51562H3.72679C3.95062 2.18716 5.10887 1.17188 6.5 1.17188ZM11.6562 13.8281H1.34375V4.6875H2.51562V6.44531C2.51562 6.76893 2.77795 7.03125 3.10156 7.03125C3.42518 7.03125 3.6875 6.76893 3.6875 6.44531V4.6875H9.3125V6.44531C9.3125 6.76893 9.57482 7.03125 9.89844 7.03125C10.2221 7.03125 10.4844 6.76893 10.4844 6.44531V4.6875H11.6562V13.8281Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    Add to cart</a>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
            <div class="text-center mt-5">
                <a href="" class="theme-btn">Load More</a>
            </div>
        </div>

    </section>

    <!-- contact -->
    <section class="contect-wrapp">
        <img src="{{ asset('images/Group 28.png') }}" alt="" class="dots-pic">
        <img src="{{ asset('images/shape.png') }}" alt="" class="shape-pic">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-content">
                        <!--<a href="" class="btn-tag">Course List</a>-->
                        <h2>Register Your <span>Account</span> Get
                            free access to <strong>80000</strong> MCQs</h2>

                    </div>
                    <div class="video-content">
                        <!-- Button trigger modal -->
                        <div class="video-wrapp">
                            <button type="button" class="btn btn-primary video-btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                <img src="" alt="">
                            </button>{{ asset('images/videothumb1.png') }}
                            <div class="video-description">
                                <p>"Learn And Practice In A Unique Way, And Practice Multiple Choice Question (MCQs) From Anywhere In Pakistan While Receiving Daily Performance Update."</p>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <video width="100%" height="240" controls>
                                            <source src="{{ asset('videos/video1.mp4') }}" type="video/mp4">

                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                    <!-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="contact-div">
                        <h3>Fill Your Registration</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" placeholder="Your Name" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" placeholder="Your Name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Your Name" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                    <textarea name="" placeholder="Address" id="" cols="30" rows="10"
                                              class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="submit-wrapp">
                                <input type="submit" value="Sign Up" name="" id="submit-btn">
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- arrange-learning -->
    <!--<section class="arrange-learning">-->
    <!--    <div class="container">-->
    <!--        <div class="arrange-content">-->
    <!--            <div class="arrange-title">-->
    <!--                <a href="" class="btn-tag">Event List</a>-->
    <!--                <h2>We Arrange learning-->
    <!--                    event for <span>Student</span></h2>-->
    <!--            </div>-->
    <!--            <div class="arrange-pera">-->
    <!--                <p>Forging relationships between multi to national-->
    <!--                    governments and global NGOs begins.</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="row">-->
    <!--            <div class="col-md-12">-->
    <!--                <div class="work-tabs-style">-->
    <!--                    <div>-->
    <!--                        <ul class="nav nav-pills">-->
    <!--                            <li class="active">-->
    <!--                                <a href="#1a" data-toggle="tab">Monday</a>-->
    <!--                            </li>-->
    <!--                            <li><a href="#2a" data-toggle="tab">Tuesday</a>-->
    <!--                            </li>-->
    <!--                            <li><a href="#3a" data-toggle="tab">Wednesday</a>-->
    <!--                            </li>-->
    <!--                            <li><a href="#4a" data-toggle="tab">Thrusday</a>-->
    <!--                            </li>-->
    <!--                            <li><a href="#5a" data-toggle="tab">Friday</a>-->
    <!--                            </li>-->
    <!--                        </ul>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-12">-->
    <!--                <div class="tab-content clearfix">-->
    <!--                    <div class="tab-pane active" id="1a">-->
    <!--                        <div class="arrange-card">-->
    <!--                            <img src="{{ asset('images/arrange.png') }}" alt="arrange">-->
    <!--                            <div class="arrange-card-content">-->
    <!--                                <div>-->
    <!--                                    <i class="fa-regular fa-clock"></i> <span class="time">10.00Am - 11.00 am-->
    <!--                                        </span>-->
    <!--                                    <span class="authore-name">Mehedii .H</span><span class="job-title">- Event-->
    <!--                                            Speaker</span>-->
    <!--                                </div>-->
    <!--                                <h3>Forging relationships between multi to national governments and global.</h3>-->
    <!--                                <a href="" class="read-more">Read More <i-->
    <!--                                        class="fa-solid fa-chevron-right"></i></a>-->

    <!--                            </div>-->

    <!--                        </div>-->
    <!--                        <div class="arrange-card">-->
    <!--                            <img src="{{ asset('images/arrange.png') }}" alt="arrange">-->
    <!--                            <div class="arrange-card-content">-->
    <!--                                <div>-->
    <!--                                    <i class="fa-regular fa-clock"></i> <span class="time">10.00Am - 11.00 am-->
    <!--                                        </span>-->
    <!--                                    <span class="authore-name">Mehedii .H</span><span class="job-title">- Event-->
    <!--                                            Speaker</span>-->
    <!--                                </div>-->
    <!--                                <h3>Forging relationships between multi to national governments and global.</h3>-->
    <!--                                <a href="" class="read-more">Read More <i-->
    <!--                                        class="fa-solid fa-chevron-right"></i></a>-->

    <!--                            </div>-->

    <!--                        </div>-->
    <!--                        <div class="arrange-card">-->
    <!--                            <img src="{{ asset('images/arrange.png') }}" alt="arrange">-->
    <!--                            <div class="arrange-card-content">-->
    <!--                                <div>-->
    <!--                                    <i class="fa-regular fa-clock"></i> <span class="time">10.00Am - 11.00 am-->
    <!--                                        </span>-->
    <!--                                    <span class="authore-name">Mehedii .H</span><span class="job-title">- Event-->
    <!--                                            Speaker</span>-->
    <!--                                </div>-->
    <!--                                <h3>Forging relationships between multi to national governments and global.</h3>-->
    <!--                                <a href="" class="read-more">Read More <i-->
    <!--                                        class="fa-solid fa-chevron-right"></i></a>-->

    <!--                            </div>-->

    <!--                        </div>-->
    <!--                        <div class="arrange-card">-->
    <!--                            <img src="{{ asset('images/arrange.png') }}" alt="arrange">-->
    <!--                            <div class="arrange-card-content">-->
    <!--                                <div>-->
    <!--                                    <i class="fa-regular fa-clock"></i> <span class="time">10.00Am - 11.00 am-->
    <!--                                        </span>-->
    <!--                                    <span class="authore-name">Mehedii .H</span><span class="job-title">- Event-->
    <!--                                            Speaker</span>-->
    <!--                                </div>-->
    <!--                                <h3>Forging relationships between multi to national governments and global.</h3>-->
    <!--                                <a href="" class="read-more">Read More <i-->
    <!--                                        class="fa-solid fa-chevron-right"></i></a>-->

    <!--                            </div>-->

    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="tab-pane" id="2a">-->
    <!--                        <div class="arrange-card">-->
    <!--                            <img src="{{ asset('images/arrange.png') }}" alt="arrange">-->
    <!--                            <div class="arrange-card-content">-->
    <!--                                <div>-->
    <!--                                    <i class="fa-regular fa-clock"></i> <span class="time">10.00Am - 11.00 am-->
    <!--                                        </span>-->
    <!--                                    <span class="authore-name">Mehedii .H</span><span class="job-title">- Event-->
    <!--                                            Speaker</span>-->
    <!--                                </div>-->
    <!--                                <h3>Card 2Forging relationships between multi to national governments and-->
    <!--                                    global.</h3>-->
    <!--                                <a href="" class="read-more">Read More <i-->
    <!--                                        class="fa-solid fa-chevron-right"></i></a>-->

    <!--                            </div>-->

    <!--                        </div>-->
    <!--                        <div class="arrange-card">-->
    <!--                            <img src="{{ asset('images/arrange.png') }}" alt="arrange">-->
    <!--                            <div class="arrange-card-content">-->
    <!--                                <div>-->
    <!--                                    <i class="fa-regular fa-clock"></i> <span class="time">10.00Am - 11.00 am-->
    <!--                                        </span>-->
    <!--                                    <span class="authore-name">Mehedii .H</span><span class="job-title">- Event-->
    <!--                                            Speaker</span>-->
    <!--                                </div>-->
    <!--                                <h3>Forging relationships between multi to national governments and global.</h3>-->
    <!--                                <a href="" class="read-more">Read More <i-->
    <!--                                        class="fa-solid fa-chevron-right"></i></a>-->

    <!--                            </div>-->

    <!--                        </div>-->
    <!--                        <div class="arrange-card">-->
    <!--                            <img src="{{ asset('images/arrange.png') }}" alt="arrange">-->
    <!--                            <div class="arrange-card-content">-->
    <!--                                <div>-->
    <!--                                    <i class="fa-regular fa-clock"></i> <span class="time">10.00Am - 11.00 am-->
    <!--                                        </span>-->
    <!--                                    <span class="authore-name">Mehedii .H</span><span class="job-title">- Event-->
    <!--                                            Speaker</span>-->
    <!--                                </div>-->
    <!--                                <h3>Forging relationships between multi to national governments and global.</h3>-->
    <!--                                <a href="" class="read-more">Read More <i-->
    <!--                                        class="fa-solid fa-chevron-right"></i></a>-->

    <!--                            </div>-->

    <!--                        </div>-->
    <!--                        <div class="arrange-card">-->
    <!--                            <img src="{{ asset('images/arrange.png') }}" alt="arrange">-->
    <!--                            <div class="arrange-card-content">-->
    <!--                                <div>-->
    <!--                                    <i class="fa-regular fa-clock"></i> <span class="time">10.00Am - 11.00 am-->
    <!--                                        </span>-->
    <!--                                    <span class="authore-name">Mehedii .H</span><span class="job-title">- Event-->
    <!--                                            Speaker</span>-->
    <!--                                </div>-->
    <!--                                <h3>Forging relationships between multi to national governments and global.</h3>-->
    <!--                                <a href="" class="read-more">Read More <i-->
    <!--                                        class="fa-solid fa-chevron-right"></i></a>-->

    <!--                            </div>-->

    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="tab-pane" id="3a">-->
    <!--                        <div class="arrange-card">-->
    <!--                            <img src="{{ asset('images/arrange.png') }}" alt="arrange">-->
    <!--                            <div class="arrange-card-content">-->
    <!--                                <div>-->
    <!--                                    <i class="fa-regular fa-clock"></i> <span class="time">10.00Am - 11.00 am-->
    <!--                                        </span>-->
    <!--                                    <span class="authore-name">Mehedii .H</span><span class="job-title">- Event-->
    <!--                                            Speaker</span>-->
    <!--                                </div>-->
    <!--                                <h3>Card 3Forging relationships between multi to national governments and-->
    <!--                                    global.</h3>-->
    <!--                                <a href="" class="read-more">Read More <i-->
    <!--                                        class="fa-solid fa-chevron-right"></i></a>-->

    <!--                            </div>-->

    <!--                        </div>-->
    <!--                        <div class="arrange-card">-->
    <!--                            <img src="{{ asset('images/arrange.png') }}" alt="arrange">-->
    <!--                            <div class="arrange-card-content">-->
    <!--                                <div>-->
    <!--                                    <i class="fa-regular fa-clock"></i> <span class="time">10.00Am - 11.00 am-->
    <!--                                        </span>-->
    <!--                                    <span class="authore-name">Mehedii .H</span><span class="job-title">- Event-->
    <!--                                            Speaker</span>-->
    <!--                                </div>-->
    <!--                                <h3>Forging relationships between multi to national governments and global.</h3>-->
    <!--                                <a href="" class="read-more">Read More <i-->
    <!--                                        class="fa-solid fa-chevron-right"></i></a>-->

    <!--                            </div>-->

    <!--                        </div>-->
    <!--                        <div class="arrange-card">-->
    <!--                            <img src="{{ asset('images/arrange.png') }}" alt="arrange">-->
    <!--                            <div class="arrange-card-content">-->
    <!--                                <div>-->
    <!--                                    <i class="fa-regular fa-clock"></i> <span class="time">10.00Am - 11.00 am-->
    <!--                                        </span>-->
    <!--                                    <span class="authore-name">Mehedii .H</span><span class="job-title">- Event-->
    <!--                                            Speaker</span>-->
    <!--                                </div>-->
    <!--                                <h3>Forging relationships between multi to national governments and global.</h3>-->
    <!--                                <a href="" class="read-more">Read More <i-->
    <!--                                        class="fa-solid fa-chevron-right"></i></a>-->

    <!--                            </div>-->

    <!--                        </div>-->
    <!--                        <div class="arrange-card">-->
    <!--                            <img src="{{ asset('images/arrange.png') }}" alt="arrange">-->
    <!--                            <div class="arrange-card-content">-->
    <!--                                <div>-->
    <!--                                    <i class="fa-regular fa-clock"></i> <span class="time">10.00Am - 11.00 am-->
    <!--                                        </span>-->
    <!--                                    <span class="authore-name">Mehedii .H</span><span class="job-title">- Event-->
    <!--                                            Speaker</span>-->
    <!--                                </div>-->
    <!--                                <h3>Forging relationships between multi to national governments and global.</h3>-->
    <!--                                <a href="" class="read-more">Read More <i-->
    <!--                                        class="fa-solid fa-chevron-right"></i></a>-->

    <!--                            </div>-->

    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="tab-pane" id="4a">-->
    <!--                        <div class="arrange-card">-->
    <!--                            <img src="{{ asset('images/arrange.png') }}" alt="arrange">-->
    <!--                            <div class="arrange-card-content">-->
    <!--                                <div>-->
    <!--                                    <i class="fa-regular fa-clock"></i> <span class="time">10.00Am - 11.00 am-->
    <!--                                        </span>-->
    <!--                                    <span class="authore-name">Mehedii .H</span><span class="job-title">- Event-->
    <!--                                            Speaker</span>-->
    <!--                                </div>-->
    <!--                                <h3>Card 4Forging relationships between multi to national governments and-->
    <!--                                    global.</h3>-->
    <!--                                <a href="" class="read-more">Read More <i-->
    <!--                                        class="fa-solid fa-chevron-right"></i></a>-->

    <!--                            </div>-->

    <!--                        </div>-->
    <!--                        <div class="arrange-card">-->
    <!--                            <img src="{{ asset('images/arrange.png') }}" alt="arrange">-->
    <!--                            <div class="arrange-card-content">-->
    <!--                                <div>-->
    <!--                                    <i class="fa-regular fa-clock"></i> <span class="time">10.00Am - 11.00 am-->
    <!--                                        </span>-->
    <!--                                    <span class="authore-name">Mehedii .H</span><span class="job-title">- Event-->
    <!--                                            Speaker</span>-->
    <!--                                </div>-->
    <!--                                <h3>Forging relationships between multi to national governments and global.</h3>-->
    <!--                                <a href="" class="read-more">Read More <i-->
    <!--                                        class="fa-solid fa-chevron-right"></i></a>-->

    <!--                            </div>-->

    <!--                        </div>-->
    <!--                        <div class="arrange-card">-->
    <!--                            <img src="{{ asset('images/arrange.png') }}" alt="arrange">-->
    <!--                            <div class="arrange-card-content">-->
    <!--                                <div>-->
    <!--                                    <i class="fa-regular fa-clock"></i> <span class="time">10.00Am - 11.00 am-->
    <!--                                        </span>-->
    <!--                                    <span class="authore-name">Mehedii .H</span><span class="job-title">- Event-->
    <!--                                            Speaker</span>-->
    <!--                                </div>-->
    <!--                                <h3>Forging relationships between multi to national governments and global.</h3>-->
    <!--                                <a href="" class="read-more">Read More <i-->
    <!--                                        class="fa-solid fa-chevron-right"></i></a>-->

    <!--                            </div>-->

    <!--                        </div>-->
    <!--                        <div class="arrange-card">-->
    <!--                            <img src="{{ asset('images/arrange.png') }}" alt="arrange">-->
    <!--                            <div class="arrange-card-content">-->
    <!--                                <div>-->
    <!--                                    <i class="fa-regular fa-clock"></i> <span class="time">10.00Am - 11.00 am-->
    <!--                                        </span>-->
    <!--                                    <span class="authore-name">Mehedii .H</span><span class="job-title">- Event-->
    <!--                                            Speaker</span>-->
    <!--                                </div>-->
    <!--                                <h3>Forging relationships between multi to national governments and global.</h3>-->
    <!--                                <a href="" class="read-more">Read More <i-->
    <!--                                        class="fa-solid fa-chevron-right"></i></a>-->

    <!--                            </div>-->

    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="tab-pane" id="5a">-->
    <!--                        <div class="arrange-card">-->
    <!--                            <img src="{{ asset('images/arrange.png') }}" alt="arrange">-->
    <!--                            <div class="arrange-card-content">-->
    <!--                                <div>-->
    <!--                                    <i class="fa-regular fa-clock"></i> <span class="time">10.00Am - 11.00 am-->
    <!--                                        </span>-->
    <!--                                    <span class="authore-name">Mehedii .H</span><span class="job-title">- Event-->
    <!--                                            Speaker</span>-->
    <!--                                </div>-->
    <!--                                <h3>Card 5Forging relationships between multi to national governments and-->
    <!--                                    global.</h3>-->
    <!--                                <a href="" class="read-more">Read More <i-->
    <!--                                        class="fa-solid fa-chevron-right"></i></a>-->

    <!--                            </div>-->

    <!--                        </div>-->
    <!--                        <div class="arrange-card">-->
    <!--                            <img src="{{ asset('images/arrange.png') }}" alt="arrange">-->
    <!--                            <div class="arrange-card-content">-->
    <!--                                <div>-->
    <!--                                    <i class="fa-regular fa-clock"></i> <span class="time">10.00Am - 11.00 am-->
    <!--                                        </span>-->
    <!--                                    <span class="authore-name">Mehedii .H</span><span class="job-title">- Event-->
    <!--                                            Speaker</span>-->
    <!--                                </div>-->
    <!--                                <h3>Forging relationships between multi to national governments and global.</h3>-->
    <!--                                <a href="" class="read-more">Read More <i-->
    <!--                                        class="fa-solid fa-chevron-right"></i></a>-->

    <!--                            </div>-->

    <!--                        </div>-->
    <!--                        <div class="arrange-card">-->
    <!--                            <img src="{{ asset('images/arrange.png') }}" alt="arrange">-->
    <!--                            <div class="arrange-card-content">-->
    <!--                                <div>-->
    <!--                                    <i class="fa-regular fa-clock"></i> <span class="time">10.00Am - 11.00 am-->
    <!--                                        </span>-->
    <!--                                    <span class="authore-name">Mehedii .H</span><span class="job-title">- Event-->
    <!--                                            Speaker</span>-->
    <!--                                </div>-->
    <!--                                <h3>Forging relationships between multi to national governments and global.</h3>-->
    <!--                                <a href="" class="read-more">Read More <i-->
    <!--                                        class="fa-solid fa-chevron-right"></i></a>-->

    <!--                            </div>-->

    <!--                        </div>-->
    <!--                        <div class="arrange-card">-->
    <!--                            <img src="{{ asset('images/arrange.png') }}" alt="arrange">-->
    <!--                            <div class="arrange-card-content">-->
    <!--                                <div>-->
    <!--                                    <i class="fa-regular fa-clock"></i> <span class="time">10.00Am - 11.00 am-->
    <!--                                        </span>-->
    <!--                                    <span class="authore-name">Mehedii .H</span><span class="job-title">- Event-->
    <!--                                            Speaker</span>-->
    <!--                                </div>-->
    <!--                                <h3>Forging relationships between multi to national governments and global.</h3>-->
    <!--                                <a href="" class="read-more">Read More <i-->
    <!--                                        class="fa-solid fa-chevron-right"></i></a>-->

    <!--                            </div>-->

    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- our-partners -->
    <section class="our-partners">
        <div class="client-testimonial">
            <img src="{{ asset('images/stars.png') }}" alt="" class="stars-right">
            <div class="container">
                <div class="testimonial-section-title">
                    <a href="" class="btn-tag">Course List</a>
                    <h2>Client <span>Testimonial</span></h2>
                </div>
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="testimonial-card">
                            <div class="testimonial-top">
                                <div class="profile-info">
                                    <img src="{{ asset('images/profile.png') }}" alt="">
                                    <div class="testimonial-titles">
                                        <h3>Sahil Kumar</h3>
                                        <span>IBA 2022</span>

                                    </div>

                                </div>
                                <div class="testimonial-rating">
                                    <ul>
                                        <li>
                                            <i class="fa-solid fa-star"></i>

                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>

                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>

                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>

                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <div class="testimonial-description">
                                <p>My experience at LUMIBA PREPS has been great. The teachers there are highly qualified and supportive as well. They have give us updated study material with 24/7
                                     TA assistance. They provide daily regular Classes and weekly grand tests that helped me to understand the basic structure of IBA's aptitude test. Its also helped me in time management as IBA's apptitude test is all about time management and this is where most of the students including myself faced problems. I would highly recommend LUMIBA PREPS to all because, this is the best place you could go for test preparation.</p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!--<div class="container text-center">-->
        <!--    <div>-->
        <!--        <h2 class="section-title title-mb">Relied on marketers trusted by engineers and-->
        <!--            beloved by <span>Executives</span></h2>-->
        <!--    </div>-->
        <!--    <div class="partners-wrapp">-->
        <!--        <div class="partner-logo">-->
        <!--            <img src="{{ asset('images/logo_04.png') }}" alt="">-->
        <!--        </div>-->
        <!--        <div class="partner-logo">-->
        <!--            <img src="{{ asset('images/logo_03.png') }}" alt="">-->
        <!--        </div>-->
        <!--        <div class="partner-logo">-->
        <!--            <img src="{{ asset('images/logo_05.png') }}" alt="">-->
        <!--        </div>-->
        <!--        <div class="partner-logo">-->
        <!--            <img src="{{ asset('images/img_4-2-1.png') }}" alt="">-->
        <!--        </div>-->
        <!--        <div class="partner-logo">-->
        <!--            <img src="{{ asset('images/Group.png') }}" alt="">-->
        <!--        </div>-->
        <!--        <div class="partner-logo">-->
        <!--            <img src="{{ asset('images/CALIB.png') }}" alt="">-->
        <!--        </div>-->
        <!--        <div class="partner-logo">-->
        <!--            <img src="{{ asset('images/loro.png') }}" alt="">-->
        <!--        </div>-->
        <!--        <div class="partner-logo">-->
        <!--            <img src="{{ asset('images/gusta.png') }}" alt="">-->
        <!--        </div>-->
        <!--        <div class="partner-logo">-->
        <!--            <img src="{{ asset('images/bikoma.png') }}" alt="">-->
        <!--        </div>-->
        <!--    </div>-->

        <!--</div>-->
    </section>
    <!-- latest-blog -->
    <section class="latest-blog">
        <div class="container">
            <div class="latest-blog-title">
                <p>news & blogs</p>
                <h2>Latest News & Blog</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="blog-post">
                        <div class="blog-img">
                            <img src="{{ asset('images/blog-1.png') }}" alt="">
                            <a href="{{ route('blog-details', ['blog' => encrypt(1)]) }}" class="blog-tag">GUID</a>
                        </div>
                        <div class="blog-content">
                            <div>
                                    <span class="blog-time">
                                        1 April 2023
                                    </span>
                            </div>
                            <h3>How to Ace the NTHP Assessment Test: A Comprehensive Guide </h3>
                            <a href="{{ route('blog-details', ['blog' => encrypt(1)]) }}"> Read More <i class="fa-solid fa-arrow-right"></i></a>

                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-post">
                        <div class="blog-img">
                            <img src="{{ asset('images/blog-2.png') }}" alt="">
                            <a href="{{ route('blog-details', ['blog' => encrypt(2)]) }}" class="blog-tag">GUID</a>
                        </div>
                        <div class="blog-content">
                            <div>
                                    <span class="blog-time">
                                        1 April 2023
                                    </span>
                            </div>
                            <h3>How to Get Financial Aid at IBA Karachi - A Step-by-Step Guide</h3>
                            <a href="{{ route('blog-details', ['blog' => encrypt(2)]) }}"> Read More <i class="fa-solid fa-arrow-right"></i></a>

                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-post">
                        <div class="blog-img">
                            <img src="{{ asset('images/blog-3.png') }}" alt="">
                            <a href="{{ route('blog-details', ['blog' => encrypt(3)]) }}" class="blog-tag">GUID</a>
                        </div>
                        <div class="blog-content">
                            <div>
                                    <span class="blog-time">
                                        1 April 2023
                                    </span>
                            </div>
                            <h3>How to Get NTHP Scholarship in IBA Karachi: A Step-by-Step Guide</h3>
                            <a href="{{ route('blog-details', ['blog' => encrypt(3)]) }}"> Read More <i class="fa-solid fa-arrow-right"></i></a>

                        </div>
                    </div>

                </div>
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('user-blogs') }}" class="theme-btn">Load More</a>
            </div>
        </div>
    </section>
@endsection

