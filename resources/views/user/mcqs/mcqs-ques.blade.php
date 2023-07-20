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

        nav ol li a {
            color: #122B83;
            font-weight: bold;
        }

        .skip_ques_btn {
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

        .end_quiz_btn {
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

        .check {
            background-color: lightblue !important;
        }

    </style>


@endsection

@section('content')
{{--    @php--}}
{{--        $data = \Illuminate\Support\Facades\Session::get('mcqs');--}}
{{--        $data = unserialize($data);--}}
{{--        $questions = $data['questions'];--}}
{{--        $paper_type = $data['paper_type'];--}}
{{--        $answers = $data['answers'];--}}
{{--        $sub_subbj_id = $data['sub_subbj_id'];--}}
{{--    @endphp--}}

    <div class="container mb-5" style="padding-top: 50px">

        @if (count($questions) > 0)
            <div class="row">
                <div class="col-md-6">
{{--                    <button class="btn end_quiz_btn" style="" onclick="prog_quiz()">--}}
                    <button class="btn px-3" style="color: white; border-radius: 10px; background-color: #004643; font-family: Roboto" onclick="prog_quiz()">
                        {{--                        <i class="fa fa-stop"></i>--}}
                        Exit</button>
                    <!-- Button trigger modal -->
{{--                    <button type="button" style="" class="btn skip_ques_btn" data-bs-toggle="modal"--}}
{{--                        data-bs-target="#exampleModal">--}}
{{--                        Skip Question--}}
{{--                    </button>--}}
{{--                    @if ($paper_type === 'premium')--}}
{{--                        <button class="btn btn-danger" id="pause">--}}
{{--                            <span><i class="fa fa-pause"></i></span>--}}
{{--                            <span>Pause</span>--}}
{{--                        </button>--}}
{{--                    @endif--}}
                </div>

                <div class="col-md-6" style="text-align: end">
                    @if ($paper_type === 'premium')
                        <button class="btn py-0 timerrr" id="demo"></button>
                    @endif

                </div>
            </div>
        @else
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-12 text-center">--}}
{{--                        <h3><i class="fa fa-folder-open"></i> No Record found</h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        @endif

        @php $count = 1; @endphp

        @forelse($questions as $question)
{{--            <div id="ques{{ $loop->iteration }}" class="row p-5 @if ($loop->iteration == 1) ques-disp @else ques-hide @endif justify-content-center">--}}
            <div id="ques" class="row p-5 justify-content-center">
                <div class="col-md-10">
                    <div class="card shadow" style="border-radius: 18px; border: 1px solid #004643;">
                        <div class="card-header" style="border-top-left-radius: 18px; border-top-right-radius: 18px; color: #3E4148; background-color: unset; border-bottom: 1px solid #004643;">
                            <h6 style="font-family: Roboto">Question. {{ (request()->has('page')) ? request()->page : '1' }}</h6>
                        </div>

                        <div class="card-body" id="parent">

                        <span class="pl-4" style="font-family: Roboto;font-size: 1rem; color: #1E1E1E">{!! ucfirst($question->ques) !!}</span>

                        @php
                            $answer_keys = array_keys($answers->data);
                            $option_val = 0;
                            if (in_array($question->id, $answer_keys)) {
                                $option_val = (int) $answers->data[$question->id];
                            }
                        @endphp

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

                    @if(ucwords(json_decode($questions[0]->subject->category)->category_name) == 'English')
                        @forelse($question->options as $op)
                            <div class="row pl-4">
                                <div class="col-md-6 pb-2">
                                    @php
                                        $opt_name = substr($op->opt_key, '4');
                                    @endphp

                                    <input type="hidden" class="que_id" value="{{ $op->mcq_question_id }}">
                                    <label id="label{{ $op->id }}" class="btn mt-3 border shadow"
                                           style="width: 100%; text-align: left; border: 1px solid #004643 !important; border-radius: 13px; @if ($option_val == $op->id && $option_val !== $question->correct_option->mcq_option_id) background:#c70d0d6e @endif @if ($option_val !== 0 && $op->id === $question->correct_option->mcq_option_id) background:#19875459 @endif">
                                        <input type="radio" name="option{{ $op->mcq_question_id }}"
                                               data-full="{{ $question->options }}" data-id="{{ $op->id }}"
                                               style="visibility: hidden; display: inline-grid;" data-ques="{{ $op->mcq_question_id }}"
                                               value="{{ $op->opt_value }}"
                                               @if ($option_val == $op->id) checked @endif class="option">
                                        @if($opt_name == 'a' || $opt_name == 'A')
                                            {{--                                        <span>{{ ucwords($opt_name) . ') ' }} </span>--}}
                                            <span>
                                            <svg width="30" height="30" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="27" cy="27" r="26.5" stroke="#F9BC60"/>
                                            <path d="M27.3711 17.5615L20.3105 37H17.4248L25.5547 15.6719H27.415L27.3711 17.5615ZM33.2891 37L26.2139 17.5615L26.1699 15.6719H28.0303L36.1895 37H33.2891ZM32.9229 29.1045V31.4189H20.9404V29.1045H32.9229Z" fill="#F9BC60"/>
                                            </svg>
                                        </span>
                                        @elseif($opt_name == 'b' || $opt_name == 'b')
                                            <span>
                                            <svg width="30" height="30" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="27" cy="27" r="26.5" stroke="#F9BC60"/>
                                            <path d="M27.0781 27.0244H21.6729L21.6436 24.7539H26.5508C27.3613 24.7539 28.0693 24.6172 28.6748 24.3438C29.2803 24.0703 29.749 23.6797 30.0811 23.1719C30.4229 22.6543 30.5938 22.0391 30.5938 21.3262C30.5938 20.5449 30.4424 19.9102 30.1396 19.4219C29.8467 18.9238 29.3926 18.5625 28.7773 18.3379C28.1719 18.1035 27.4004 17.9863 26.4629 17.9863H22.3027V37H19.4756V15.6719H26.4629C27.5566 15.6719 28.5332 15.7842 29.3926 16.0088C30.252 16.2236 30.9795 16.5654 31.5752 17.0342C32.1807 17.4932 32.6396 18.0791 32.9521 18.792C33.2646 19.5049 33.4209 20.3594 33.4209 21.3555C33.4209 22.2344 33.1963 23.0303 32.7471 23.7432C32.2979 24.4463 31.6729 25.0225 30.8721 25.4717C30.0811 25.9209 29.1533 26.209 28.0889 26.3359L27.0781 27.0244ZM26.9463 37H20.5596L22.1562 34.7002H26.9463C27.8447 34.7002 28.6064 34.5439 29.2314 34.2314C29.8662 33.9189 30.3496 33.4795 30.6816 32.9131C31.0137 32.3369 31.1797 31.6582 31.1797 30.877C31.1797 30.0859 31.0381 29.4023 30.7549 28.8262C30.4717 28.25 30.0273 27.8057 29.4219 27.4932C28.8164 27.1807 28.0352 27.0244 27.0781 27.0244H23.0498L23.0791 24.7539H28.5869L29.1875 25.5742C30.2129 25.6621 31.082 25.9551 31.7949 26.4531C32.5078 26.9414 33.0498 27.5664 33.4209 28.3281C33.8018 29.0898 33.9922 29.9297 33.9922 30.8477C33.9922 32.1758 33.6992 33.2988 33.1133 34.2168C32.5371 35.125 31.7217 35.8184 30.667 36.2969C29.6123 36.7656 28.3721 37 26.9463 37Z" fill="#F9BC60"/>
                                            </svg>
                                        </span>
                                        @elseif($opt_name == 'c' || $opt_name == 'C')
                                            <span>
                                            <svg width="30" height="30" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="27" cy="27" r="26.5" stroke="#F9BC60"/>
                                            <path d="M32.3516 30.2178H35.1641C35.0176 31.5654 34.6318 32.7715 34.0068 33.8359C33.3818 34.9004 32.498 35.7451 31.3555 36.3701C30.2129 36.9854 28.7871 37.293 27.0781 37.293C25.8281 37.293 24.6904 37.0586 23.665 36.5898C22.6494 36.1211 21.7754 35.457 21.043 34.5977C20.3105 33.7285 19.7441 32.6885 19.3438 31.4775C18.9531 30.2568 18.7578 28.8994 18.7578 27.4053V25.2812C18.7578 23.7871 18.9531 22.4346 19.3438 21.2236C19.7441 20.0029 20.3154 18.958 21.0576 18.0889C21.8096 17.2197 22.7129 16.5508 23.7676 16.082C24.8223 15.6133 26.0088 15.3789 27.3271 15.3789C28.9385 15.3789 30.3008 15.6816 31.4141 16.2871C32.5273 16.8926 33.3916 17.7324 34.0068 18.8066C34.6318 19.8711 35.0176 21.1064 35.1641 22.5127H32.3516C32.2148 21.5166 31.9609 20.6621 31.5898 19.9492C31.2188 19.2266 30.6914 18.6699 30.0078 18.2793C29.3242 17.8887 28.4307 17.6934 27.3271 17.6934C26.3799 17.6934 25.5449 17.874 24.8223 18.2354C24.1094 18.5967 23.5088 19.1094 23.0205 19.7734C22.542 20.4375 22.1807 21.2334 21.9365 22.1611C21.6924 23.0889 21.5703 24.1191 21.5703 25.252V27.4053C21.5703 28.4502 21.6777 29.4316 21.8926 30.3496C22.1172 31.2676 22.4541 32.0732 22.9033 32.7666C23.3525 33.46 23.9238 34.0068 24.6172 34.4072C25.3105 34.7979 26.1309 34.9932 27.0781 34.9932C28.2793 34.9932 29.2363 34.8027 29.9492 34.4219C30.6621 34.041 31.1992 33.4941 31.5605 32.7812C31.9316 32.0684 32.1953 31.2139 32.3516 30.2178Z" fill="#F9BC60"/>
                                            </svg>
                                        </span>
                                        @elseif($opt_name == 'd' || $opt_name == 'D')
                                            <span>
                                            <svg width="30" height="30" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="27" cy="27" r="26.5" stroke="#F9BC60"/>
                                            <path d="M25.2471 37H20.7939L20.8232 34.7002H25.2471C26.7705 34.7002 28.04 34.3828 29.0557 33.748C30.0713 33.1035 30.833 32.2051 31.3408 31.0527C31.8584 29.8906 32.1172 28.5332 32.1172 26.9805V25.6768C32.1172 24.4561 31.9707 23.3721 31.6777 22.4248C31.3848 21.4678 30.9551 20.6621 30.3887 20.0078C29.8223 19.3438 29.1289 18.8408 28.3086 18.499C27.498 18.1572 26.5654 17.9863 25.5107 17.9863H20.7061V15.6719H25.5107C26.9072 15.6719 28.1816 15.9062 29.334 16.375C30.4863 16.834 31.4775 17.5029 32.3076 18.3818C33.1475 19.251 33.792 20.3057 34.2412 21.5459C34.6904 22.7764 34.915 24.1631 34.915 25.7061V26.9805C34.915 28.5234 34.6904 29.915 34.2412 31.1553C33.792 32.3857 33.1426 33.4355 32.293 34.3047C31.4531 35.1738 30.4375 35.8428 29.2461 36.3115C28.0645 36.7705 26.7314 37 25.2471 37ZM22.3027 15.6719V37H19.4756V15.6719H22.3027Z" fill="#F9BC60"/>
                                            </svg>
                                        </span>
                                        @endif
                                        <span style="font-size: 1rem; color: #000000; padding-left: 8px;"
                                              class="correc_opt">{{ ucwords($op->opt_value) }}</span>
                                    </label>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    @else
                        <div class="row pl-4">
                            @forelse($question->options as $op)
                                <div class="col-md-6 pb-2">
                                    @php
                                        $opt_name = substr($op->opt_key, '4');
                                    @endphp

                                    <input type="hidden" class="que_id" value="{{ $op->mcq_question_id }}">
                                    <label id="label{{ $op->id }}" class="btn mt-3 border shadow"
                                           style="width: 100%; text-align: left; border: 1px solid #004643 !important; border-radius: 13px; @if ($option_val == $op->id && $option_val !== $question->correct_option->mcq_option_id) background:#c70d0d6e @endif @if ($option_val !== 0 && $op->id === $question->correct_option->mcq_option_id) background:#19875459 @endif">
                                        <input type="radio" name="option{{ $op->mcq_question_id }}"
                                               data-full="{{ $question->options }}" data-id="{{ $op->id }}"
                                               style="visibility: hidden; display: inline-grid;" data-ques="{{ $op->mcq_question_id }}"
                                               value="{{ $op->opt_value }}"
                                               @if ($option_val == $op->id) checked @endif class="option">
                                        @if($opt_name == 'a' || $opt_name == 'A')
                                            {{--                                        <span>{{ ucwords($opt_name) . ') ' }} </span>--}}
                                            <span>
                                            <svg width="30" height="30" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="27" cy="27" r="26.5" stroke="#F9BC60"/>
                                            <path d="M27.3711 17.5615L20.3105 37H17.4248L25.5547 15.6719H27.415L27.3711 17.5615ZM33.2891 37L26.2139 17.5615L26.1699 15.6719H28.0303L36.1895 37H33.2891ZM32.9229 29.1045V31.4189H20.9404V29.1045H32.9229Z" fill="#F9BC60"/>
                                            </svg>
                                        </span>
                                        @elseif($opt_name == 'b' || $opt_name == 'b')
                                            <span>
                                            <svg width="30" height="30" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="27" cy="27" r="26.5" stroke="#F9BC60"/>
                                            <path d="M27.0781 27.0244H21.6729L21.6436 24.7539H26.5508C27.3613 24.7539 28.0693 24.6172 28.6748 24.3438C29.2803 24.0703 29.749 23.6797 30.0811 23.1719C30.4229 22.6543 30.5938 22.0391 30.5938 21.3262C30.5938 20.5449 30.4424 19.9102 30.1396 19.4219C29.8467 18.9238 29.3926 18.5625 28.7773 18.3379C28.1719 18.1035 27.4004 17.9863 26.4629 17.9863H22.3027V37H19.4756V15.6719H26.4629C27.5566 15.6719 28.5332 15.7842 29.3926 16.0088C30.252 16.2236 30.9795 16.5654 31.5752 17.0342C32.1807 17.4932 32.6396 18.0791 32.9521 18.792C33.2646 19.5049 33.4209 20.3594 33.4209 21.3555C33.4209 22.2344 33.1963 23.0303 32.7471 23.7432C32.2979 24.4463 31.6729 25.0225 30.8721 25.4717C30.0811 25.9209 29.1533 26.209 28.0889 26.3359L27.0781 27.0244ZM26.9463 37H20.5596L22.1562 34.7002H26.9463C27.8447 34.7002 28.6064 34.5439 29.2314 34.2314C29.8662 33.9189 30.3496 33.4795 30.6816 32.9131C31.0137 32.3369 31.1797 31.6582 31.1797 30.877C31.1797 30.0859 31.0381 29.4023 30.7549 28.8262C30.4717 28.25 30.0273 27.8057 29.4219 27.4932C28.8164 27.1807 28.0352 27.0244 27.0781 27.0244H23.0498L23.0791 24.7539H28.5869L29.1875 25.5742C30.2129 25.6621 31.082 25.9551 31.7949 26.4531C32.5078 26.9414 33.0498 27.5664 33.4209 28.3281C33.8018 29.0898 33.9922 29.9297 33.9922 30.8477C33.9922 32.1758 33.6992 33.2988 33.1133 34.2168C32.5371 35.125 31.7217 35.8184 30.667 36.2969C29.6123 36.7656 28.3721 37 26.9463 37Z" fill="#F9BC60"/>
                                            </svg>
                                        </span>
                                        @elseif($opt_name == 'c' || $opt_name == 'C')
                                            <span>
                                            <svg width="30" height="30" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="27" cy="27" r="26.5" stroke="#F9BC60"/>
                                            <path d="M32.3516 30.2178H35.1641C35.0176 31.5654 34.6318 32.7715 34.0068 33.8359C33.3818 34.9004 32.498 35.7451 31.3555 36.3701C30.2129 36.9854 28.7871 37.293 27.0781 37.293C25.8281 37.293 24.6904 37.0586 23.665 36.5898C22.6494 36.1211 21.7754 35.457 21.043 34.5977C20.3105 33.7285 19.7441 32.6885 19.3438 31.4775C18.9531 30.2568 18.7578 28.8994 18.7578 27.4053V25.2812C18.7578 23.7871 18.9531 22.4346 19.3438 21.2236C19.7441 20.0029 20.3154 18.958 21.0576 18.0889C21.8096 17.2197 22.7129 16.5508 23.7676 16.082C24.8223 15.6133 26.0088 15.3789 27.3271 15.3789C28.9385 15.3789 30.3008 15.6816 31.4141 16.2871C32.5273 16.8926 33.3916 17.7324 34.0068 18.8066C34.6318 19.8711 35.0176 21.1064 35.1641 22.5127H32.3516C32.2148 21.5166 31.9609 20.6621 31.5898 19.9492C31.2188 19.2266 30.6914 18.6699 30.0078 18.2793C29.3242 17.8887 28.4307 17.6934 27.3271 17.6934C26.3799 17.6934 25.5449 17.874 24.8223 18.2354C24.1094 18.5967 23.5088 19.1094 23.0205 19.7734C22.542 20.4375 22.1807 21.2334 21.9365 22.1611C21.6924 23.0889 21.5703 24.1191 21.5703 25.252V27.4053C21.5703 28.4502 21.6777 29.4316 21.8926 30.3496C22.1172 31.2676 22.4541 32.0732 22.9033 32.7666C23.3525 33.46 23.9238 34.0068 24.6172 34.4072C25.3105 34.7979 26.1309 34.9932 27.0781 34.9932C28.2793 34.9932 29.2363 34.8027 29.9492 34.4219C30.6621 34.041 31.1992 33.4941 31.5605 32.7812C31.9316 32.0684 32.1953 31.2139 32.3516 30.2178Z" fill="#F9BC60"/>
                                            </svg>
                                        </span>
                                        @elseif($opt_name == 'd' || $opt_name == 'D')
                                            <span>
                                            <svg width="30" height="30" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="27" cy="27" r="26.5" stroke="#F9BC60"/>
                                            <path d="M25.2471 37H20.7939L20.8232 34.7002H25.2471C26.7705 34.7002 28.04 34.3828 29.0557 33.748C30.0713 33.1035 30.833 32.2051 31.3408 31.0527C31.8584 29.8906 32.1172 28.5332 32.1172 26.9805V25.6768C32.1172 24.4561 31.9707 23.3721 31.6777 22.4248C31.3848 21.4678 30.9551 20.6621 30.3887 20.0078C29.8223 19.3438 29.1289 18.8408 28.3086 18.499C27.498 18.1572 26.5654 17.9863 25.5107 17.9863H20.7061V15.6719H25.5107C26.9072 15.6719 28.1816 15.9062 29.334 16.375C30.4863 16.834 31.4775 17.5029 32.3076 18.3818C33.1475 19.251 33.792 20.3057 34.2412 21.5459C34.6904 22.7764 34.915 24.1631 34.915 25.7061V26.9805C34.915 28.5234 34.6904 29.915 34.2412 31.1553C33.792 32.3857 33.1426 33.4355 32.293 34.3047C31.4531 35.1738 30.4375 35.8428 29.2461 36.3115C28.0645 36.7705 26.7314 37 25.2471 37ZM22.3027 15.6719V37H19.4756V15.6719H22.3027Z" fill="#F9BC60"/>
                                            </svg>
                                        </span>
                                        @endif
                                        <span style="font-size: 1rem; color: #000000; padding-left: 8px;"
                                              class="correc_opt">{{ ucwords($op->opt_value) }}</span>
                                    </label>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    @endif
                </div>
            </div>
@empty
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3><i class="fa fa-folder-open"></i> No Record found</h3>
                <a href="{{ route('student.dashboard') }}" class="btn btn-primary btn-lg">Go to Home</a>
            </div>
        </div>
    </div>


@endforelse
            <div class="row">
                <div class="col-md-7 d-flex justify-content-end">
                    {{ $questions->appends(request()->input())->links() }}
                </div>

                @php
                    $total_ques = $questions->total();
                    if(request()->has('page')){
                        $page = request()->page;
                    } else{
                        $page = '1';
                    }
                @endphp

                @if($page == $total_ques)
                    <div class="col-md-5" style="text-align: center; padding-top: 12px;">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#testComplete" class="btn px-4 py-2"   onclick="prog_quiz()" style="background-color: #E16162; color: #FFFFFF; font-family: Roboto; border-radius: 15px">Submit</button>
                    </div>
                @endif
            </div>

@if (count($questions) > 0)

{{--    <div class="text-center">--}}
{{--        <input type="hidden" id="current" name="current" value="1">--}}
{{--        <input type="hidden" id="total" name="total" value="{{ count($questions) }}">--}}
{{--        <button class="btn" style="background-color: #122B83; color: white;" id="prev" disabled>--}}
{{--            <i class="fa fa-arrow-left"></i>--}}
{{--            Previous</button>--}}
{{--        <button class="btn" style="background-color: #fff; font-weight: bold; color: #000"--}}
{{--            id="current-ques">1</button>--}}
{{--        <button class="btn" style="background-color: #122B83; color: white" id="next"--}}
{{--            @if (count($questions) == 1) disabled @endif>Next--}}
{{--            <i class="fa fa-arrow-right"></i>--}}
{{--        </button>--}}
{{--        --}}{{--            @if ($paper_type === 'free') --}}
{{--        --}}{{--                <a href="{{ route('student.dashboard') }}" class="btn btn-danger">Pause</a> --}}
{{--        --}}{{--            @endif --}}
{{--        <div class="progress container col-md-10 my-5" style="background-color: #e9ecef00;height:30px;">--}}
{{--            <div class="progress-bar" style="background-color: rgb(18, 43, 131);justify-content: center;"--}}
{{--                id="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1"--}}
{{--                aria-valuemax="{{ count($questions) }}">1 / {{ count($questions) }}</div>--}}
{{--        </div>--}}
{{--    </div>--}}

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

<!-- Modal -->
{{--<div class="modal fade" id="exampleModal2" style="z-index: 999999" tabindex="-1" role="dialog"--}}
{{--aria-labelledby="exampleModal2Label" aria-hidden="true">--}}
{{--<div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--    <div class="modal-content">--}}
{{--        <div class="modal-header">--}}
{{--            <h5 class="modal-title" id="exampleModal2Label">Quiz Progress</h5>--}}
{{--            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--        <div class="modal-body">--}}
{{--            <label @if ($paper_type == 'free') style="display:none" @endif for=""--}}
{{--                class="mt-3">Time Taken</label>--}}
{{--            <div @if ($paper_type == 'free') style="display:none" @endif><b id="time-p"></b></div>--}}
{{--            <label for="" class="mt-3">Correct </label>--}}
{{--            <div class="progress">--}}
{{--                <div id="correct-p" class="progress-bar progress-bar-striped bg-success" role="progressbar"--}}
{{--                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--            </div>--}}
{{--            <label for="" class="mt-3">Incorrect</label>--}}
{{--            <div class="progress">--}}
{{--                <div id="incorrect-p" class="progress-bar progress-bar-striped bg-danger" role="progressbar"--}}
{{--                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="modal-footer">--}}
{{--            <button type="button" class="btn btn-primary" onclick="completeQuize()">Complete</button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--</div>--}}


    <!-- Test Complete Mdal -->
<div class="modal fade" id="testComplete" tabindex="-1" aria-labelledby="testCompleteLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 650px;">
        <div class="modal-content" style="border: 2px solid #004643; border-radius: 1.2rem;">
            <div class="modal-header" style="border-bottom: none">
                <h4 class="modal-title" style="font-family: Roboto" id="testCompleteLabel">{{ (isset($questions)) ? ucwords($questions[0]->subject->category->entryTest->name) : '' }}</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p style="font-family: Roboto; font-size: 16px;"><span style="font-weight: bold">{{ (isset($questions)) ? ucwords(json_decode($questions[0]->subject->category)->category_name) : '' }}:</span> {{ (isset($questions)) ? ucwords($questions[0]->subSubject->sub_subject_name) : '' }}</p>
                    </div>
                </div>

                <div class="row c-border">
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-body m-card">
                                <svg width="18" height="18" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.8113 3.96103C10.8113 3.63288 10.9417 3.31798 11.1737 3.08596C11.4057 2.85394 11.7204 2.72356 12.0488 2.72356H26.762C27.2039 2.72356 27.6124 2.95945 27.8337 3.34229C28.0547 3.72514 28.0547 4.19693 27.8337 4.57977C27.6124 4.96261 27.2039 5.1985 26.762 5.1985H12.0488C11.7204 5.1985 11.4057 5.06812 11.1737 4.8361C10.9417 4.60408 10.8113 4.28918 10.8113 3.96103ZM7.56899 0.359914C7.33725 0.129546 7.02346 0 6.69668 0C6.36964 0 6.05613 0.129546 5.82409 0.359914L3.96788 2.21612L2.12412 0.359914C1.8037 0.0892186 1.36785 -0.000558133 0.96648 0.120983C0.564853 0.2428 0.252423 0.559896 0.136455 0.962888C0.0204432 1.36617 0.116566 1.80069 0.391684 2.1172L2.24789 3.96097L0.391684 5.80473C0.141701 6.03869 0 6.36573 0 6.70822C0 7.05046 0.141701 7.37751 0.391684 7.61144C0.625093 7.84318 0.941362 7.97219 1.27036 7.97025C1.59077 7.96583 1.89683 7.83711 2.12415 7.61144L3.96791 5.75523L5.82412 7.61144C6.05476 7.84015 6.36579 7.96887 6.69035 7.97025C7.01933 7.97218 7.3356 7.84318 7.56903 7.61144C7.80326 7.37913 7.93502 7.06286 7.93502 6.73276C7.93502 6.40295 7.80326 6.08668 7.56903 5.85408L5.72526 3.96089L7.56903 2.11713C7.80326 1.88483 7.93502 1.56856 7.93502 1.23846C7.93502 0.908354 7.80326 0.592099 7.56903 0.35978L7.56899 0.359914ZM26.7625 12.6236H12.0494C11.6071 12.6236 11.1986 12.8595 10.9776 13.2424C10.7567 13.6252 10.7567 14.097 10.9776 14.4798C11.1986 14.8627 11.6071 15.0986 12.0494 15.0986H26.7625C27.2045 15.0986 27.613 14.8627 27.8343 14.4798C28.0552 14.097 28.0552 13.6252 27.8343 13.2424C27.613 12.8595 27.2045 12.6236 26.7625 12.6236ZM26.7625 22.5234H12.0494C11.6071 22.5234 11.1986 22.7593 10.9776 23.1421C10.7567 23.525 10.7567 23.9968 10.9776 24.3796C11.1986 24.7624 11.6071 24.9983 12.0494 24.9983H26.7625C27.2045 24.9983 27.613 24.7624 27.8343 24.3796C28.0552 23.9968 28.0552 23.525 27.8343 23.1421C27.613 22.7593 27.2045 22.5234 26.7625 22.5234ZM6.57902 19.9866H1.36919C1.04104 19.9866 0.726425 20.117 0.494119 20.349C0.262097 20.581 0.131717 20.8959 0.131717 21.2241V26.4214C0.131717 26.7496 0.262097 27.0645 0.494119 27.2965C0.726425 27.5285 1.04104 27.6589 1.36919 27.6589H6.57902C6.90717 27.6589 7.22206 27.5285 7.45409 27.2965C7.68611 27.0645 7.81649 26.7496 7.81649 26.4214V21.2241C7.81649 20.8959 7.68611 20.581 7.45409 20.349C7.22206 20.117 6.90717 19.9866 6.57902 19.9866ZM6.57902 10.0868H1.36919C1.04104 10.0868 0.726425 10.2172 0.494119 10.4492C0.262097 10.6812 0.131717 10.9961 0.131717 11.3243V16.5217C0.131717 16.8498 0.262097 17.1647 0.494119 17.3967C0.726425 17.6287 1.04104 17.7591 1.36919 17.7591H6.57902C6.90717 17.7591 7.22206 17.6287 7.45409 17.3967C7.68611 17.1647 7.81649 16.8498 7.81649 16.5217V11.3243C7.81649 10.9961 7.68611 10.6812 7.45409 10.4492C7.22206 10.2172 6.90717 10.0868 6.57902 10.0868Z" fill="#001E1D"/>
                                </svg>

                                <span>Solved questions</span>
                                <p id="correct-p" style="width: auto !important;"></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-body m-card">
                                <svg width="18" height="18" viewBox="0 0 28 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.998 14.1921C13.7088 14.1921 13.472 14.4288 13.472 14.718V19.1314C12.8092 19.3524 12.3305 19.9782 12.3305 20.7147C12.3305 21.6352 13.0775 22.3822 13.998 22.3822C14.7345 22.3822 15.3603 21.9035 15.5866 21.2407H19.9999H20.0104C20.2996 21.2407 20.5364 21.0039 20.5364 20.7147C20.5364 20.678 20.5311 20.6411 20.5259 20.6044C20.4682 17.0588 17.5593 14.1919 13.9977 14.1919L13.998 14.1921Z" fill="#001E1D"/>
                                    <path d="M11.089 4.25551H12.0463V5.79136C12.1674 5.77039 12.2883 5.75465 12.4092 5.74416C12.9089 5.68622 13.4453 5.66 13.9978 5.66C14.5502 5.66 15.0919 5.68622 15.6021 5.74416C15.7177 5.75465 15.8388 5.77039 15.9545 5.79136L15.9547 4.25551H16.9067C17.2014 4.25551 17.4327 4.01876 17.4327 3.72956L17.4329 0.525949C17.4329 0.231507 17.2014 0 16.9067 0H11.0891C10.7997 0 10.5632 0.231507 10.5632 0.525949V3.7293C10.5629 4.01874 10.7997 4.2555 11.0891 4.2555L11.089 4.25551Z" fill="#001E1D"/>
                                    <path d="M21.1149 8.64272L21.3622 8.19544L22.2565 8.69516C22.3354 8.74261 22.4248 8.76359 22.509 8.76359C22.6982 8.76359 22.8771 8.6637 22.972 8.49537L23.9662 6.71747C24.1083 6.46498 24.0189 6.14407 23.7612 6.002L21.0627 4.48711C20.8103 4.34501 20.4893 4.43991 20.3473 4.69214L19.353 6.46481C19.2846 6.59093 19.2689 6.73302 19.3056 6.86463C19.3423 7.00149 19.4317 7.11712 19.5528 7.18555L20.4471 7.68003L20.1894 8.14304C18.7482 7.43831 17.1648 6.96476 15.4868 6.79118C14.5348 6.68605 13.4617 6.68605 12.5147 6.79118C10.8263 6.96475 9.23766 7.44349 7.79092 8.15353L7.52795 7.68003L8.41699 7.18555C8.66948 7.04344 8.76413 6.72253 8.62203 6.46483L7.62257 4.69217C7.55938 4.5713 7.44375 4.48164 7.3069 4.43968C7.17529 4.40297 7.02819 4.41871 6.90707 4.48688L4.20866 6.00177C4.08779 6.0702 3.99813 6.18058 3.96142 6.31744C3.91946 6.44905 3.94044 6.59615 4.00887 6.71727L5.00309 8.49518C5.09774 8.6635 5.27655 8.76339 5.4606 8.76339C5.55001 8.76339 5.63417 8.74241 5.71833 8.69497L6.60738 8.19524L6.8651 8.65276C2.72494 11.0992 0 15.6023 0 20.715C0 28.4374 6.28063 34.7175 13.9974 34.7175C21.7192 34.7175 28 28.4369 28 20.715C28 15.5968 25.2646 11.0835 21.1144 8.64317L21.1149 8.64272ZM22.2615 28.2317L21.1871 27.1573C20.9816 26.9518 20.6487 26.9518 20.4434 27.1573C20.2379 27.3629 20.2379 27.6958 20.4434 27.9011L21.518 28.9757C19.6515 30.6765 17.2138 31.7503 14.5257 31.8767V30.3522C14.5257 30.0618 14.2904 29.8263 13.9998 29.8263C13.7091 29.8263 13.4738 30.0618 13.4738 30.3522V31.8767C10.7866 31.751 8.34869 30.6766 6.48211 28.9752L7.55599 27.9013C7.76152 27.6958 7.76152 27.3629 7.55599 27.1576C7.35046 26.9521 7.01756 26.9521 6.81226 27.1576L5.73864 28.2312C4.03969 26.3644 2.96702 23.927 2.84172 21.2395H4.36114C4.65184 21.2395 4.88709 21.004 4.88709 20.7136C4.88709 20.4231 4.65184 20.1876 4.36114 20.1876H2.84197C2.96809 17.5012 4.04071 15.0637 5.73889 13.1966L6.81226 14.2699C6.91491 14.3726 7.04951 14.424 7.18412 14.424C7.31873 14.424 7.45333 14.3726 7.55598 14.2699C7.76151 14.0644 7.76151 13.7315 7.55598 13.5262L6.48184 12.4521C8.34862 10.7494 10.7863 9.67375 13.4735 9.54812V11.0748C13.4735 11.3652 13.7088 11.6007 13.9995 11.6007C14.2902 11.6007 14.5254 11.3652 14.5254 11.0748V9.54812C17.2136 9.67449 19.6513 10.7496 21.5178 12.4516L20.4429 13.5264C20.2374 13.7319 20.2374 14.0648 20.4429 14.2701C20.5456 14.3728 20.6802 14.4242 20.8148 14.4242C20.9494 14.4242 21.084 14.3728 21.1866 14.2701L22.261 13.1957C23.9602 15.0633 25.0331 17.501 25.1592 20.1881H23.6376C23.3469 20.1881 23.1116 20.4236 23.1116 20.714C23.1116 21.0045 23.3469 21.24 23.6376 21.24H25.1595C25.0339 23.9274 23.961 26.3648 22.2613 28.2317L22.2615 28.2317Z" fill="#001E1D"/>
                                </svg>

                                <span>Completion time</span>
                                <p id="time-p"></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-body m-card">
                                <svg width="18" height="18" viewBox="0 0 29 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M27.4405 20.7943H1.55955C1.18049 20.7943 0.788654 21.0819 0.788654 21.5652C0.788654 21.7824 0.85468 21.981 0.999205 22.1255C1.14373 22.27 1.34232 22.3361 1.55955 22.3361H27.4405C27.8195 22.3361 28.2113 22.0484 28.2113 21.5652C28.2113 21.0818 27.819 20.7943 27.4405 20.7943Z" fill="#001E1D" stroke="#001E1D" stroke-width="0.422691"/>
                                    <path d="M7.92448 9.34308L2.12761 15.1392C2.12761 15.1392 2.12761 15.1392 2.1276 15.1392C1.83519 15.4316 1.35171 15.4316 1.0593 15.1392C0.766881 14.8468 0.766881 14.3633 1.0593 14.0709L7.49472 7.63549L7.49472 7.63548L7.64416 7.78492C7.78395 7.64513 8.06392 7.64513 8.20371 7.78492L7.92448 9.34308ZM7.92448 9.34308L13.8608 15.2794C13.9807 15.3993 14.1456 15.4461 14.2987 15.4461C14.4539 15.4461 14.6171 15.399 14.757 15.3058L14.775 15.2939L14.7901 15.2785L26.6696 3.2632V7.71508C26.6696 8.11187 26.9742 8.41589 27.3704 8.41589C27.7668 8.41589 28.0706 8.11194 28.0713 7.71636C28.0713 7.71593 28.0713 7.71551 28.0713 7.71508L28.141 1.51885C28.196 1.2974 28.1017 1.10601 27.9632 0.982646C27.8236 0.858171 27.6283 0.788654 27.4404 0.788654H21.2149C20.8181 0.788654 20.5141 1.09326 20.5141 1.48947C20.5141 1.88626 20.8187 2.19028 21.2149 2.19028H25.6709L14.2894 13.5718L7.92448 9.34308Z" fill="#001E1D" stroke="#001E1D" stroke-width="0.422691"/>
                                </svg>

                                <span>New score</span>
                                <p>0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer justify-content-center border-0">
                <a href="#" class="btn" style="background-color: #6F0E19; color: white; font-family: Roboto; border-radius: 8px">PDF</a>
                <a href="#" class="btn" style="background-color: #6F0E19; color: white; font-family: Roboto; border-radius: 8px">
                    <svg width="22" height="22" viewBox="0 0 45 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M45 9.87187C45 4.41562 40.5843 0 35.1281 0H9.87186C4.41561 0 0 4.41562 0 9.87187V21.6281C0 27.0844 4.41561 31.5 9.87186 31.5H35.1281C40.5843 31.5 45 27.0844 45 21.6281V9.87187ZM30.15 16.6219L18.8437 22.2187C18.3937 22.4719 16.9031 22.1344 16.9031 21.6281V10.125C16.9031 9.61874 18.4219 9.28125 18.8719 9.53437L29.7 15.4406C30.15 15.7219 30.6281 16.3687 30.15 16.6219Z" fill="white"/>
                    </svg>
                    <span style="padding-left: 5px;">YouTube</span>
                </a>

                <a href="#" class="btn" style="background-color: #004643; color: white; font-family: Roboto; border-radius: 8px">Review</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('JS')
    <script>
    var x;
    function progressBar() {
        var curr = $('input[type="radio"]:checked')
        curr = curr.length;
        var tot = Number($('#total').val())

        var per = (curr / tot) * 100;
        $('#progress-bar').css('width', per + '%')
        $('#progress-bar').html(curr + '/' + tot)
        if (curr == tot) {
            prog_quiz()
        }
    }

    function prog_quiz() {
        $.ajax({
            type: "GET",
            url: "{{ route('student.student-correct-stat') }}",
            contentType: "application/json",
            dataType: "json",
            data: {
                'sub_subbj_id': '{{ $sub_subbj_id }}',
                'paper_type': '{{ $paper_type }}'
            },
            success: function(response) {
                if (response.success == true) {
                    clearInterval(x);
                    var total_solved = response.correct + response.incorrect;
                    var corr = response.correct * 100 / response.total;
                    var incorr = response.incorrect * 100 / response.total;
                    $('#time-p').html(toHoursAndMinutes(response.time))
                    // $('#correct-p').css('width', corr + '%')
                    $('#correct-p').html(`${total_solved} / ${response.total}`)
                    // $('#incorrect-p').css('width', incorr + '%')
                    $('#incorrect-p').html(`${response.incorrect} / ${response.total}`)
                    $('#exampleModal2').modal('show')
                }
            }
        })
    }

    function toHoursAndMinutes(totalSeconds) {
        const totalMinutes = Math.floor(totalSeconds / 60);

        const seconds = totalSeconds % 60;
        const hours = Math.floor(totalMinutes / 60);
        const minutes = totalMinutes % 60;

        return hours+':'+minutes;
    }

    progressBar()

    $('input[type="radio"]').on('change', function() {
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
        var plabel = $(this).closest('#parent').find('#label' + opt_id);


        $.ajax({
            type: "GET",
            url: "{{ route('student.student-correct-opt') }}",
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
                        $('#label' + v.id).css({
                            "background": "none"
                        })
                    })
                    plabel.css({
                        "background": "#c70d0d6e"
                    });

                    $('#label' + response.mcq_option_id).css({
                        "background": "#19875459"
                    })
                } else {
                    // correc.html('<strong>Perfect!</strong> correct answer.');
                    // incorrect.hide();
                    expla.hide();
                    // correc.show();
                    opt.map(function(v) {
                        $('#label' + v.id).css({
                            "background": "none"
                        })
                    })
                    plabel.css({
                        "background": "#19875459"
                    });
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
        x = setInterval(function() {

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
            document.getElementById("demo").innerHTML = '0'+ hours + " : " + String(minutes).padStart(2, '0');

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                completeQuize()
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    }
</script>

@if ($paper_type == 'premium')

<script>
    timer();
</script>
@endif
@endsection
