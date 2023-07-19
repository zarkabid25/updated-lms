@extends('admin.layout')

@section('title', 'Edit MCQ Category')

@section('content')
    @php
        $categories = (new \App\Models\MCQsCategory())->all();
        $subjects = (new \App\Models\MCQSubject())->all();
        $subSubjects = (new \App\Models\MCQSubSubjectName())->all();
        $universities = (new \App\Models\University())->all();
        $testTypes = (new \App\Models\EntryTestType())->all();
    @endphp

    <div class="container">
        <form action="{{ route('admin.update-cat') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="cat_id" value="{{ $subSubject->subject->category->id }}">
            <input type="hidden" name="subj_id" value="{{ $subSubject->subject->id }}">
            <input type="hidden" name="subSubj_id" value="{{ $subSubject->id }}">

            <div class="card">
                <div class="card-body">
                    <h3>Entry Test</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Test Name</label>
                            <select id="test_name" name="test_name" class="js-example-tags form-control" required>
                                <option selected disabled>Select Entry Test</option>
                                @forelse($testTypes as $testType)
                                    <option value="{{ $testType->id }}" @if($testType->name === $subSubject->subj->cat->entryTest->name) selected @endif>
                                        {{ ucfirst($testType->name) }}</option>
                                @empty
                                @endforelse
                            </select>
                            {{--                            <input type="text" name="category_name" value="{{ $subSubject->subject->category->category_name }}" class="category_name form-control" />--}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h3>University</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">University Name</label>
                            <select id="uni_name" name="uni_name" class="js-example-tags form-control" required>
                                <option selected disabled>Select University</option>
                                @forelse($universities as $university)
                                    <option value="{{ $university->id }}" @if($university->name === $subSubject->subj->cat->uni->name) selected @endif>
                                        {{ ucfirst($university->name) }}</option>
                                @empty
                                @endforelse
                            </select>
                            {{--                            <input type="text" name="category_name" value="{{ $subSubject->subject->category->category_name }}" class="category_name form-control" />--}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h3>Category</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Category Name</label>
                            <select id="category_name" name="category_name" class="js-example-tags form-control" required>
                                <option selected disabled>Select Category</option>
                                @forelse($categories as $category)
                                    <option value="{{ $category->category_name }}" @if($category->category_name === $subSubject->subject->category->category_name) selected @endif>
                                        {{ ucfirst($category->category_name) }}</option>
                                @empty
                                @endforelse
                            </select>
{{--                            <input type="text" name="category_name" value="{{ $subSubject->subject->category->category_name }}" class="category_name form-control" />--}}
                        </div>

                        <div class="col-md-6">
                            @php
                                $imagePath = explode('.', !is_null($subSubject->subject->category->category_image) ? $subSubject->subject->category->category_image : 'user-avatar.png');
                            @endphp

                            <img id="catImg" src="{{asset('images')."/". $imagePath[0].".".$imagePath[1]}}" alt="" width="70" />
                            <label for="cat_img">Change Image</label>
                            <input type="file" id="cat_img" name="cat_img" style="display: none" class="cat_img form-control" />
                            <p id="catImgName"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h3>Subject</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Subject Name</label>
                            <select id="subject_name" name="subject_name" class="js-example-tags form-control" required>
                                <option selected disabled>Select Subject</option>
                                @forelse($subjects as $subject)
                                    <option value="{{ $subject->subject_name }}" @if($subject->subject_name === $subSubject->subject->subject_name) selected @endif>
                                        {{ $subject->subject_name }}</option>
                                @empty
                                @endforelse
{{--                                            <option>Chemistry</option>--}}
                            </select>
{{--                            <input type="text" name="subject_name" class="subject_name form-control" value="{{ $subSubject->subject->subject_name }}" />--}}
                        </div>

                        <div class="col-md-6">
                            @php
                                $imagePath = explode('.', !is_null($subSubject->subject->subject_image) ? $subSubject->subject->subject_image : 'user-avatar.png');
                            @endphp
                            {{--                        <label for="">Subject Image</label>--}}
                            {{--                        <input type="file" class="subject_img form-control" />--}}
                            <img id="subjImg" src="{{asset('images')."/". $imagePath[0].".".$imagePath[1]}}" alt="" width="70" />
                            <label for="subj_img">Change Image</label>
                            <input type="file" id="subj_img" name="subj_img" style="display: none" class="form-control" />
                            <p id="subj_img_name"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h3>Sub Subject</h3>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
                            <label for="sub_subject_name">Sub-Subject Name</label>
                            <select id="sub_subject_name" name="sub_subject_name" class="js-example-tags form-control" required>
                                <option selected disabled>Select Sub-subject</option>
                                @forelse($subSubjects as $subSubj)
                                    <option value="{{ $subSubj->sub_subject_name }}" @if($subSubj->sub_subject_name === $subSubject->sub_subject_name) selected @endif>
                                        {{ $subSubj->sub_subject_name }}</option>
                                @empty
                                @endforelse
{{--                                            <option>Chemistry</option>--}}
                            </select>
                            <span class="error_msg1 text-danger"></span>

{{--                            <input type="text" name="sub_subject_name" id="sub_subject_name" class="form-control" value="{{ $subSubject->sub_subject_name }}" />--}}
                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12  mt-3">
                            @php
                                $imagePath = explode('.', !is_null($subSubject->sub_subject_image) ? $subSubject->sub_subject_image : 'user-avatar.png');
                            @endphp

                            <img id="subSubjectImg" src="{{asset('images')."/". $imagePath[0].".".$imagePath[1]}}" alt="" width="70" />
                            <label for="subSubj_img">
                                Change Image
                            </label>
                            <input type="file" id="subSubj_img" name="subSubj_img" style="display:none;" class="form-control" />
                            <p id="subSubjName"></p>
                        </div>

                        {{--                    <div class="col-md-12 col-sm-12 col-xs-12  mt-3">--}}
                        {{--                        <label for="sub_subject_name">Quiz Time</label>--}}
                        {{--                    </div>--}}

                        {{--                    <div class="col-md-6 col-sm-12 col-xs-12">--}}
                        {{--                        <input type="text" id="time" class="form-control" data-format="HH:mm" data-template="HH : mm" name="paper_time">--}}
                        {{--                    </div>--}}
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

@section('JS')
    <script>
        $("#subSubj_img").change(function(){
            $("#subSubjName").text(this.files[0].name);
            $('#subSubjectImg').hide();
        });

        $("#subj_img").change(function(){
            $("#subj_img_name").text(this.files[0].name);
            $('#subjImg').hide();
        });

        $("#cat_img").change(function(){
            $("#catImgName").text(this.files[0].name);
            $('#catImg').hide();
        });

        $(function() {
            $('#time').combodate({
                firstItem: 'name', //show 'hour' and 'minute' string at first item of dropdown
                minuteStep: 1
            });
        });
    </script>
@endsection
