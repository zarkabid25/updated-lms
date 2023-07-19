@extends('student.layouts.mcqs-layout')

@section('title', 'Blogs Detail')

@section('content')
    <!--<section class="page-banner">-->
        <!--<img src="{{ asset('images/books.png') }}" alt="" class="books-banner">-->
        <!--<img src="{{ asset('images/PLANT.png') }}" alt="" class="plant-img">-->
        <!--<img src="{{ asset('images/lite.png') }}" alt="" class="lite-img">-->
        <!--<img src="{{ asset('images/Vector11.png') }}" alt="" class="vector-img">-->
    <!--    <div class="container">-->
            <!--<div class="page-banner-title">-->
            <!--    <h2>Blogs Details </h2>-->
            <!--    <div class="bread-crumb">-->
            <!--        <p>Home <i class="fa-solid fa-chevron-right"></i> Blogs Details Page</p>-->

            <!--    </div>-->
            <!--</div>-->

    <!--    </div>-->
    <!--</section>-->

    <!-- blog-post -->
    <section class="blog-posts grid-system">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div class="blog-details-wrapper">
                        <div class="blog-details-img">
                            <img src="{{ asset('images/blogimg.png') }}" alt="">
                        </div>
                        <div class="blog-details-pera">
                            <p>With a diverse range of degree options to choose from, students can pick a program that best suits their interests and career aspirations. 
                                In this blog, we will explore the different degree options available at IBA Karachi and what they offer in terms of curriculum and post-graduation opportunities.

                            </p>
                            <p> 1.	BBA (Bachelor of Business Administration): The BBA program at IBA Karachi is a four-year undergraduate program that provides students with a comprehensive understanding of the core principles of business. 
                                The curriculum covers a broad range of topics, including accounting, economics, finance, marketing, management, and human resources. Students also have the opportunity to specialize in one of the following areas: Entrepreneurship, Supply Chain Management, Finance, Marketing, and Human Resource Management. 
                                After completing the program, graduates can pursue a career in a variety of industries, such as finance, marketing, and consulting.</p>
                            <!-- <h3 class="blog-detail-heading">Experience is over the world visit</h3> -->
                            <p> 2.	Accounting and Finance: The Accounting and Finance program at IBA Karachi is designed to equip students with the skills and knowledge needed to become successful finance professionals. 
                                The program covers a wide range of topics, including financial accounting, cost accounting, auditing, taxation, and corporate finance. Students also have the opportunity to specialize in one of the following areas: Investment Banking, Islamic Finance, and Corporate Accounting. 
                                After graduation, graduates can pursue a career in accounting, finance, or banking.</p>
                            <p> 3.	BS Social Sciences: The BS Social Sciences program at IBA Karachi is designed to provide students with a broad understanding of the social sciences, including anthropology, sociology, psychology, and political science.
                                 The program also offers a variety of electives that allow students to specialize in an area of their choosing. 
                                Graduates of this program can pursue a career in a wide range of fields, including research, teaching, and social services
                            </p>
                            <p> 4.	BS Economics: The BS Economics program at IBA Karachi is designed to provide students with a comprehensive understanding of economic theory, policy, and practice. The program covers a wide range of topics, including microeconomics, macroeconomics, econometrics, and development economics.
                                 Graduates of this program can pursue a career in a variety of fields, including economic research, policy analysis, and consulting.</p>
                        </div>
                        <!-- <div class="details-qoute">
                            <div class="qoutes-line">
                                <img src="{{ asset('images/quote-line.png') }}" alt="">
                            </div>
                            <h2>Smashing Podcast Episode With Paul Boag
                                What Is Conversion Optimization</h2>
                            <span class="details-author-name">Jhon Mehdi</span>

                        </div> -->
                        <div class="blog-details-pera">
                            <h3>Let our investment management team</h3>
                            <p> 5.	BS Economics and Mathematics: The BS Economics and Mathematics program at IBA Karachi is designed to provide students with a strong foundation in both economics and mathematics.
                                 The program covers a wide range of topics, including calculus, linear algebra, microeconomics, macroeconomics, and econometrics.
                                 Graduates of this program can pursue a career in a variety of fields, including economic research, policy analysis, and consulting.
                            </p>
                            <p> 6.	BS Computer Science: The BS Computer Science program at IBA Karachi is designed to provide students with a comprehensive understanding of computer science, including programming, algorithms, data structures, and databases. 
                                The program also offers a variety of electives that allow students to specialize in an area of their choosing, such as artificial intelligence, machine learning, or software engineering.
                                 Graduates of this program can pursue a career in a wide range of fields, including software development, database administration, and cybersecurity.</p>
                        </div>
                        <!-- <div class="blog-details-video-wrapper">
                            <div class="row">
                                <div class="col-lg-4 col-md-12">
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
                                <div class="col-lg-8 col-md-12">
                                    <div class="blog-details-video-description">
                                        <div>
                                            <h2>Why search Is Important ?</h2>
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
                            </div>

                        </div> -->
                        <div class="blog-details-pera">
                            <!-- <h3>Let our investment management team</h3> -->
                            <p> 7.	BS Mathematics: The BS Mathematics program at IBA Karachi is designed to provide students with a strong foundation in mathematics, including calculus, linear algebra, differential equations, and abstract algebra.
                                 The program also offers a variety of electives that allow students to specialize in an area of their choosing, such as statistics or operations research. 
                                Graduates of this program can pursue a career in a variety of fields, including education, research, and finance.
                            </p>
                            <p>In conclusion, IBA Karachi offers a diverse range of degree options that cater to a wide range of interests and career aspirations. 
                                Each program is designed to provide students with a comprehensive understanding of their respective fields.</p>
                        </div>
                        <div class="blogs-tags">
                            <div class="blog-tag-div">
                                    <span class="bl-">
                                        Tag
                                    </span>
                                <ul class="bl-tag">
                                    <li>
                                        <a href="" class="active">
                                            IBA Karachi

                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            Bussiness

                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a href="">
                                            

                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            Data

                                        </a>
                                    </li> -->
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
                                        <span class="comnts-date">29 March 2023</span>
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
                                        <span class="comnts-date">29 March 2023</span>
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
                                        <span class="comnts-date">29 March 2023</span>
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
                                <div class="sidebar-item search sidebar-search-product">
                                    <div class="search-product-inner">
                                        <h4 class="left-border">Categories</h4>
                                        <ul class="categories-count">
                                            <li><a href="">
                                                    <h3>Mobile Set</h3> <span>03</span>
                                                </a></li>
                                            <li><a href="">
                                                    <h3>Raxila Dish nonyte</h3> <span>03</span>
                                                </a></li>
                                        </ul>

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
