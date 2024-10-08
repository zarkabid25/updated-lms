@extends('student.dashboard-layout')

@section('title', 'Course Detail')

@section('content')
    <div class="container-fluid" style="margin-bottom: 50%;">
        <div class="row" style="margin-bottom: 2%;">
            <div class="col-lg-8" style="padding-top: 30px;">
                <h3>DASHBOARD / <span style="color: #C9C97E">COURSE DETAILS</span></h3>
            </div>
{{--            <div class="col-lg-4" style="padding-top: 40px;">--}}
{{--                <div class="add-to-cart">--}}
{{--                    <a href="{{ route('student.add-to-cart', ['teach_id' => encrypt($course->teacher_id)]) }}">--}}
{{--                        <i--}}
{{--                            class="fas fa-shopping-cart">{{ App\Models\cart::where('user_id', auth()->user()->id)->count() }}</i>--}}
{{--                        &nbsp;&nbsp;&nbsp;&nbsp;<span>Add to Cart</span>--}}
{{--                    </a>--}}

{{--                </div>--}}
{{--            </div>--}}
        </div>


        <div class="row mt-5 black-img-row" style="margin-bottom: 10%;">
            <div class="col-md-4">
                @php
                    $imagePath = explode('.', !is_null($course->course_image) ? $course->course_image : 'do_not_delete.png');
                @endphp
                <div class="card">
                    <div class="card-body" style="text-align: center; padding: 0px;">
                        <img src="{{ asset('images') . '/' . $imagePath[0] . '.' . $imagePath[1] }}" class="card-img"
                            alt="No Image" style="width: 100%">
                    </div>
                </div>
                {{--                <span class="img-text" style="float: right">Lenght: {{ $course->class->class_duration }}</span> --}}
            </div>
            <div class="col-sm-8">
                <div class="heading-1" id="add-to-cart">
                    <h3><strong>{{ $course->course_name }}</strong></h3>
                    <hr>
                    <h4>Course Fee <br><span class="span-class span_left">${{ $course->price }}</span></h4>
                    <h4><i class="fa fa-calendar" aria-hidden="true"></i> Created Date <br><span
                            class="span-class span_left">{{ date('Y-m-d', strtotime($course->updated_at)) }}</span></h4>
                    <h4><i class="fa fa-clock-o" aria-hidden="true"></i> Created Time <br> <span
                            class="span-class span_left">{{ date('h:i:s A', strtotime($course->updated_at)) }}</span></h4>

                    @if ((new \App\Models\PaymentPlan())->where('course_id', $course->id)->where('status', 'approved')->exists())
                        <button type="button" class="add-cart-btn" disabled
                                style="text-decoration: none; color: white;border:none;">Purchased</button>
                    @elseif((new \App\Models\PaymentPlan())->where('course_id', $course->id)->where('status', 'pending')->exists())
                        <button type="button" class="add-cart-btn" disabled
                                style="text-decoration: none; color: white;border:none;">Requested to Buy</button>
                    @else
                        <button type="button" class="add-cart-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                style="text-decoration: none; color: white;border:none;">Buy Now</button>
                    @endif
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">Course Overview</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Course
                            Videoes</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                            type="button" role="tab" aria-controls="contact" aria-selected="false">Course
                            Ratings</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-lg-12 pt-4">
                                <h5>Course Discription</h5>
                                <hr class="mt-0">
                                <p>{!! $course->course_description !!}</p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <h5>Course Teachers</h5>
                            <hr class="mt-0">
                            @foreach ($teachers as $t)
                                {{--                               @if (!empty($course->video_title) && !empty($course->video_title) && !empty($course->video_title)) --}}
                                @php
                                    $imagePath = explode('.', !is_null($t->image) ? $t->image : 'do_not_delete.png');
                                @endphp
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header p-0">
                                            <img src="{{ asset('images') . '/' . $imagePath[0] . '.' . $imagePath[1] }}"
                                                class="card-img" alt="No Image" style="width: 100%">
                                        </div>

                                        <div class="card-body text-center">
                                            <p style="font-size: 12px"><b
                                                    style="text-decoration: none;">{{ $t->name }}</b></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        @if ((new \App\Models\PaymentPlan())->where('course_id', $course->id)->where('status', 'approved')->exists())
                            @if (!empty($course->video_title) && !empty($course->video_title) && !empty($course->video_title))
                                <div class="row" style="margin-top: 20px;">
                                    {{--                               @if (!empty($course->video_title) && !empty($course->video_title) && !empty($course->video_title)) --}}
                                    @php
                                        $imagePath = explode('.', !is_null($course->video_thumbnail) ? $course->video_thumbnail : 'do_not_delete.png');
                                    @endphp
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-header p-0">
                                                <img src="{{ asset('images') . '/' . $imagePath[0] . '.' . $imagePath[1] }}"
                                                    class="card-img" alt="No Image" style="width: 100%">
                                            </div>

                                            <div class="card-body text-center">
                                                <p style="font-size: 12px"><a href="{{ $course->video_link }}"
                                                        style="text-decoration: none;">{{ $course->video_title }}</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @elseif((new \App\Models\PaymentPlan())->where('course_id', $course->id)->where('status', 'pending')->exists())
                            <div class="alert alert-danger alert-dismissible" style="margin-top: 2%;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                Your request to buy this course has been received. We will get back to you soon.
                                <a href="#" class="btn btn-secondary"
                                   style="float: right;bottom: 10px; pointer-events: none">Requested</a>
                            </div>
                        @else
                            <div class="alert alert-danger alert-dismissible" style="margin-top: 2%;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                Please purchase the Course to view a lecture
                                <a href="#add-to-cart" class="btn btn-primary"
                                    style="float: right;bottom: 10px;">Purchase</a>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row">
                            <div class="col-md-12 pt-4">
                                <h4>Course Reviews</h4>

                                <div style="display: inline-flex">
                                    <p style="font-size: 2rem; font-weight: bold">4.7</p>
                                    <span style="padding-top: 8px; padding-left: 10px; font-size: 25px; color: #ffc700;">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <h4>Students Reviews</h4>
                                <hr class="mt-0">
                            </div>
                        </div>

                        @php
                            $ratings = (new \App\Models\Rating())
                                ->whereHas('user')
                                ->latest()
                                ->get();

                        @endphp

                        @forelse($ratings as $rating)
                            @php
                                $user_data = (new \App\Models\User())->where('id', $rating->user_id)->first(['image', 'name']);
                                $imagePath = explode('.', !is_null($user_data->image) ? $user_data->image : 'do_not_delete.png');
                            @endphp
                            @if (!empty($rating->stars))
                                <div class="card border-0 mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2" style="text-align: end">
                                                <span>
                                                    <img src="{{ asset('images') . '/' . $imagePath[0] . '.' . $imagePath[1] }}"
                                                        class="card-img" alt="No Image" width="80"
                                                        style="border-radius: 50px">
                                                </span>
                                            </div>

                                            <div class="col-md-8">
                                                <h5 style="font-family: cursive;">
                                                    <strong>{{ ucwords($user_data->name) }}</strong>
                                                </h5>
                                                <div class="rated" style="width: 100%; display: flex;">
                                                    @for ($i = 1; $i <= $rating->stars; $i++)
                                                        <label class="star-rating-complete"
                                                            title="text">{{ $i }} stars</label>
                                                    @endfor
                                                </div>

                                                {!! $rating->message !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                        @endforelse

                        <div class="row mt-5">
                            <div class="col-md-12">
                                <form class="py-2 px-4" action="{{ route('student.rate-teacher') }}"
                                    style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
                                    @csrf
                                    <p class="font-weight-bold" style="font-size: 18px; font-weight: bold">Rate this Course</p>
                                    <div class="form-group row">
                                        <input type="hidden" name="teacher_id" value="{{ $course->teacher_id }}">
                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                        <div class="col">
                                            <div class="rate">
                                                <input type="radio" id="star5" class="rate" name="stars"
                                                    value="5" />
                                                <label for="star5" title="text">5 stars</label>
                                                <input type="radio" id="star4" class="rate"
                                                    name="stars" value="4" />
                                                <label for="star4" title="text">4 stars</label>
                                                <input type="radio" id="star3" class="rate" name="stars"
                                                    value="3" />
                                                <label for="star3" title="text">3 stars</label>
                                                <input type="radio" id="star2" class="rate" name="stars"
                                                    value="2">
                                                <label for="star2" title="text">2 stars</label>
                                                <input type="radio" id="star1" class="rate" name="stars"
                                                    value="1" />
                                                <label for="star1" title="text">1 star</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-4">
                                        <div class="col">
                                            <textarea class="form-control" name="message" rows="6 " placeholder="Comment" maxlength="200"></textarea>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-right">
                                        <button class="btn btn-sm py-2 px-3 btn-info">Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal for payment request-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Payment Request</h3>
                    {{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                </div>

                <div class="modal-body">
                    <h5>Your request to buy this course has been submitted. We will get back to you soon.</h5>
                </div>

                <div class="modal-footer">
                    <form action="{{ route('paymnt-plan') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="course_name" value="{{ $course->course_name }}">
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <input type="hidden" name="teacher_id" value="{{ $course->teacher_id }}">
                        <input type="hidden" name="course_price" value="{{ $course->price }}">
                        <input type="hidden" name="request_product" value="2">
                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </form>

{{--                    <form action="{{ route('paymnt-plan') }}" method="post">--}}
{{--                        @csrf--}}
{{--                        <input type="hidden" name="payment_plan" id="payment_plan">--}}
{{--                        <input type="hidden" name="request_product" value="1">--}}
{{--                        <input type="hidden" name="price" value="10">--}}
{{--                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>

@endsection
