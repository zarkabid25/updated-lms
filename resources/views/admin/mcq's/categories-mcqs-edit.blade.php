@extends('admin.layout')

@section('title', 'Create MCQs')

@section('css')
    <style>
        .quill-wrap {
            max-width:900px;
            width:100%;
            margin-left:auto;
            margin-right:auto;
            margin-top:20px;
        }
        .info {
            text-align:center;
            margin-top:20px;
        }
        .quill-wrap .ql-active {
            border: 1px solid #ccc !important;
            border-radius:4px;
        }
        .quill-wrap button, .quill-wrap .ql-picker {
            margin-right:2px
        }
    </style>
@endsection

@section('content')
    @php
        $categories = (new \App\Models\MCQsCategory())->all();
    @endphp

<div class="container">
{{--    <link rel="stylesheet" href="{{ asset('css/quill.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('css/quill.bubble.css') }}">--}}
    <link rel="stylesheet" href="//cdn.quilljs.com/1.0.0-beta.6/quill.snow.css">

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.update-mcqs',['id'=>encrypt($question->id)]) }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h2>Edit MCQ Question</h2>
                    </div>

                    <div class="card-body">
                        {{-- <div class="row mb-3">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-info more_ques">Add MCQ Option <i class="feather icon-plus"></i></button>
                            </div>
                        </div> --}}

{{--                        <div class="row">--}}
{{--                            <div class="col-md-12">--}}
{{--                                <label for="ques">Question Here:</label>--}}
{{--                                <textarea class="form-control ck_editor_txt" cols="12" rows="5" id="ques" name="ques" style="border-radius: 20px"></textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <label for="ques">Question Here:</label>
                        <div>
                            <!-- Create the editor container -->
                            <div id="editor">{!! $question->ques !!}</div>
                        </div>
                        <input type="hidden" name="ques" value="{{$question->ques}}" id="editor_text">

{{--                        <div class="row mt-3 apen_ques">--}}
{{--                            <div class="col-md-6 pb-3">--}}
{{--                                <label for="opt_a">Option A.</label>--}}
{{--                                <input type="text" class="form-control" id="opt_a" name="opt_a" style="border-radius: 50px" />--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="row mt-3 apen_ques">
                            @foreach($question->options as $op)
                                @php
                                        $opt_name = substr($op->opt_key, '4');
                                    @endphp
                            <div class="col-md-6 pb-3">
                                <label for="opt_a">Option {{strtoupper($opt_name)}}.</label>
                                <input type="text" class="form-control" id="{{$op->opt_key}}" name="{{$op->opt_key}}" value="{{$op->opt_value}}" style="border-radius: 50px" />
                            </div>
                            @endforeach
                        </div>

                        <div class="row mt-3 mb-3 "></div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h3>Correct Option (Optional)</h3>
                            </div>

                            <div class="col-md-6">
                                <label>Enter correct option</label>
                                <select class="form-control" name="correct_opt">
                                    <option selected="" value="" disabled="">Select Correct Option</option>
                                    @foreach($question->options as $op)
                                @php
                                        $opt_name = substr($op->opt_key, '4');
                                    @endphp
                                            <option @if($question->correct_option->correct_opt == $op->opt_value) selected @endif  class="form-control" style="border-radius: 50px;" value="{{$op->id}}">Option {{strtoupper($opt_name)}}</option>

                            @endforeach
                                        </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Correct Option Explanation (Optional)</label>
                                <textarea style="border-radius: 10px" cols="20" rows="6" name="correc_opt_explanation" placeholder="Enter explanation for correct option" class="form-control ">{{$question->correct_option->incorrect_explanation}}</textarea>
                                {{--                                <input type="text" name="correct_opt" class="form-control" style="border-radius: 50px;">--}}
                            </div>
                        </div>
                        <div class="custom-control custom-switch mt-3">
                            <input type="checkbox" class="custom-control-input" name="status" id="customSwitch1" @if($question->status==1) checked @endif>
                            <label class="custom-control-label" for="customSwitch1">Status</label>
                          </div>
                          
                          <div class="custom-control custom-switch mt-3">
                            <input type="checkbox" class="custom-control-input" name="test" id="customSwitch2" @if($question->test==1) checked @endif>
                            <label class="custom-control-label" for="customSwitch2">Is Test</label>
                          </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('JS')
{{--    <script src="{{ asset('js/sprite.svg.js') }}"></script>--}}
    <script src="//cdn.quilljs.com/1.0.0-beta.6/quill.js"></script>

    <script>
        var toolbarOptions = [
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['blockquote', 'code-block'],

            [{
                'header': 1
            }, {
                'header': 2
            }], // custom button values
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }], // superscript/subscript
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }], // outdent/indent
            [{
                'direction': 'rtl'
            }], // text direction

            [{
                'size': ['small', false, 'large', 'huge']
            }], // custom dropdown

            [{
                'color': []
            }, {
                'background': []
            }], // dropdown with defaults from theme
            [{
                'font': []
            }],
            [{
                'align': []
            }],
            ['link', 'image'],

            ['clean'] // remove formatting button
        ];

        var quillFull = new Quill('#editor', {
            modules: {
                toolbar: toolbarOptions,
                autoformat: true
            },
            theme: 'snow',
            placeholder: "Write something...",
            name: "ques",
        });


        var allEditors = document.querySelectorAll('.ck_editor_txt');
        for (var i = 0; i < allEditors.length; ++i) {
            ClassicEditor.create(allEditors[i]);
        }

        $(document).ready(function (){
           var char = 'a';

            $('.more_ques').on('click', function (){
                char = String.fromCharCode(char.charCodeAt() + 1);

                $('.apen_ques').append(
                    '<div class="col-md-6 pb-3">'+
                        '<label for="opt_'+ char +'">Option '+ char.toUpperCase() +'.</label>'+
                        '<input type="text" class="form-control" id="opt_'+ char +'" name="opt_'+ char +'" style="border-radius: 50px" />'+
                    '</div>'
                );
            });
        });

        $('#category').on('change', function (){
            var category = $(this).val();
               if(category){
                   $.ajax({
                       url: '/admin/fetch/mcqs_categories',
                       type: 'post',
                       data: {category:category, type: 'category'},

                       success: function(response){
                           console.log(response);
                            if(response[0] == 'subject'){
                                $('.subjects').html(response[1]);
                            }
                       }
                   });
               }
        });

        $(document).on('change', '.subjectt', function () {
            var subject = $(this).val();

            if(subject){
                $.ajax({
                    url: '/admin/fetch/mcqs_categories',
                    type: 'post',
                    data: {subject:subject, type: 'subject'},

                    success: function(response){
                        if(response[0] == 'sub_subject'){
                            $('.sub_subjectt').html(response[1]);
                        }
                    }
                });
            }
        });


        $('#editor').on('keyup', function (){
            var myEditor = document.querySelector('#editor');
            var html = myEditor.children[0].innerHTML;
            $('#editor_text').val(html);
        });


    </script>
@endsection
