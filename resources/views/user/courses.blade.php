@extends('student.layouts.mcqs-layout')

@section('title', 'Courses')

@section('content')
    <section class="page-banner">
        <img src="{{ asset('images/books.png') }}" alt="" class="books-banner">
        <img src="{{ asset('images/PLANT.png') }}" alt="" class="plant-img">
        <img src="{{ asset('images/lite.png') }}" alt="" class="lite-img">
        <img src="{{ asset('images/Vector11.png') }}" alt="" class="vector-img">
        <div class="container">
            <div class="page-banner-title">
                <h2>Universities</h2>
                <div class="bread-crumb">
                    <p>Home <i class="fa-solid fa-chevron-right"></i> Quiz <i class="fa-solid fa-chevron-right"></i> Entry Test <i class="fa-solid fa-chevron-right"></i> Universities</p>
                </div>
            </div>

        </div>
    </section>
    <!-- course-list -->
    <section class="course-list">
        <div class="container">
            <div class="course-sorting">
                <div>
                    <p>Showing 1–12 of 54 results</p>
                </div>
                <div class="course-sort">
                    <div class="sort-icon">
                        <img src="{{ asset('image/line-height.png') }}" alt="">
                        <img src="{{ asset('images/th-list.png') }}" alt="">
                    </div>
                    <div class="sort-by">
                        <span>Sort by New <i class="fa-solid fa-arrow-down"></i></span>

                    </div>
                </div>

            </div>
            <div class="courses">
                @php
                    $universities = (new \App\Models\University())->where('entry_test_type_id', $test_id)->get();
                @endphp

                @forelse($universities as $university)
                    <div class="course-detail-card">
                        <div class="course-img">
                            <img src="{{ asset('images/course1.png') }}" alt="">
                            <span class="authore-tag">Mechanical</span>

                        </div>
                        <div class="course-details">
                            <div>
                                <div class="lesson-details">
                                    <i class="fa-solid fa-book"></i><span>23 lessons</span><i
                                        class="fa-regular fa-clock"></i><span>1 hr 30 min</span>

                                </div>
                                <div>
                                    <h2 class="course-title">{{ $university->name }}</h2>
                                </div>
                                <div class="course-price">
                                    <p>$32.00/<span class="discount-price">$67.00</span> <span
                                            class="free-color">Free.</span></p>

                                </div>
                                <div class="authore-details">
                                    <div class="img-wrapp">
                                        <img src="{{ asset('images/lms-thumb.jpg') }}" alt="">
                                        <h4>Mehdi <span class="name-color">H.</span></h4>
                                        <ul class="authore-course-rating">
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                        </ul>
                                        <span class="rating-count">(44)</span>
                                    </div>
                                    <div>
                                        <a href="{{ route('user-payment-methods') }}" class="know-details">Know Details <i
                                                class="fa-solid fa-arrow-right"></i></a>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

{{--                <div class="course-detail-card">--}}
{{--                    <div class="course-img">--}}
{{--                        <img src="{{ asset('images/course1.png') }}" alt="">--}}
{{--                        <span class="authore-tag">Mechanical</span>--}}

{{--                    </div>--}}
{{--                    <div class="course-details">--}}
{{--                        <div>--}}
{{--                            <div class="lesson-details">--}}
{{--                                <i class="fa-solid fa-book"></i><span>23 lessons</span><i--}}
{{--                                    class="fa-regular fa-clock"></i><span>1 hr 30 min</span>--}}

{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <h2 class="course-title">Become a product Manager learn the--}}
{{--                                    skills & job.</h2>--}}
{{--                            </div>--}}
{{--                            <div class="course-price">--}}
{{--                                <p>$32.00/<span class="discount-price">$67.00</span> <span--}}
{{--                                        class="free-color">Free.</span></p>--}}

{{--                            </div>--}}
{{--                            <div class="authore-details">--}}
{{--                                <div class="img-wrapp">--}}
{{--                                    <img src="{{ asset('images/lms-thumb.jpg') }}" alt="">--}}
{{--                                    <h4>Mehdi <span class="name-color">H.</span></h4>--}}
{{--                                    <ul class="authore-course-rating">--}}
{{--                                        <li><i class="fa-solid fa-star"></i></li>--}}
{{--                                        <li><i class="fa-solid fa-star"></i></li>--}}
{{--                                        <li><i class="fa-solid fa-star"></i></li>--}}
{{--                                        <li><i class="fa-solid fa-star"></i></li>--}}
{{--                                    </ul>--}}
{{--                                    <span class="rating-count">(44)</span>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <a href="{{ route('user-payment-methods') }}" class="know-details">Know Details <i--}}
{{--                                            class="fa-solid fa-arrow-right"></i></a>--}}

{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                </div>--}}
{{--                <div class="course-detail-card">--}}
{{--                    <div class="course-img">--}}
{{--                        <img src="{{ asset('images/course1.png') }}" alt="">--}}
{{--                        <span class="authore-tag">Mechanical</span>--}}

{{--                    </div>--}}
{{--                    <div class="course-details">--}}
{{--                        <div>--}}
{{--                            <div class="lesson-details">--}}
{{--                                <i class="fa-solid fa-book"></i><span>23 lessons</span><i--}}
{{--                                    class="fa-regular fa-clock"></i><span>1 hr 30 min</span>--}}

{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <h2 class="course-title">Become a product Manager learn the--}}
{{--                                    skills & job.</h2>--}}
{{--                            </div>--}}
{{--                            <div class="course-price">--}}
{{--                                <p>$32.00/<span class="discount-price">$67.00</span> <span--}}
{{--                                        class="free-color">Free.</span></p>--}}

{{--                            </div>--}}
{{--                            <div class="authore-details">--}}
{{--                                <div class="img-wrapp">--}}
{{--                                    <img src="{{ asset('images/lms-thumb.jpg') }}" alt="">--}}
{{--                                    <h4>Mehdi <span class="name-color">H.</span></h4>--}}
{{--                                    <ul class="authore-course-rating">--}}
{{--                                        <li><i class="fa-solid fa-star"></i></li>--}}
{{--                                        <li><i class="fa-solid fa-star"></i></li>--}}
{{--                                        <li><i class="fa-solid fa-star"></i></li>--}}
{{--                                        <li><i class="fa-solid fa-star"></i></li>--}}
{{--                                    </ul>--}}
{{--                                    <span class="rating-count">(44)</span>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <a href="{{ route('user-payment-methods') }}" class="know-details">Know Details <i--}}
{{--                                            class="fa-solid fa-arrow-right"></i></a>--}}

{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                </div>--}}
{{--                <div class="course-detail-card">--}}
{{--                    <div class="course-img">--}}
{{--                        <img src="{{ asset('images/course1.png') }}" alt="">--}}
{{--                        <span class="authore-tag">Mechanical</span>--}}

{{--                    </div>--}}
{{--                    <div class="course-details">--}}
{{--                        <div>--}}
{{--                            <div class="lesson-details">--}}
{{--                                <i class="fa-solid fa-book"></i><span>23 lessons</span><i--}}
{{--                                    class="fa-regular fa-clock"></i><span>1 hr 30 min</span>--}}

{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <h2 class="course-title">Become a product Manager learn the--}}
{{--                                    skills & job.</h2>--}}
{{--                            </div>--}}
{{--                            <div class="course-price">--}}
{{--                                <p>$32.00/<span class="discount-price">$67.00</span> <span--}}
{{--                                        class="free-color">Free.</span></p>--}}
{{--                            </div>--}}
{{--                            <div class="authore-details">--}}
{{--                                <div class="img-wrapp">--}}
{{--                                    <img src="{{ asset('images/lms-thumb.jpg') }}" alt="">--}}
{{--                                    <h4>Mehdi <span class="name-color">H.</span></h4>--}}
{{--                                    <ul class="authore-course-rating">--}}
{{--                                        <li><i class="fa-solid fa-star"></i></li>--}}
{{--                                        <li><i class="fa-solid fa-star"></i></li>--}}
{{--                                        <li><i class="fa-solid fa-star"></i></li>--}}
{{--                                        <li><i class="fa-solid fa-star"></i></li>--}}
{{--                                    </ul>--}}
{{--                                    <span class="rating-count">(44)</span>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <a href="{{ route('user-payment-methods') }}" class="know-details">Know Details <i--}}
{{--                                            class="fa-solid fa-arrow-right"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
@endsection
