@extends('student.dashboard-layout')

@section('title', 'My Courses')

@section('content')
    <div class="container-fluid" style="margin-bottom: 15%;">
        <div class="row">
            <div class="col-lg-8" style="padding-top: 30px;">
                <h3>DASHBOARD</h3>
            </div>
            <div class="col-lg-4" style="padding-top: 50px;">
                <button type="submit" class="search-btn">
                    <img src="{{ asset('images/search-icon.png') }}" alt="no image" width="20">
                </button>

                <input type="text" class="search-input" placeholder="python coding" name="filter">
            </div>
        </div>

        <div class="row" style="margin-top: 30px; display: flex; justify-content: center;">
            <div class="col-lg-3" style="font-size: 22px;">
                <p><strong>My Courses</strong></p>
            </div>
        </div>


        <div class="row dashboard-searchbar-bottom-line">
            <div class="col-lg-12" style="border: 1px solid #707070"></div>
        </div>

        <div class="row ruslt_ser" style="margin-top: 10px; justify-content: center;">
            @if(count($courses) > 0)
                @foreach($courses as $course)

                    <div class="col-lg-4 col-md-4">
                        @php
                            $imagePath = explode('.', !is_null($course->course->course_image) ? $course->course->course_image : 'do_not_delete.png');
                        @endphp
                        <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                        transition: 0.3s; padding: 10px;">
                            <div class="card-header" style="text-align: center; height:224px;" >
                                <img src="{{asset('images')."/". $imagePath[0].".".$imagePath[1]}}"
                                     class="img-fluid" alt="No Image"  style=" width: 100%;height: 100%; object-fit: contain;">
                            </div>
                            <div class="card-body" style="text-align: center">
                                <p style="margin-top: 15px; font-size: 16px; font-weight: bold;">
                                    <a href="{{url('student/purchased_course_detail/'. encrypt($course->course->id))}}" style="text-decoration: none; color: black">
                                        {{ ucwords($course->course->course_name) }}
                                    </a>
                                </p>
                            </div>
                            <div class="card-footer" style="text-align: center">
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-lg-12">
                                        <p style="color: #C9C97E; font-size: 12px;">{{ ucfirst($course->class->class_name) }} Class</p>
                                    </div>
{{--                                    <div class="col-lg-6">--}}
{{--                                        <p style="font-size: 10px; font-style: italic">Length: {{ $course->class->class_duration }}</p>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div style="text-align: center; font-size: 24px">
                    <i class="fa-solid fa-folder-open"></i>
                    <p>No record found...</p>
                </div>
            @endif
        </div>
    </div>

    <div class="pagini">
        {{ $courses->links() }}
    </div>
@endsection

@section('JS')
    <script>
        $(document).ready(function() {
            $(document).on('keyup', '.search-input', function() {
                var data=$(".search-input").val();
                $(this).append('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>');
                $.ajax({
                    url: '{{ url('/student/find_my_course') }}',
                    data: {
                        data
                    },
                    type: 'post',
                    success: function(result) {
                        $(".ruslt_ser").empty();
                        $(".ruslt_ser").append(result);
                    }
                });
            });
        });
    </script>
@endsection

