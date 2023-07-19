@extends('teacher.dashboard-layout')

@section('title', 'My Courses')

@section('content')
    <div class="container-fluid" style="margin-bottom: 15%;">
        <div class="row">
            <div class="col-lg-8 pl_0 text_center" style="padding-top: 30px; padding-left: 0px;">
                <h3>DASHBOARD</h3>
            </div>

            <div class="col-lg-4 text_center" style="padding-top: 50px; text-align: end">
                <button type="submit" class="search-btn">
                    <img src="{{ asset('images/search-icon.png') }}" alt="no image" width="20">
                </button>

                <input type="text" class="search-input" placeholder="python coding" name="search">
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

        <div class="row ruslt_ser" style="margin-top: 10px;">
            @if(count($courses) > 0)
                @foreach($courses as $course)
                    <div class="col-lg-4 col-md-4">
                        @php
                            $imagePath = explode('.', !is_null($course->course_image) ? $course->course_image : 'do_not_delete.png');
                        @endphp
                        <div class="card course_card">
                            <div class="card-header" style="height: 224px;">
                                <img src="{{asset('images')."/". $imagePath[0].".".$imagePath[1]}}"
                                     class="img-fluid" alt="No Image" style="width: 100%;height: 100%; object-fit: contain;">
                            </div>

                            <div class="card-body" style="text-align: center">
                                <p style="margin-top: 15px; font-size: 16px; font-weight: bold;">{{$course->course_name}}</p>
                            </div>
                            <div class="card-footer" style="text-align: center">
{{--                                <div class="row" style="margin-top: 10px;">--}}
{{--                                    <div class="col-lg-12">--}}
{{--                                        <p style="color: #C9C97E; font-size: 12px;">{{ ucwords($course->class_name) }} Class</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                @if($course->status == 1)
                                <div class="row" style="display: flex; justify-content: center">
                                    <div class="col-lg-1" style="padding-right: 30px;">
                                        <div class="12" >
                                            <span style="padding-left: 5px;">
                                                <a href="{{ route('teacher.createCourse.edit', ['createCourse' => encrypt($course->id)]) }}"
                                                   style="text-decoration: none">
                                                <i class="fas fa-pen" style="color: #C9C97E"></i>
                                                </a>
                                            </span>
                                        </div>
                                        <div class="12">
                                            <a href="{{ route('teacher.createCourse.edit', ['createCourse' => encrypt($course->id)]) }}"
                                               style="text-decoration: none">
                                                <p style="color: #C9C97E; font-weight: bold">Edit</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-1" style="padding-right: 30px;">
                                        <div class="col-12">
                                    <span style="padding-left: 5px;">
                                        <a href="{{ route('teacher.course-detail', ['id' => encrypt($course->id)]) }}" style="text-decoration: none; color: black">
                                            <i class="fas fa-eye" style="color: #C9C97E"></i>
                                        </a>
                                    </span>
                                        </div>
                                        <div class="col-12">
                                            <a href="{{ route('teacher.course-detail', ['id' => encrypt($course->id)]) }}" style="text-decoration: none; color: black">
                                                <p style="color: #C9C97E; font-weight: bold">View</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-1" >
                                        <div class="col-12">
                                            <div style="padding-left: 5px;">
                                                <button type="button" class="userDeleteclass" style="border: none; background: none; line-height: 0px; margin-top: 0px; padding-top: 0px; padding-bottom: 0px; margin-bottom: 0px;"
                                                        userId="{{$course->id}}">
                                                    <i class="fas fa-trash" style="color: red"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            {{--                                    <a href="{{ route('teacher.course-delete', ['id' => encrypt($course->id)]) }}"--}}
                                            <button type="button" class="userDeleteclass" style="background: none; line-height: 0px; padding-top: 0px; border: none"
                                                    userId="{{$course->id}}">
                                                <p style="color: red; font-weight: bold">Delete</p>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <span style="font-size: 20px;color:red;"><b>Deactive Reason</b></span><br>
                                <span style="font: 15px;"><b>{{$course->reason}}</b></span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div style="text-align: center; font-size: 24px">
                    {{--                <i class="fa-solid fa-folder-open"></i>--}}
                    <p>No notes found...</p>
                </div>
            @endif
        </div>

        <div class="pagini">
            {{ $courses->links() }}
        </div>
{{--        <div class="row" style="margin-top: 30px; margin-right: 40px; display: flex; justify-content: end;">--}}

            {{--            <div class="col-lg-1 col-md-1" style="text-align: center; margin-right: -12px;">--}}
            {{--                <div style="padding: 5px 5px; background-color: white;--}}
            {{--                color: #C9C97E;border: 1px solid #C9C97E; border-radius: 5px;">1</div>--}}
            {{--            </div>--}}

            {{--            <div class="col-lg-1 col-md-1" style="text-align: center; margin-right: -12px;">--}}
            {{--                <div style="padding: 5px 5px; background-color: #C9C97E;--}}
            {{--                color: white; border: 1px solid #C9C97E; border-radius: 5px;">2</div>--}}
            {{--            </div>--}}

            {{--            <div class="col-lg-1 col-md-1" style="text-align: center; margin-right: -12px;">--}}
            {{--                <div style="padding: 5px 5px; background-color: #C9C97E;--}}
            {{--                color: white; border: 1px solid #C9C97E; border-radius: 5px;">3</div>--}}
            {{--            </div>--}}

            {{--            <div class="col-lg-1 col-md-1" style="text-align: center; margin-right: -12px;">--}}
            {{--                <div style="padding: 5px 5px; background-color: #C9C97E;--}}
            {{--                color: white; border: 1px solid #C9C97E; border-radius: 5px;">4</div>--}}
            {{--            </div>--}}
{{--        </div>--}}

    </div>



@endsection

@section('JS')
    <script>
        $('.userDeleteclass').click(function(e) {
            e.preventDefault();
            var user_id = $(this).attr('userId');
            // alert(user_id);
            swal({
                title: "Are you sure?",
                text: "Do you want to delete this note?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: '{{ route('teacher.course-delete') }}',
                            type: 'get',
                            data: {
                                'user_id': user_id
                            },
                            success: function(result) {
                                swal(result.success, {
                                    icon: "success",
                                })
                                    .then((result) => {
                                        location.reload();
                                    });
                                // window.reload();
                            }
                        });
                        // admin/deleteuser
                    }
                });
        });

        $(document).ready(function() {
            $(document).on('keyup', '.search-input', function() {
                var data=$(".search-input").val();
                $(this).append('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>');
                $.ajax({
                    url: '{{ url('/teacher/find_course') }}',
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

