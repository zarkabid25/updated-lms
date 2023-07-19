@extends('student.layouts.mcqs-layout')

@section('title', 'Courses')

@section('content')
    <!--<section class="page-banner">-->
    <!--    <img src="{{ asset('images/books.png') }}" alt="" class="books-banner">-->
    <!--    <img src="{{ asset('images/PLANT.png') }}" alt="" class="plant-img">-->
    <!--    <img src="{{ asset('images/lite.png') }}" alt="" class="lite-img">-->
    <!--    <img src="{{ asset('images/Vector11.png') }}" alt="" class="vector-img">-->
    <!--    <div class="container">-->
    <!--        <div class="page-banner-title">-->
    <!--            <h2>Featured Courses</h2>-->
    <!--            <div class="bread-crumb">-->
    <!--                <p>Home <i class="fa-solid fa-chevron-right"></i> Featured Courses</p>-->

    <!--            </div>-->
    <!--        </div>-->

    <!--    </div>-->
    <!--</section>-->

    <!-- blog-post -->
    <section class="featured-grid-system">
        <div class="container">
            <div class="course-sorting">
                <div>
                    <p>Showing 1–12 of 54 results</p>
                </div>
                <div class="course-sort">
                    <div class="sort-icon">
                        <img src="{{ asset('images/line-height.png') }}" alt="">
                        <img src="{{ asset('images/th-list.png') }}" alt="">
                    </div>
                    <div class="sort-by">
                        <span>Sort by New <i class="fa-solid fa-arrow-down"></i></span>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar featured-sidebar">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="sidebar-item search sidebar-search-product">
                                    <div class="search-product-inner">
                                        <h3 class="featured-side-heading">Search Here</h3>
                                        <form id="search_form" name="gs" method="GET" action="#">
                                            <div class="blogs-fields">
                                                <input type="text" name="q" class="searchText"
                                                       placeholder="Search Course..." autocomplete="on"><i
                                                    class="fa-solid fa-magnifying-glass"></i>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item search sidebar-search-product">
                                    <div class="search-product-inner">
                                        <h3 class="featured-side-heading">Categories</h3>
                                        <ul class="categories-count">
                                            <li><a href="">
                                                    <h3>IBA Round-2</h3> <span>03</span>
                                                </a></li>
                                            <li><a href="">
                                                    <h3>NTHP Test</h3> <span>03</span>
                                                </a></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item">
                                    <div class="price-range">
                                        <h3 class="featured-side-heading">Price Filter</h3>
                                        <input type="range" min="1" max="100" value="50">
                                        <div class="range-value">
                                            <span>5.00 - 20.00</span>
                                            <span class="filter-tag">Filter</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item">
                                    <h3 class="featured-side-heading">IBA Round-2</h3>
                                    <div class="featured-tags">
                                        <ul>
                                            <li>
                                                <input type="checkbox" id="Mechanic" name="" value="Bike">
                                                <label for="Mechanic"> NTHP Test</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="English" name="vehicle2" value="Car">
                                                <label for="English"> SAT</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="" name="" value="Boat">
                                                <label for="vehicle3"> BCAT</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="" name="" value="Boat">
                                                <label for="vehicle3"> MDCAT</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="" name="" value="Boat">
                                                <label for="vehicle3"> ECAT</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="" name="" value="Boat">
                                                <label for="vehicle3"> IBA karachi Round-2</label>
                                            </li>
                                        </ul>



                                    </div>

                                </div>
                            </div>
                            <!--<div class="col-lg-12">-->
                            <!--    <div class="sidebar-item">-->
                            <!--        <div class="skills">-->
                            <!--            <div class="skill-head">-->
                            <!--                <h3 class="featured-side-heading">Skill Level</h3>-->
                            <!--                <i class="fa-solid fa-angle-down"></i>-->
                            <!--            </div>-->
                                        <!--<ul class="skill-set">-->
                                        <!--    <li>All</li>-->
                                        <!--    <li>Fullstack</li>-->
                                        <!--    <li>English Learn</li>-->
                                        <!--    <li>Intermediate</li>-->
                                        <!--    <li>PHP</li>-->
                                        <!--    <li>Wordpress</li>-->
                                        <!--</ul>-->
                            <!--        </div>-->

                            <!--    </div>-->
                            <!--</div>-->

                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
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
                                        <h3><a href="{{ route('user-course-detail') }}">
                                                IBA Karachi Round-2
                                            </a></h3>
                                        <div class="card-user-icon">
                                            <!-- Card Course students icon + course Time in Hours -->
                                            <i class="fa-thin fa-user"></i>
                                            <span>12</span>

                                        </div>
                                    </div>
                                    <div class="card-teacher-detail"> <!-- Card Mentor photo + name -->
                                        <img src="{{ asset('images/lms-thumb.png') }}">
                                        <span>By <a href="#">Shahid Rasool </a> in <br><a
                                                href="#">IBA</a></span>
                                    </div>
                                </div>

                                <div class="course-card-footer">
                                    <h3 class="course-price">₨ 2,000.00 / month</h3>
                                    <div class="text-center">
                                            <span class="course-booked"> <i class="fa-regular fa-circle"></i> 90%
                                                Booked
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
                        <div class="col-lg-6 col-md-6">
                            <div class="course-card"> <!-- Main Card Div -->
                                <div class="card-image"> <!--  Card Image + Save icon #02747f -->
                                    <i class="fa-regular fa-bookmark"></i>
                                    <img src="{{ asset('images/Slide3.png') }}">
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
                                        <h3><a href="{{ route('user-course-detail') }}">
                                                IBA Karachi NTHP Test
                                            </a></h3>
                                        <div class="card-user-icon">
                                            <!-- Card Course students icon + course Time in Hours -->
                                            <i class="fa-thin fa-user"></i>
                                            <span>12</span>

                                        </div>
                                    </div>
                                    <div class="card-teacher-detail"> <!-- Card Mentor photo + name -->
                                        <img src="{{ asset('images/lms-thumb.png') }}">
                                        <span>By <a href="#">Shahid Rasool </a> in <br><a
                                                href="#">IBA</a></span>
                                    </div>
                                </div>

                                <div class="course-card-footer">
                                    <h3 class="course-price">₨ 2,000.00 / month</h3>
                                    <div class="text-center">
                                            <span class="course-booked"> <i class="fa-regular fa-circle"></i> 80%
                                                Booked
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
                        <div class="col-lg-6 col-md-6">
                            <div class="course-card"> <!-- Main Card Div -->
                                <div class="card-image"> <!--  Card Image + Save icon #02747f -->
                                    <i class="fa-regular fa-bookmark"></i>
                                    <img src="{{ asset('images/lums.png') }}">
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
                                        <h3><a href="{{ route('user-course-detail') }}">
                                                LUMS LCAT(Live Classes)
                                            </a></h3>
                                        <div class="card-user-icon">
                                            <!-- Card Course students icon + course Time in Hours -->
                                            <i class="fa-thin fa-user"></i>
                                            <span>12</span>

                                        </div>
                                    </div>
                                    <div class="card-teacher-detail"> <!-- Card Mentor photo + name -->
                                        <img src="{{ asset('images/lms-thumb.png') }}">
                                        <span>By <a href="#">Shahid Rasool </a> in <br><a
                                                href="#">IBA</a></span>
                                    </div>
                                </div>

                                <div class="course-card-footer">
                                    <h3 class="course-price">₨ 2,000.00 / month</h3>
                                    <div class="text-center">
                                            <span class="course-booked"> <i class="fa-regular fa-circle"></i> 70%
                                                Booked
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
                        <div class="col-lg-6 col-md-6">
                            <div class="course-card"> <!-- Main Card Div -->
                                <div class="card-image"> <!--  Card Image + Save icon #02747f -->
                                    <i class="fa-regular fa-bookmark"></i>
                                    <img src="{{ asset('images/Thumbnail-2.png') }}">
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
                                        <h3><a href="{{ route('user-course-detail') }}">
                                                Digital SAT(Live Classes)
                                            </a></h3>
                                        <div class="card-user-icon">
                                            <!-- Card Course students icon + course Time in Hours -->
                                            <i class="fa-thin fa-user"></i>
                                            <span>12</span>

                                        </div>
                                    </div>
                                    <div class="card-teacher-detail"> <!-- Card Mentor photo + name -->
                                        <img src="{{ asset('images/lms-thumb.png') }}">
                                        <span>By <a href="#">Shahid Rasool </a> in <br><a
                                                href="#">IBA</a></span>
                                    </div>
                                </div>

                                <div class="course-card-footer">
                                    <h3 class="course-price">₨ 2,000.00 / month</h3>
                                    <div class="text-center">
                                            <span class="course-booked"> <i class="fa-regular fa-circle"></i> 60%
                                                Booked
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

                </div>

            </div>
        </div>
    </section>
@endsection
