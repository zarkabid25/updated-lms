@extends('student.layouts.mcqs-layout')

@section('title', 'Course Detail')

@section('content')
    <section class="page-banner">
        <img src="{{ asset('images/books.png') }}" alt="" class="books-banner">
        <img src="{{ asset('images/PLANT.png') }}" alt="" class="plant-img">
        <img src="{{ asset('images/lite.png') }}" alt="" class="lite-img">
        <img src="{{ asset('images/Vector11.png') }}" alt="" class="vector-img">
        <div class="container">
            <div class="page-banner-title">
                <h2>Course Details</h2>
                <div class="bread-crumb">
                    <p>Home <i class="fa-solid fa-chevron-right"></i> Course Details</p>

                </div>
            </div>

        </div>
    </section>
    <!-- Slider main container -->
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
                <div class="video-container">
                    <div class="tour-video">
                        <div class="button-wrapper">
                            <button class="active fa fa-play-circle-o" id="video_play_btn"><i
                                    class="fa-sharp fa-solid fa-play"></i></button>
                        </div>
                        <video id="video" preload="auto" loop controls height="400px" width="100%;">
                            <source src="{{ asset('videos/video1.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="video-container">
                    <div class="tour-video">
                        <div class="button-wrapper">
                            <button class="active fa fa-play-circle-o" id="video_play_btn"><i
                                    class="fa-sharp fa-solid fa-play"></i></button>
                        </div>
                        <video id="video" preload="auto" loop controls height="400px" width="100%;">
                            <source src="{{ asset('videos/video1.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="video-container">
                    <div class="tour-video">
                        <div class="button-wrapper">
                            <button class="active fa fa-play-circle-o" id="video_play_btn"><i
                                    class="fa-sharp fa-solid fa-play"></i></button>
                        </div>
                        <video id="video" preload="auto" loop controls height="400px" width="100%;">
                            <source src="{{ asset('videos/video1.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev swiper-btn">
            <i class="fa-solid fa-arrow-left-long"></i>
        </div>
        <div class="swiper-button-next swiper-btn">
            <i class="fa-solid fa-arrow-right-long"></i>
        </div>

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
    </div>

    <section class="course-details-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div class="blog-details-wrapper">
                        <div class="course-detail-wrapp">
                            <div class="course-name-tag">
                                <div class="tags-">
                                    <a href="" class="feactures">Featured</a>
                                    <a href="" class="design">UX Design</a>
                                </div>
                                <div class="course-release-time">
                                    <h4><span>Last Update:</span> Sep 29, 2021</h4>
                                </div>
                            </div>
                            <div class="course-main">
                                <h2>Making Music with Other People</h2>
                                <div class="course-main-about">
                                    <h3 class="price">$32.00/ <span>$67.00</span></h3>
                                    <h3 class="enrolled"> <i class="fa-solid fa-book"></i> 51 enrolled </h3>
                                    <div>
                                        <ul class="authore-course-rating">
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                        </ul>
                                        <span class="rating-count">(44)</span>
                                    </div>

                                </div>
                                <div class="course-details-des">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vulputate
                                        vestibulum rhoncus, dolor eget viverra pretium, dolor tellus aliquet nunc,
                                        vitae ultricies erat elit eu lacus. Vestibulum non justo consectetur, cursus
                                        ante, tincidunt sapien. Nulla quis diam sit amet turpis interd enim. Vivamus
                                        faucibus ex sed nibh egestas elementum. Mauris et bibendum dui. Aenean
                                        consequat pulvinar luctus. Suspendisse consectetur tristique </p>
                                </div>
                                <h4 class="left-border">Course Details</h4>
                                <div class="course-table">
                                    <div class="table-width table-1">
                                        <ul>
                                            <li>Instructor:<span class="instructor-name">Mehedii.H</span></li>
                                            <li>Lectures<span class="instructor-name">120 sub</span></li>
                                            <li>Duration: <span class="instructor-name">20h 41m 32s</span></li>
                                            <li>Enrolled:<span class="instructor-name">2 students</span></li>
                                            <li>Enrolled:<span class="instructor-name">2 students</span></li>
                                        </ul>
                                    </div>
                                    <div class="table-width">
                                        <ul>
                                            <li>Course level:<span class="instructor-name">Intermediate</span></li>
                                            <li>Language: <span class="instructor-name">English spanish</span></li>
                                            <li>Price Discount:<span class="instructor-name"> -20%</span></li>
                                            <li>Reguler Price:<span class="instructor-name">$218/Mo</span></li>
                                            <li>Course Status: <span class="instructor-name">Available</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <h3>Experience Description</h3>
                                <div class="course-details-des">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vulputate
                                        vestibulum rhoncus, dolor eget viverra pretium, dolor tellus aliquet nunc,
                                        vitae ultricies erat elit eu lacus. Vestibulum non justo consectetur, cursus
                                        ante, tincidunt sapien. Nulla quis diam sit amet turpis interd enim. Vivamus
                                        faucibus ex sed nibh egestas elementum. Mauris et bibendum dui. Aenean
                                        consequat pulvinar luctus. Suspendisse consectetur tristique </p>
                                    <p>We have covered many special events such as fireworks, fairs, parades, races,
                                        walks, awards ceremonies, fashion shows, sporting events, and even a
                                        memorial service.
                                    </p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vulputate
                                        vestibulum Phasellus rhoncus, dolor eget viverra pretium, dolor tellus
                                        aliquet nunc, vitae ultricies erat elit eu lacus. Vestibulum non justo
                                        consectetur, cursus ante, tincidunt sapien. Nulla quis diam sit amet turpis
                                        interdum accumsan quis nec enim. Vivamus faucibus ex sed nibh egestas
                                        elementum. Mauris et bibendum dui. Aenean consequat pulvinar luctus.
                                        Suspendisse consectetur tristique tortor</p>
                                    <h3>Why search Is Important ?</h2>
                                        <ul class="blog-details-list">
                                            <li><i class="fa-solid fa-check"></i><span>Lorem Ipsum is simply
                                                        dummying text of the printing andtypesetting industry
                                                        most of the standard.</span></li>
                                            <li><i class="fa-solid fa-check"></i><span>Lorem Ipsum is simply
                                                        dummying text of the printing andtypesetting industry
                                                        most of the standard.</span></li>
                                            <li><i class="fa-solid fa-check"></i><span>Lorem Ipsum is simply
                                                        dummying text of the printing andtypesetting industry
                                                        most of the standard.</span></li>
                                            <li><i class="fa-solid fa-check"></i><span>Lorem Ipsum is simply
                                                        dummying text of the printing andtypesetting industry
                                                        most of the standard.</span></li>
                                            <li><i class="fa-solid fa-check"></i><span>Lorem Ipsum is simply
                                                        dummying text of the printing andtypesetting industry
                                                        most of the standard.</span></li>
                                        </ul>
                                </div>

                            </div>

                        </div>

                        <div class="blogs-tags">
                            <div class="blog-tag-div">
                                    <span class="bl-">
                                        Tag
                                    </span>
                                <ul class="bl-tag">
                                    <li>
                                        <a href="" class="active">
                                            Design

                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            Bussiness

                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            App

                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            Data

                                        </a>
                                    </li>
                                </ul>

                            </div>
                            <div class="blogs-share-link">
                                    <span class="bl-">
                                        Share
                                    </span>
                                <ul class="blog-share-list">
                                    <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>

                                </ul>
                            </div>

                        </div>

                        <div class="blogs-coments">
                            <h2 class="coments-count">(04) Comment</h2>
                            <ul class="coments-list">
                                <li>
                                    <div class="coments-img">
                                        <img src="{{ asset('images/round.png') }}" alt="">
                                    </div>
                                    <div class="coments-content">
                                        <h3>Rohan De Spond</h3>
                                        <span class="comnts-date">25 january 2021</span>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the
                                            majority have. There are many variations of passages of Lorem Ipsum
                                            available, but the majority have</p>
                                        <a href="" class="reply-comts">
                                            <i class="fa-solid fa-reply-all"></i>
                                        </a>

                                    </div>

                                </li>
                                <li>
                                    <div class="coments-img">
                                        <img src="{{ asset('images/round.png') }}" alt="">
                                    </div>
                                    <div class="coments-content">
                                        <h3>Rohan De Spond</h3>
                                        <span class="comnts-date">25 january 2021</span>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the
                                            majority have. There are many variations of passages of Lorem Ipsum
                                            available, but the majority have</p>
                                        <a href="" class="reply-comts">
                                            <i class="fa-solid fa-reply-all"></i>
                                        </a>

                                    </div>

                                </li>
                                <li>
                                    <div class="coments-img">
                                        <img src="{{ asset('images/round.png') }}" alt="">
                                    </div>
                                    <div class="coments-content">
                                        <h3>Rohan De Spond</h3>
                                        <span class="comnts-date">25 january 2021</span>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the
                                            majority have. There are many variations of passages of Lorem Ipsum
                                            available, but the majority have</p>
                                        <a href="" class="reply-comts">
                                            <i class="fa-solid fa-reply-all"></i>
                                        </a>

                                    </div>

                                </li>
                            </ul>

                        </div>
                        <div class="coments-for">
                            <h2>Write your comment</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" placeholder="Enter your name*">

                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Enter your mail*">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Enter your  number*">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Website*">
                                </div>
                                <div class="col-md-12">
                                    <textarea name="" id="" cols="40" rows="12">Enter your Massage*</textarea>
                                </div>
                                <div class="save-name">
                                    <div>
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1"> Save my name, email, and website in this browser for
                                            the
                                            next time I comment.</label>
                                    </div>
                                    <input type="submit" value="post a comment" class="submit-btn">

                                </div>

                            </div>

                        </div>


                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="sidebar">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sidebar-item sidebar-review-section authore-review-section">
                                    <div class="review_image">
                                        <img src="{{ asset('images/round.png') }}" alt="">
                                    </div>
                                    <div class="rewview-details">
                                        <h3>Rosalina D. Willaim</h3>
                                        <p>Blogger/Photographer</p>
                                    </div>
                                    <div class="review-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.Veritatis distinctio
                                            suscipit reprehenderit atque</p>
                                    </div>
                                    <div class="review-social-icons">
                                        <i class="fa-brands fa-facebook-f"></i>
                                        <i class="fa-brands fa-twitter"></i>
                                        <i class="fa-brands fa-vimeo-v"></i>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item search sidebar-search-product">
                                    <div class="search-product-inner">
                                        <h4 class="left-border">Search Here</h4>
                                        <form id="search_form" name="gs" method="GET" action="#">
                                            <div class="blogs-fields">
                                                <input type="text" name="q" class="searchText"
                                                       placeholder="Search Product..." autocomplete="on"><i
                                                    class="fa-solid fa-magnifying-glass"></i>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="sidebar-item recent-posts">
                                    <div class="sidebar-heading">
                                        <h4 class="left-border">Recent Posts</h4>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li><a href="#">
                                                    <div class="recent-posts-details">
                                                        <div class="side-bar-posts-img">
                                                            <img src="{{ asset('images/recent.png') }}" alt="">
                                                            <span>01</span>
                                                        </div>
                                                        <div class="recent-posts-details-content">
                                                            <span>May 31, 2020</span>
                                                            <p>Show at the University</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li><a href="#">
                                                    <div class="recent-posts-details">
                                                        <div class="side-bar-posts-img">
                                                            <img src="{{ asset('images/recent.png') }}" alt="">
                                                            <span>01</span>
                                                        </div>
                                                        <div class="recent-posts-details-content">
                                                            <span>May 31, 2020</span>
                                                            <p>Show at the University</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li><a href="#">
                                                    <div class="recent-posts-details">
                                                        <div>
                                                            <img src="{{ asset('images/recent.png') }}" alt="">
                                                        </div>
                                                        <div class="recent-posts-details-content">
                                                            <span>May 31, 2020</span>
                                                            <p>Show at the University</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li><a href="#">
                                                    <div class="recent-posts-details">
                                                        <div>
                                                            <img src="{{ asset('images/recent.png') }}" alt="">
                                                        </div>
                                                        <div class="recent-posts-details-content">
                                                            <span>May 31, 2020</span>
                                                            <p>Show at the University</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item categories">
                                    <div class="sidebar-heading">

                                        <h4 class="left-border">Photo Gallery</h4>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <div class="photo-gallery1">
                                                <li><img src="{{ asset('images/recent.png') }}" alt="" class="photo-gallery1-img">
                                                </li>
                                                <li><img src="{{ asset('images/recent.png') }}" alt="" class="photo-gallery1-img">
                                                </li>
                                                <li><img src="{{ asset('images/recent.png') }}" alt="" class="photo-gallery1-img">
                                                </li>
                                            </div>
                                            <div class="photo-gallery1">
                                                <li><img src="{{ asset('images/recent.png') }}" alt="" class="photo-gallery1-img">
                                                </li>
                                                <li><img src="{{ asset('images/recent.png') }}" alt="" class="photo-gallery1-img">
                                                </li>
                                                <li><img src="{{ asset('images/recent.png') }}" alt="" class="photo-gallery1-img">
                                                </li>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item contact-form">
                                    <div class="sidebar-heading">
                                        <h4 class="left-border">Get in Touch</h4>

                                    </div>
                                    <div class="content">
                                        <div class="screen-body-item">
                                            <div class="app-form">
                                                <div class="app-form-group">
                                                    <input class="app-form-control" placeholder="Enter Name*">
                                                </div>
                                                <div class="app-form-group">
                                                    <input class="app-form-control" placeholder="Enter your Email*">
                                                </div>
                                                <div class="app-form-group message">
                                                    <input class="app-form-control" placeholder="MESSAGE">
                                                </div>
                                                <div class="">
                                                    <button class="submit-btn">SEND MESSAGE</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item tags">
                                    <div class="sidebar-heading">

                                        <h4 class="left-border">Popular tag</h4>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li><a href="#">BUSINESS</a></li>
                                            <li><a href="#">DESIGN</a></li>
                                            <li><a href="#">APPS</a></li>
                                            <li><a href="#">LANDING PAGE</a></li>
                                            <li><a href="#">DATA</a></li>
                                            <li><a href="#">BOOK</a></li>
                                            <li><a href="#">DESIGN</a></li>
                                            <li><a href="#">BOOK</a></li>
                                            <li><a href="#">LANDING PAGE</a></li>
                                            <li><a href="#">DATA</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item search sidebar-search-product">
                                    <div class="search-product-inner">
                                        <h4 class="left-border">Follow Us</h4>

                                        <div class="review-social-icons">
                                            <i class="fa-brands fa-facebook-f"></i>
                                            <i class="fa-brands fa-twitter"></i>
                                            <i class="fa-brands fa-instagram"></i>
                                            <i class="fa-brands fa-youtube"></i>

                                        </div>
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
