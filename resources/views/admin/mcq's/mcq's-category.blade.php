@extends('admin.layout')

@section('title', 'Create MCQ Category')

@section('css')
    <style>
        .select2-container--default .select2-selection--single .select2-selection__arrow{
            top: 6px !important;
            right: 10px !important;
        }

        .select2-container .select2-selection--single{
            height: 40px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered{
            background-color: unset !important;
            line-height: 20px !important;
        }

        .select2-container .select2-selection--single .select2-selection__rendered{
            padding-left: 12px !important;
        }

    </style>
@endsection

@section('content')
    <div class="container">
{{--        <div class="text-right mb-3">--}}
{{--            <button type="button" class="btn btn-success add_year">+ Add Year</button>--}}
{{--        </div>--}}
        @php
            $categories = (new \App\Models\MCQsCategory())->all();
            $subjects = (new \App\Models\MCQSubject())->all();
            $subSubjects = (new \App\Models\MCQSubSubjectName())->all();
            $testTypes = (new \App\Models\EntryTestType())->all();
        @endphp

        <form action="{{ route('admin.store-category') }}" method="post" id="my_form" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Test Type & University</h3>
                        </div>

                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="">Test Type</label>
                                    <select class="form-control" name="testType" id="testType">
                                        <option selected disabled>Select Test Type</option>
                                        @forelse($testTypes as $testType)
                                            <option value="{{ $testType->id }}">{{ ucwords($testType->name) }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>

                                <div class="col-md-6" id="uni"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Category Name</h3>
                        </div>

                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="category_name">Category Name</label>
                                    <select id="category_name" name="category_name" class="js-example-tags form-control" required>
                                        <option selected disabled>Select Category/Add New</option>
                                        @forelse($categories as $category)
                                            <option value="{{ $category->category_name }}">{{ ucfirst($category->category_name) }}</option>
                                        @empty
                                        @endforelse
{{--                                        <option>purple</option>--}}
                                    </select>
                                    <span class="error_msg text-danger"></span>
                                </div>

                                <div class="col-md-6">
                                    <label>Category Image</label>
                                    <input type="file" name="cat_img" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 d-flex justify-content-end">
                                    <button type="button" class="btn btn-info add_sub_sub_btn">+ Add Sub-Subject Name</button>
                                </div>
                            </div>

                            <h3>Paper Subject Type</h3>
                        </div>

                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="subject_name">Subject Name</label>
                                    <select id="subject_name" name="subject_name" class="js-example-tags form-control" required>
                                        <option selected disabled>Select Subject/Add New</option>
                                        @forelse($subjects as $subject)
                                            <option value="{{ $subject->subject_name }}">{{ $subject->subject_name }}</option>
                                        @empty
                                        @endforelse
{{--                                        <option>Chemistry</option>--}}
                                    </select>
                                    <span class="error_msg1 text-danger"></span>
                                </div>

                                <div class="col-md-6">
                                    <label>Subject Image</label>
                                    <input type="file" name="subject_img" class="form-control" />
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 sub_subject_name_field mt-3" style="display: none">
                                    <label for="sub_subject_name">Sub-Subject Name</label>
                                    <select id="sub_subject_name" name="sub_subject_name" class="js-example-tags form-control" required>
                                        <option selected disabled>Select Sub-subject/Add New</option>
                                        @forelse($subSubjects as $subSubject)
                                            <option value="{{ $subSubject->sub_subject_name }}">{{ $subSubject->sub_subject_name }}</option>
                                        @empty
                                        @endforelse
                                        {{--                                        <option>Chemistry</option>--}}
                                    </select>
                                    <span class="error_msg1 text-danger"></span>

{{--                                    <input type="text" name="sub_subject_name" id="sub_subject_name" class="form-control">--}}
                                </div>


                                <div class="col-md-6 col-sm-12 col-xs-12 sub_subject_name_field mt-3" style="display: none">
                                    <label for="sub_subject_name">Sub-Subject Image</label>
                                    <input type="file" name="sub_subject_img" id="sub_subject_img" class="form-control">
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 sub_subject_name_field mt-3" style="display: none">
                                    <label for="sub_subject_name">Quiz Time</label>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 sub_subject_name_field" style="display: none">
                                    <input type="text" id="time" class="form-control" data-format="HH:mm" data-template="HH : mm" name="paper_time">
                                </div>
                            </div>
                        </div>
                    </div>

{{--                    <div class="card year_section" style="display: none">--}}
{{--                        <div class="card-header">--}}
{{--                            <h3>Create Year</h3>--}}
{{--                        </div>--}}

{{--                        <div class="card-body">--}}
{{--                            <div class="row mb-3">--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <label for="year">Year (Optional)</label>--}}
{{--                                    <select id="year" name="year" class="js-example-tokenizer form-control">--}}
{{--                                        <option selected disabled>Select Year/Add New</option>--}}
{{--                                        <option>2020</option>--}}
{{--                                        <option>2021</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary form_submit">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('JS')
    <script>
        $(document).on('change', '#testType', function (){
            var testType = $(this).val();
            $.ajax({
               type: "GET",
               url: "{{ route('admin.get-uni') }}",
               data: {testType: testType},
                success: function(response){
                   console.log(response);
                   $('#uni').html(response.university);
                }
            });
        });


        $(".js-example-tags").select2({
            tags: true
        });

        $('.add_sub_sub_btn').on('click', function (){
           $('.sub_subject_name_field').toggle();
        });

        $('.form_submit').on('click', function (){

            if($('#category_name').val() == null && $('#subject_name').val() != null){
                $('.error_msg').text('This field is required');
                $('.error_msg1').hide();
            }
            if ($('#category_name').val() == null){
                $('.error_msg').text('This field is required');
                return false;
            }

            // if($('#subject_name').val() == null && $('#category_name').val() != null){
            //     $('.error_msg1').text('This field is required');
            //     $('.error_msg').hide();
            // } else if ($('#subject_name').val() == null){
            //     $('.error_msg1').text('This field is required');
            // }

            if($('#category_name').val() != null || $('#subject_name').val() != null){
                $('#my_form').submit();
            }
        });

        $(function() {
            $('#time').combodate({
                firstItem: 'name', //show 'hour' and 'minute' string at first item of dropdown
                minuteStep: 1
            });
        });

        // $('.add_year').on('click', function (){
        //    $('.year_section').toggle();
        // });
    </script>
@endsection
