@extends('student.layouts.mcqs-layout')

@section('title', 'Instructor Detail')

@section('content')
    <!--<section class="page-banner">-->
    <!--    <img src="{{ asset('images/books.png') }}" alt="" class="books-banner">-->
    <!--    <img src="{{ asset('images/PLANT.png') }}" alt="" class="plant-img">-->
    <!--    <img src="{{ asset('images/lite.png') }}" alt="" class="lite-img">-->
    <!--    <img src="{{ asset('images/Vector11.png') }}" alt="" class="vector-img">-->
    <!--    <div class="container">-->
    <!--        <div class="page-banner-title">-->
    <!--            <h2>Insturcture Page</h2>-->
    <!--            <div class="bread-crumb">-->
    <!--                <p>Home <i class="fa-solid fa-chevron-right"></i> Insturcture Page</p>-->

    <!--            </div>-->
    <!--        </div>-->

    <!--    </div>-->
    <!--</section>-->

    <!-- course-bio -->
    <section class="course-bio">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="course-image">
                        <img src="{{ asset('images/mask.png') }}" alt="mask">
                    </div>

                </div>
                <div class="col-lg-8 col-md-12 ">
                    <div class="course-bio-content">
                        <div class="bio-upper">
                            <div class="bio-name">
                                <h3>Hiliary Ouse</h3>
                                <p>Teches Interior marketer</p>
                            </div>
                            <div class="bio-review">
                                <p>Review:</p>
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

                            </div>
                            <div class="folow-us">
                                <p>Follow us</p>
                                <ul>
                                    <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href=""><i class="fa-brands fa-youtube"></i></a></li>
                                </ul>

                            </div>
                            <a href="" class="theme-btn"> Follow</a>

                        </div>
                        <div class="bio-description">
                            <h3>Short Bio</h3>
                            <p>Only a quid me old mucker squiffy tomfoolery grub cheers ruddy cor blimey guvnor in
                                my flat, up the duff
                                Eaton car boot up the kyver pardon you A bit of how's your father David skive off
                                sloshed, don't get shirty with
                                me chip shop vagabond crikey bugger Queen's English chap. Matie boy nancy boy bite
                                your arm off up the
                                kyver old no biggie fantastic boot, David have it show off show off pick your nose
                                and blow off lost the
                                plot porkies bits and bobs only a quid bugger all mate, absolutely bladdered
                                bamboozled it's your round don't
                                get shirty with me down the pub well.</p>

                        </div>
                    </div>
                    <div class="courses-refer">
                        <h3 class="online-course-refer">Online Course</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="course-card"> <!-- Main Card Div -->
                                    <div class="card-image"> <!--  Card Image + Save icon #02747f -->
                                        <i class="fa-regular fa-bookmark"></i>
                                        <img src="{{ asset('images/lms.png') }}">
                                    </div>
                                    <div class="card-description">
                                        <!--  Card rating star icon + rating number + reviews -->
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
                                            <h3>Flutter Apps Development: Basic to Advance Flutter Training</h3>
                                            <div class="card-user-icon">
                                                <!-- Card Course students icon + course Time in Hours -->
                                                <i class="fa-thin fa-user"></i>
                                                <span>12</span>

                                            </div>
                                        </div>
                                        <div class="card-teacher-detail"> <!-- Card Mentor photo + name -->
                                            <img src="{{ asset('images/lms-thumb.jpg') }}">
                                            <span>By <a href="#">Shahid Rasool </a> in <br><a
                                                    href="#">Development</a></span>
                                        </div>
                                    </div>

                                    <div class="course-card-footer">
                                        <h3 class="course-price">₨ 2,000.00 / month</h3>
                                        <div class="text-center">
                                                <span class="course-booked"> <i class="fa-regular fa-circle"></i> 1200%
                                                    Booked
                                                </span>
                                        </div>
                                        <div class="fully-booked">
                                                <span>
                                                    <i class="fa-regular fa-exclamation"></i> Fully Booked</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="course-card"> <!-- Main Card Div -->
                                    <div class="card-image"> <!--  Card Image + Save icon #02747f -->
                                        <i class="fa-regular fa-bookmark"></i>
                                        <img src="{{ asset('images/lms.png') }}">
                                    </div>
                                    <div class="card-description">
                                        <!--  Card rating star icon + rating number + reviews -->
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
                                            <h3>Flutter Apps Development: Basic to Advance Flutter Training</h3>
                                            <div class="card-user-icon">
                                                <!-- Card Course students icon + course Time in Hours -->
                                                <i class="fa-thin fa-user"></i>
                                                <span>12</span>

                                            </div>
                                        </div>
                                        <div class="card-teacher-detail"> <!-- Card Mentor photo + name -->
                                            <img src="{{ asset('images/lms-thumb.jpg') }}">
                                            <span>By <a href="#">Shahid Rasool </a> in <br><a
                                                    href="#">Development</a></span>
                                        </div>
                                    </div>

                                    <div class="course-card-footer">
                                        <h3 class="course-price">₨ 2,000.00 / month</h3>
                                        <div class="text-center">
                                                <span class="course-booked"> <i class="fa-regular fa-circle"></i> 1200%
                                                    Booked
                                                </span>
                                        </div>
                                        <div class="fully-booked">
                                                <span>
                                                    <i class="fa-regular fa-exclamation"></i> Fully Booked</span>
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
                        <div class=" mt-5">
                            <a href="" class="theme-btn">Load More</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
