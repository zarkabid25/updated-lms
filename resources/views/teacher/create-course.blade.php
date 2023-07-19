@extends('teacher.dashboard-layout')

@section('title', 'Create Course')

@section('content')
    <div class="container-fluid" style="margin-bottom: 15%;">
{{--        @if(Session::has('error'))--}}
{{--            <p class="alert alert-danger">{{ Session::get('error') }}</p>--}}
{{--        @endif--}}
        <div class="row">
            <div class="col-lg-12 pl_0 text_center" style="padding-top: 30px;">
                <h3>DASHBOARD / <span style="color: #C9C97E">CREATE NEW COURSE</span></h3>
            </div>

{{--            <div class="col-lg-6 text_center" style="padding-top: 50px;">--}}
{{--                <button type="submit" class="search-btn" style="cursor: unset">--}}
{{--                    <img src="{{ asset('images/search-icon.png') }}" alt="no image" width="20">--}}
{{--                </button>--}}

{{--                <input type="text" class="search-input" placeholder="python coding" name="search">--}}
{{--            </div>--}}
        </div>

        <div class="row" style="margin-top: 30px; display: flex; justify-content: center;">
            <div class="col-lg-3" style="padding: 0px; margin: 0px; font-size: 22px;">
                <p><strong>Create Course</strong></p>
            </div>
        </div>

        <div class="row dashboard-searchbar-bottom-line">
            <div class="col-lg-12" style="border: 1px solid #707070"></div>
        </div>

        <form action="{{ route('teacher.createCourse.store') }}" method="POST" id="my_form" enctype="multipart/form-data">
            @csrf

            <input type="hidden" id="class_id" name="class_name">
            <input type="hidden" id="description" name="description_course">

            <div class="row" style="margin-bottom: 4%;">
                <div class="col-md-6">
                    <h4><strong>Course Cover Image</strong></h4>
                    <input type="file" name="course_cover"
                           class="@error('course_cover') is-invalid @enderror form-control"
                           autocomplete="course_cover" autofocus accept="image/jpeg, .png" >
                    @error('course_cover')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                    <p>(format: JPG, PNG)</p>
                </div>

                <div class="col-lg-6">
                    <h4><strong>Course Name</strong></h4>
                    <input type="text" name="course_name" required class="form-control
                    @error('course_price') is-invalid @enderror" value="{{ old('course_name') }}">

                    @error('course_name')
                    <span class="invalid feedback alert-danger" role="alert">
                                <strong>{{ $message }}.</strong>
                            </span>
                    @enderror
                </div>
            </div>

            <div class="row" style="margin-bottom: 4%;">
                <div class="col-lg-6">
                    <h4><strong>Course Price</strong></h4>
                    <input type="number" name="course_price" class="form-control
                    @error('course_price') is-invalid @enderror" value="{{ old('course_price') }}"
                           oninput="this.value = this.value.replace(/[^0-9.]/g, '');
                           this.value = this.value.replace(/(\..*)\./g, '$1');" required>
                    @error('course_price')
                    <span class="invalid feedback alert-danger" role="alert">
                                <strong>{{ $message }}.</strong>
                            </span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <h4><strong>Course Video Thumbnail</strong></h4>
                    <input type="file" name="video_thumnail"
                           class="@error('video_thumnail') is-invalid @enderror form-control"
                           autocomplete="video_thumnail" autofocus accept="image/jpeg, .png" >
                    @error('video_thumnail')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                    <p>(format: JPG, PNG)</p>
                </div>
            </div>

            <div class="row" style="margin-bottom: 4%;">
                <div class="col-lg-6">
                    <h4><strong>Course Video Title</strong></h4>
                    <input type="text" name="course_video_title" required class="form-control
                    @error('course_video_title') is-invalid @enderror" value="{{ old('course_video_title') }}">

                    @error('course_video_title')
                    <span class="invalid feedback alert-danger" role="alert">
                        <strong>{{ $message }}.</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-lg-6">
                    <h4><strong>Course Video Link</strong></h4>
                    <input type="text" name="course_video_link" required class="form-control
                    @error('course_video_link') is-invalid @enderror" value="{{ old('course_video_link') }}">

                    @error('course_video_link')
                    <span class="invalid feedback alert-danger" role="alert">
                        <strong>{{ $message }}.</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <h4><strong>Describe course</strong></h4>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                <textarea name="description_course" id="description_course" cols="55" rows="10"
                          placeholder="Tell the user /student the course is about...."></textarea>
                </div>
            </div>

            <div class="row" style="margin-bottom: 4%;">
                <div class="col-md-6" style="text-align: right">
                    <p>Max: 3000 words</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div>
                        <button type="submit" id="form_sub" class="profile-save-btn">Save</button>&nbsp;&nbsp;&nbsp;&nbsp;
{{--                        <a href="#" class="profile-draft-btn">Draft</a>--}}
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('JS')
    <script>

        // $(document).ready(function(){
        //
        //
        //
        // });

        $("#file-upload").change(function(){
            $("#file-name").text(this.files[0].name);
        });

        $("#vid_1").change(function(){
            $("#name_1").text(this.files[0].name);
        });
        $("#vid_2").change(function(){
            $("#name_2").text(this.files[0].name);
        });
        $("#vid_3").change(function(){
            $("#name_3").text(this.files[0].name);
        });
        $("#vid_4").change(function(){
            $("#name_4").text(this.files[0].name);
        });

        $('#class_name').on('change', function (){
            var classs = $('#class_name').val();
            $('#class_id').val(classs);
            console.log(classs);
        });


        var myDropzoneTheFirst = new Dropzone(
            '#vid_1', {
                maxFilesize:20,
                // acceptedFiles: ".jpeg,.jpg,.png,.gif",
                success: function(file, response)
                {
                    console.log(response);
                },
                error: function(file, response)
                {
                    return false;
                }
            }
        );

        // var myDropzoneTheSecond = new Dropzone(
        //     '#vid_2', {
        //         maxFilesize:1,
        //         // acceptedFiles: ".jpeg,.jpg,.png,.gif",
        //         success: function(file, response)
        //         {
        //             console.log(response);
        //         },
        //         error: function(file, response)
        //         {
        //             return false;
        //         }
        //     }
        // );
        //
        // var myDropzoneTheThird = new Dropzone(
        //     '#vid_3', {
        //         maxFilesize:1,
        //         // acceptedFiles: ".jpeg,.jpg,.png,.gif",
        //         success: function(file, response)
        //         {
        //             console.log(response);
        //         },
        //         error: function(file, response)
        //         {
        //             return false;
        //         }
        //     }
        // );
        //
        // var myDropzoneTheFour = new Dropzone(
        //     '#vid_4', {
        //         maxFilesize:1,
        //         // acceptedFiles: ".jpeg,.jpg,.png,.gif",
        //         success: function(file, response)
        //         {
        //             console.log(response);
        //         },
        //         error: function(file, response)
        //         {
        //             return false;
        //         }
        //     }
        // );

        $("#form_sub").click(function(){
            var description = tinymce.get("description_course").getContent();
            $('#description').val(description);
            $('#my_form').submit();
            //alert(description);
            console.log(description);
        });



    </script>
@endsection
