@extends('student.layouts.mcqs-layout')

@section('title', 'Blogs')

@section('content')
    <section class="page-banner">
        <img src="{{ asset('images/books.png') }}" alt="" class="books-banner">
        <img src="{{ asset('images/PLANT.png') }}" alt="" class="plant-img">
        <img src="{{ asset('images/lite.png') }}" alt="" class="lite-img">
        <img src="{{ asset('images/Vector11.png') }}" alt="" class="vector-img">
        <div class="container">
            <div class="page-banner-title">
                <h2>Blogs page</h2>
                <div class="bread-crumb">
                    <p>Home <i class="fa-solid fa-chevron-right"></i> Blogs Page</p>

                </div>
            </div>

        </div>
    </section>

    <!-- blog-post -->
    <section class="blog-posts grid-system">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div class="all-blog-posts">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="{{ asset('images/blogimg.png') }}" alt="">
                                        <span class="date-blog">24
                                                Feb</span>
                                    </div>
                                    <div class="down-content">

                                        <a href="#">
                                            <h4>Delivering What Consumers
                                                Really Value?</h4>
                                        </a>
                                        <ul class="post-info">
                                            <li><i class="fa-solid fa-user"></i><a href="#">Mehdi</a></li>
                                            <li><i class="fa-solid fa-comment-dots"></i><a href="#">12 Comments</a>
                                            </li>
                                            <li><i class="fa-solid fa-tag"></i><a href="#">Association</a></li>

                                        </ul>
                                        <p>These cases are perfectly simple and easy to
                                            distinguish. In a free hour, when our power of
                                            On the other hand, organizations have the need for
                                            integrating in IT departments</p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <ul class="post-tags">

                                                        <li><a href="{{ route('blog-details', ['blog' => encrypt(1)]) }}">READ MORE </a><i
                                                                class="fa-solid fa-angles-right"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="share-icons">
                                                        <ul>
                                                            <li>
                                                                <a href=""><i
                                                                        class="fa-solid fa-share-nodes"></i></a>
                                                            </li>
                                                            <li><a href="">
                                                                    <i class="fa-regular fa-heart"></i>
                                                                </a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="{{ asset('images/blogimg.png') }}" alt="">
                                        <span class="date-blog">24
                                                Feb</span>
                                    </div>
                                    <div class="down-content">

                                        <a href="#">
                                            <h4>Delivering What Consumers
                                                Really Value?</h4>
                                        </a>
                                        <ul class="post-info">
                                            <li><i class="fa-solid fa-user"></i><a href="#">Mehdi</a></li>
                                            <li><i class="fa-solid fa-comment-dots"></i><a href="#">12 Comments</a>
                                            </li>
                                            <li><i class="fa-solid fa-tag"></i><a href="#">Association</a></li>

                                        </ul>
                                        <p>These cases are perfectly simple and easy to
                                            distinguish. In a free hour, when our power of
                                            On the other hand, organizations have the need for
                                            integrating in IT departments</p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <ul class="post-tags">

                                                        <li><a href="{{ route('blog-details', ['blog' => encrypt(2)]) }}">READ MORE </a><i
                                                                class="fa-solid fa-angles-right"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="share-icons">
                                                        <ul>
                                                            <li>
                                                                <a href=""><i
                                                                        class="fa-solid fa-share-nodes"></i></a>
                                                            </li>
                                                            <li><a href="">
                                                                    <i class="fa-regular fa-heart"></i>
                                                                </a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="{{ asset('images/blogimg.png') }}" alt="">
                                        <span class="date-blog">24
                                                Feb</span>
                                    </div>
                                    <div class="down-content">

                                        <a href="#">
                                            <h4>Delivering What Consumers
                                                Really Value?</h4>
                                        </a>
                                        <ul class="post-info">
                                            <li><i class="fa-solid fa-user"></i><a href="#">Mehdi</a></li>
                                            <li><i class="fa-solid fa-comment-dots"></i><a href="#">12 Comments</a>
                                            </li>
                                            <li><i class="fa-solid fa-tag"></i><a href="#">Association</a></li>

                                        </ul>
                                        <p>These cases are perfectly simple and easy to
                                            distinguish. In a free hour, when our power of
                                            On the other hand, organizations have the need for
                                            integrating in IT departments</p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <ul class="post-tags">

                                                        <li><a href="{{ route('blog-details', ['blog' => encrypt(3)]) }}">READ MORE </a><i
                                                                class="fa-solid fa-angles-right"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="share-icons">
                                                        <ul>
                                                            <li>
                                                                <a href=""><i
                                                                        class="fa-solid fa-share-nodes"></i></a>
                                                            </li>
                                                            <li><a href="">
                                                                    <i class="fa-regular fa-heart"></i>
                                                                </a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="{{ asset('images/blogimg.png') }}" alt="">
                                        <span class="date-blog">24
                                                Feb</span>
                                    </div>
                                    <div class="down-content">

                                        <a href="#">
                                            <h4>Delivering What Consumers
                                                Really Value?</h4>
                                        </a>
                                        <ul class="post-info">
                                            <li><i class="fa-solid fa-user"></i><a href="#">Mehdi</a></li>
                                            <li><i class="fa-solid fa-comment-dots"></i><a href="#">12 Comments</a>
                                            </li>
                                            <li><i class="fa-solid fa-tag"></i><a href="#">Association</a></li>

                                        </ul>
                                        <p>These cases are perfectly simple and easy to
                                            distinguish. In a free hour, when our power of
                                            On the other hand, organizations have the need for
                                            integrating in IT departments</p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <ul class="post-tags">

                                                        <li><a href="{{ route('blog-details', ['blog' => encrypt(4)]) }}">READ MORE </a><i
                                                                class="fa-solid fa-angles-right"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="share-icons">
                                                        <ul>
                                                            <li>
                                                                <a href=""><i
                                                                        class="fa-solid fa-share-nodes"></i></a>
                                                            </li>
                                                            <li><a href="">
                                                                    <i class="fa-regular fa-heart"></i>
                                                                </a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <ul class="page-numbers">
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                                </ul>
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
