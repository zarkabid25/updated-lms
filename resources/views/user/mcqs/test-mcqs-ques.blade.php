@extends('student.layouts.test-mcqs-layout')

@section('title', 'Quiz Categories')

@section('css')
    <style>
        .ques-disp {
            display: flex;
        }

        .ques-hide {
            display: none;
        }

        nav ol li a{
            color: #122B83;
            font-weight: bold;
        }

        .skip_ques_btn{
            font-size: 18px;
            letter-spacing: 1px;
            /*text-decoration: none;*/
            color: #65151E;
            background: white;
            cursor: pointer;
            transition: ease-out 0.5s;
            /*border: 2px solid #F0A32F;*/
            border-radius: 10px;
            box-shadow: inset 0 0 0 0 black;
            font-weight: bold;
        }

        .skip_ques_btn:hover {
            color: #65151E;
            font-weight: bold;
            box-shadow: inset 0 -100px 0 0 #F0A32F;
        }

        .skip_ques_btn:active {
            transform: scale(0.9);
        }

        .end_quiz_btn{
            font-size: 18px;
            letter-spacing: 1px;
            /*text-decoration: none;*/
            color: #122B83;
            background: white;
            cursor: pointer;
            transition: ease-out 0.5s;
            /*border: 2px solid #122B83;*/
            border-radius: 10px;
            box-shadow: inset 0 0 0 0 black;
            font-weight: bold;
        }

        .end_quiz_btn:hover {
            color: #fff;
            /*font-weight: bold;*/
            box-shadow: inset 0 -100px 0 0 #65151E;
            /*border: 2px solid #65151E;*/
        }

        .end_quiz_btn:active {
            transform: scale(0.9);
        }

        .check{
            background-color: lightblue !important;
        }
    </style>
@endsection

@section('content')
<div class="container mb-5" style="padding-top: 50px">

    @if(count($questions) > 0)
        <div class="row">
            <div class="col-md-6">
                <!-- Button trigger modal -->
                <button type="button" style="" class="btn skip_ques_btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Skip Question
                </button>
                @if ($paper_type === 'premium')
                    <button class="btn btn-danger" id="pause">
                        <span><i class="fa fa-pause"></i></span>
                        <span>Pause</span>
                    </button>
                @endif
            </div>

            <div class="col-md-6" style="text-align: end">
                @if ($paper_type === 'premium')
                    <button class="btn py-0" style="font-weight: bold; font-size: 1.5rem; " id="demo"></button>
                @endif

                <a href="{{ url('/payment_methods') }}" class="btn end_quiz_btn" onclick="completeQuize()">
                    <i class="fa fa-stop"></i>
                    End Quiz</a>
            </div>
        </div>
    @else
    @endif

    @php $count = 1; @endphp

    @forelse($questions as $question)
        <div id="ques{{ $loop->iteration }}"
             class="row p-5 @if ($loop->iteration == 1) ques-disp @else ques-hide @endif justify-content-center">
            <div class="col-md-10">
                <div class="card border-0">
                    <div class="card-header" style="border-radius: 18px; background-color: #65151E; color: white">
                        <h4>Question. {{ $count++ }}</h4>
                    </div>

                    <div class="card-body" id="parent">
                        <nav aria-label="breadcrumb" class="mb-4">
                            <ol class="breadcrumb bg-white">
                                <li class="pr-2">
                                    <i class="fa fa-tag"></i>
                                </li>

                                <li class="breadcrumb-item"><a href="#"
                                                               style="text-decoration: none;">{{ ucwords($questions[0]->subject->subject_name) }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#"
                                                               style="text-decoration: none;">{{ ucwords($questions[0]->subSubject->sub_subject_name) }}</a>
                                </li>
                                {{--                                <li class="breadcrumb-item " aria-current="page">Test</li> --}}
                            </ol>
                        </nav>

                        <span class="pl-4" style="font-size: 1.7rem; color: #122B83"><b>{!! ucfirst($question->ques) !!}</b></span>
                        @php
                            $answer_keys = array_keys($answers->data);
                            $option_val = 0;
                            if (in_array($question->id, $answer_keys)) {
                                $option_val = (int) $answers->data[$question->id];
                            }
                        @endphp
                        <div class="row pl-4">
                            @forelse($question->options as $op)
                                <div class="col-md-6 pb-2">
                                    @php
                                        $opt_name = substr($op->opt_key, '4');
                                    @endphp

                                    <input type="hidden" class="que_id" value="{{ $op->mcq_question_id }}">
                                    <label id="label{{ $op->id }}" class="btn mt-3 border" style="width: 100%; text-align: left;@if ($option_val == $op->id && $option_val !== $question->correct_option->mcq_option_id) background:#c70d0d6e @endif @if ($option_val !== 0 && $op->id === $question->correct_option->mcq_option_id) background:#19875459 @endif">
                                        <input type="radio" name="option{{ $op->mcq_question_id }}" data-full="{{$question->options}}" data-id="{{$op->id}}" style="visibility: hidden"
                                               data-ques="{{ $op->mcq_question_id }}" value="{{ $op->opt_value }}"
                                               @if ($option_val == $op->id) checked @endif class="option">
                                    <span>{{ ucwords($opt_name).') ' }} </span>
                                    <span style="font-size: 1.2rem; color: #122B83"
                                          class="correc_opt">{{ ucwords($op->opt_value) }}</span>
                                    </label>
                                </div>
                            @empty
                            @endforelse
                        </div>

                        @php $feedback = 0; @endphp
                        @if ($paper_type === 'free')
                            @forelse($question->options as $op)
                                @if ($option_val === $op->id)
                                    @php $feedback = 1; @endphp
                                    @if ($option_val === $question->correct_option->mcq_option_id)
                                        <p class="explanation ff mt-2 alert alert-info"><strong>Explanation:</strong>
                                            {{ $question->correct_option->incorrect_explanation }}</p>
                                            @break
                                            @else
                                        <p class="explanation gg mt-2 alert alert-info"><strong>Explanation:</strong>
                                            {{ $question->correct_option->incorrect_explanation }}</p>
                                            @break
                                    @endif
                                @endif
                            @empty
                            @endforelse
                        @endif
                        @if ($feedback === 0 && $paper_type === 'free')

                            <p class="explanation mt-2 tt alert alert-info" style="display: none"></p>
                        @endif

                        {{-- <p class="incorrect_opt mt-2 alert alert-danger" style="display: none"></p>
                        <p class="correct_opt mt-2 alert alert-success" style="display: none"></p>
                        <p class="explanation mt-2 alert alert-info" style="display: none"></p> --}}
                    </div>
                </div>
            </div>
        </div>
    @empty
{{--        <div style="text-align: center; font-size: 24px; margin-top: 50px;">--}}
{{--            <i class="fa-solid fa-folder-open"></i>--}}
{{--            <p>No record found...</p>--}}
{{--        </div>--}}
    @endforelse
    @if (count($questions) > 0)
        <div class="text-center">
            <input type="hidden" id="current" name="current" value="1">
            <input type="hidden" id="total" name="total" value="{{ count($questions) }}">
            <button class="btn" style="background-color: #122B83; color: white;" id="prev" disabled>
                <i class="fa fa-arrow-left"></i>
                Previous</button>
            <button class="btn" style="background-color: #fff; font-weight: bold; color: #000" id="current-ques">1</button>
            <button class="btn" style="background-color: #122B83; color: white" id="next"
                    @if (count($questions) == 1) disabled @endif>Next
                <i class="fa fa-arrow-right"></i>
            </button>
{{--            @if ($paper_type === 'free')--}}
{{--                <a href="{{ route('student.dashboard') }}" class="btn btn-danger">Pause</a>--}}
{{--            @endif--}}
            <div class="progress container col-md-10 my-5" style="background-color: #e9ecef00;height:30px;">
                <div class="progress-bar" style="background-color: rgb(18, 43, 131);justify-content: center;" id="progress-bar" role="progressbar"  aria-valuenow="1" aria-valuemin="1"
                aria-valuemax="{{ count($questions) }}">1 / {{ count($questions) }}</div>
            </div>
        </div>

        {{--        <div class="text-center"> --}}
        {{--            <input type="hidden" id="current" name="current" value="1"> --}}
        {{--            <input type="hidden" id="total" name="total" value="{{ count($questions) }}"> --}}
        {{--            <button class="btn btn-primary" id="prev" disabled>previous</button> --}}
        {{--            <button class="btn btn-success" id="current-ques">1</button> --}}
        {{--            <button class="btn btn-info" id="next" @if (count($questions) == 1) disabled @endif>next</button> --}}

        {{--            <!-- Button trigger modal --> --}}
        {{--            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> --}}
        {{--                Go To Question --}}
        {{--            </button> --}}
        {{--            <button class="btn btn-warning" id="demo"></button> --}}
        {{--            <button class="btn btn-danger" id="pause">Pause</button> --}}

        {{--            <br> --}}
        {{--            <br> --}}
        {{--            <br> --}}
        {{--            <div class="progress container m-5"> --}}
        {{--                <div class="progress-bar" id="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" --}}
        {{--                     aria-valuemax="{{ count($questions) }}">1 / {{ count($questions) }}</div> --}}
        {{--            </div> --}}
        {{--        </div> --}}
    @endif
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" style="z-index: 999999" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Skip Questions</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="number" required id="goto-ques" value="1" min="1"
                           max="{{ count($questions) }}" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="gotoques()">Go</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('JS')
    <script>
        function progressBar() {
            var curr = $('input[type="radio"]:checked')
            curr = curr.length;
            var tot = Number($('#total').val())

            var per = (curr / tot) * 100;
            $('#progress-bar').css('width', per + '%')
            $('#progress-bar').html(curr + '/' + tot)
        }

        progressBar()

        $('input[type="radio"]').on('change',function(){
            progressBar()
        })

        $('#next').on('click', function() {
            var current = Number($('#current').val())
            var total = $('#total').val()

            $('#ques' + current).removeClass('ques-disp')
            $('#ques' + current).addClass('ques-hide')
            $('#ques' + Number(Number(current) + 1)).removeClass('ques-hide')
            $('#ques' + Number(Number(current) + 1)).addClass('ques-disp')
            $('#current').val(Number(Number(current) + 1))
            $('#current-ques').html(Number(Number(current) + 1))
            var current = Number($('#current').val())

            if (total == 1) {
                $('#prev').attr('disabled', true)
                $('#next').attr('disabled', true)
            }
            if (current == 1) {
                $('#prev').attr('disabled', true)
            } else {
                $('#prev').attr('disabled', false)
            }
            if (current == total) {
                $('#next').attr('disabled', true)
            } else {
                $('#next').attr('disabled', false)
            }
        })

        $('#prev').on('click', function() {
            var current = Number($('#current').val())
            var total = $('#total').val()

            $('#ques' + current).removeClass('ques-disp')
            $('#ques' + current).addClass('ques-hide')
            $('#ques' + Number(Number(current) - 1)).removeClass('ques-hide')
            $('#ques' + Number(Number(current) - 1)).addClass('ques-disp')
            $('#current').val(Number(Number(current) - 1))
            $('#current-ques').html(Number(Number(current) - 1))

            var current = Number($('#current').val())

            if (total == 1) {
                $('#prev').attr('disabled', true)
                $('#next').attr('disabled', true)
            }
            if (current == 1) {
                $('#prev').attr('disabled', true)
            } else {
                $('#prev').attr('disabled', false)
            }
            if (current == total) {
                $('#next').attr('disabled', true)
            } else {
                $('#next').attr('disabled', false)
            }
        })

        $(document).on('click', '.option', function() {

            var ques_id = $(this).closest('#parent').find('.que_id').val();
            var opt_val = $(this).val();
            var opt_id = $(this).attr('data-id');
            var opt = JSON.parse($(this).attr('data-full'));
            var incorrect = $(this).closest('#parent').find('.incorrect_opt');
            var expla = $(this).closest('#parent').find('.explanation');
            var correc = $(this).closest('#parent').find('.correct_opt');
            var plabel = $(this).closest('#parent').find('#label'+opt_id);

            $.ajax({
                type: "GET",
                url: "{{ route('student.test-correct-opt') }}",
                contentType: "application/json",
                dataType: "json",
                data: {
                    ques_id: ques_id,
                    opt_val: opt_val,
                    opt_id: opt_id,
                    'sub_subbj_id': '{{ $sub_subbj_id }}',
                    'paper_type': '{{ $paper_type }}'
                },
                success: function(response) {
                    console.log(response.correct_opt);
                    if (opt_val !== response.correct_opt) {
                        incorrect.html('<strong>Correct Answer is:</strong> ' + response.correct_opt);
                        expla.html('<strong>Explanation:</strong> ' + response.incorrect_explanation);
                        // correc.hide();
                        // incorrect.show();
                        expla.show();
                        opt.map(function(v) {
                            $('#label'+v.id).css({"background": "none"})
                        })
                        plabel.css({"background": "#c70d0d6e"});

                        $('#label'+response.mcq_option_id).css({"background": "#19875459"})
                    } else {
                        // correc.html('<strong>Perfect!</strong> correct answer.');
                        // incorrect.hide();
                        expla.hide();
                        // correc.show();
                        opt.map(function(v) {
                            $('#label'+v.id).css({"background": "none"})
                        })
                        plabel.css({"background": "#19875459"});
                    }
                    if(response.redirect == true){
                        window.location.href = '/payment_methods'
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });

        $(document).on('click', '#pause', function() {

            var opt_val = $(this).val();
            var ques_id = $(this).attr('data-ques');

            $.ajax({
                type: "GET",
                url: "{{ route('student.student-pause-timer') }}",
                contentType: "application/json",
                dataType: "json",
                data: {
                    'sub_subbj_id': '{{ $sub_subbj_id }}',
                    'paper_type': '{{ $paper_type }}'
                },
                success: function(response) {
                    console.log(response.correct_opt);
                    if (response) {
                        window.location.href = '{{ route('student.dashboard') }}'
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });

        function gotoques() {
            var res = Number($('#goto-ques').val())
            if (res > 0) {
                var current = Number($('#current').val())
                var total = Number($('#total').val())
                if (res > total) {
                    alert('Please enter number between 1 and ' + total)
                    return;
                } else if (current == total) {
                    alert('You have reached at last question.')
                    return;
                } else if ((res + current) > total) {
                    alert('Please enter number between ' + current + ' and ' + total)
                    return;
                }
                $('#ques' + current).removeClass('ques-disp')
                $('#ques' + current).addClass('ques-hide')
                $('#ques' + (res + current)).removeClass('ques-hide')
                $('#ques' + (res + current)).addClass('ques-disp')
                $('#current').val((res + current))
                $('#current-ques').html((res + current))

                var current = (res + current)
                if (total == 1) {
                    $('#prev').attr('disabled', true)
                    $('#next').attr('disabled', true)
                }
                if (current == 1) {
                    $('#prev').attr('disabled', true)
                } else {
                    $('#prev').attr('disabled', false)
                }
                if (current == total) {
                    $('#next').attr('disabled', true)
                } else {
                    $('#next').attr('disabled', false)
                }
                $('#exampleModal').modal('hide')
            }
        }

        function completeQuize() {
            // alert('here');
            $.ajax({
                type: "GET",
                url: "{{ route('student.student-complete-quiz') }}",
                contentType: "application/json",
                dataType: "json",
                data: {
                    'sub_subbj_id': '{{ $sub_subbj_id }}',
                    'paper_type': '{{ $paper_type }}'
                },
                success: function(response) {
                    console.log(response.correct_opt);
                    if (response) {
                        window.location.href = '{{ route('student.dashboard') }}'
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }

        function timer() {

            var countDownDate = new Date("{{ $answers->time }}").getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the element with id="demo"
                document.getElementById("demo").innerHTML = hours + " : " +
                    minutes + " : " + seconds;

                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    completeQuize()
                    document.getElementById("demo").innerHTML = "EXPIRED";
                }
            }, 1000);
        }
    </script>

    @if ($paper_type === 'premium')
        <script>
            timer();
        </script>
    @endif
@endsection

