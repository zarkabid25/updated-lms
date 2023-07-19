@extends('admin.layout')

@section('title', 'Edit MCQs')

@section('content')
    @php
        $categories = (new \App\Models\MCQsCategory())->all();
    @endphp

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('admin.post-mcqs') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h2>Edit MCQ Question</h2>
                        </div>

                        <form action="#" method="post">
                            @csrf
                            <div class="card-body">
                                {{--                                <div class="row mb-3"> --}}
                                {{--                                    <div class="col-md-12 d-flex justify-content-end"> --}}
                                {{--                                        <button type="button" class="btn btn-info more_ques">Add MCQ Option <i class="feather icon-plus"></i></button> --}}
                                {{--                                    </div> --}}
                                {{--                                </div> --}}

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label>Categories</label>
                                        <select class="form-control" name="category" id="category">
                                            <option selected disabled>Select Category</option>
                                            @forelse($categories as $category)
                                                <option value="{{ $category->id }}">{{ ucfirst($category->category_name) }}
                                                </option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>

                                    <div class="col-md-4 subjects"></div>

                                    <div class="col-md-4 sub_subjectt"></div>
                                </div>

                                <div id="mcqs_fields">

                                </div>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('JS')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            var char = 'a';

            $('.more_ques').on('click', function() {
                char = String.fromCharCode(char.charCodeAt() + 1);

                $('.apen_ques').append(
                    '<div class="col-md-6 pb-3">' +
                    '<label for="opt_' + char + '">Option ' + char.toUpperCase() + '.</label>' +
                    '<input type="text" class="form-control" id="opt_' + char + '" name="opt_' + char +
                    '" style="border-radius: 50px" />' +
                    '</div>'
                );
            });
        });

        $('#category').on('change', function() {
            var category = $(this).val();
            if (category) {
                $.ajax({
                    url: '/admin/fetch/mcqs_categories',
                    type: 'post',
                    data: {
                        category: category,
                        type: 'category'
                    },

                    success: function(response) {
                        console.log(response);
                        if (response[0] == 'subject') {
                            $('.subjects').html(response[1]);
                        }
                    }
                });
            }
        });

        $(document).on('change', '.subjectt', function() {
            var subject = $(this).val();

            if (subject) {
                $.ajax({
                    url: '/admin/fetch/mcqs_categories',
                    type: 'post',
                    data: {
                        subject: subject,
                        type: 'subject'
                    },

                    success: function(response) {
                        if (response[0] == 'sub_subject') {
                            $('.sub_subjectt').html(response[1]);
                        }
                    }
                });
            }
        });

        $(document).on('change', '#sub_subject', function() {
            var subSubject = $(this).val();

            if (subSubject) {
                $.ajax({
                    url: '/admin/edit_quiz_ques',
                    type: 'get',
                    data: {
                        subSubject: subSubject
                    },

                    success: function(response) {
                        $('#mcqs_fields').html('');
                        var str = '';
                        response.forEach(element => {
                            str = `<form action="" id="ques-${element.id}">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <label for="ques">Question Here:</label>
                    <input type="hidden" name="ques_id" value="${element.id}">
                    <input type="text" class="form-control" id="ques" name="ques" value="${element.ques}" style="border-radius: 50px" />
                </div>
            </div><div class="row mt-3">`;
                            element.options.forEach(function(val) {
                                let text = val.opt_key;
                                let opt = String(text.substring(4));
                                let upper = opt.toUpperCase();

                                str += `<div class="col-md-6 pb-3">
                    <label for="opt_${opt}">Option ${upper}.</label>
                    <input type="text" class="form-control" id="opt_${opt}" value="${val.opt_value}" name="opt_${opt}" style="border-radius: 50px" />
                </div>`
                            })


                            str += `</div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3>Correct Option (Optional)</h3>
                </div>

                <div class="col-md-6">
                    <label>Enter correct option</label>
                    <select class="form-control" name="correct_opt">
                        <option selected="" disabled="">Select Correct Option</option>`
                        element.options.forEach(function(val) {
                                let text = val.opt_key;
                                let opt = String(text.substring(4));
                                let upper = opt.toUpperCase();
                        str += `<option ${(element.correct_option[0].correct_opt == val.opt_value) ? 'selected' : ''}  class="form-control" style="border-radius: 50px;" value="${val.id}">Option ${upper}</option>`
                        })
                        str +=`</select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>Correct Option Explanation (Optional)</label>
                    <textarea style="border-radius: 10px" cols="20" rows="6" name="correc_opt_explanation" placeholder="Enter explanation for correct option" class="form-control">${element.correct_option[0].incorrect_explanation}</textarea>
                    {{--                                <input type="text" name="correct_opt" class="form-control" style="border-radius: 50px;"> --}}
                </div>
            </div>

            <div class="custom-control custom-switch mt-3">
                            <input type="checkbox" class="custom-control-input" name="status" value="1" id="customSwitch${element.id}" ${ (element.status) ? 'checked' : ''}>
                            <label class="custom-control-label" for="customSwitch${element.id}">Status</label>
                          </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <button type="button" onclick="updateMcq(${element.id})" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>`
                            $('#mcqs_fields').append(str);
                        });
                    }
                });
            }
        });

        function updateMcq(v) {
            var data = $('#ques-' + v).serialize();
            $.ajax({
                url: '/admin/update_quiz_ques',
                type: 'get',
                data: data,

                success: function(response) {
                    if (response.success == true) {
                        Swal.fire(
                            'Congratulations!',
                            response.message,
                            'success'
                        )
                    } else {

                        Swal.fire(
                            'Oops!',
                            response.message,
                            'error'
                        )
                    }
                }
            })
        }
    </script>
@endsection
