@extends('student.dashboard-layout')

@section('title', 'Dashboard')

@section('content')

    <div class="container-fluid pl_0" style="margin-bottom: 15%;">
{{--        <div class="row" style="padding-bottom: 4%">--}}
{{--            <div class="col-lg-8 pl_0" style="padding-top: 30px;">--}}
{{--                <h3 style="color: #122B83">DASHBOARD</h3>--}}
{{--            </div>--}}

{{--            <div class="col-lg-4" style="padding-top: 50px;">--}}
{{--                <button type="submit" class="search-btn">--}}
{{--                    <img src="{{ asset('images/search-icon.png') }}" alt="no image" width="20">--}}
{{--                </button>--}}

{{--                <input type="text" class="search-input" placeholder="search here.." name="search">--}}
{{--            </div>--}}
{{--        </div>--}}


{{--        <div class="row dashboard-searchbar-bottom-line">--}}
{{--            <div class="col-lg-12" style="border: 1px solid #122B83"></div>--}}
{{--        </div>--}}

{{--        <div class="row mb-4 d-flex justify-content-center">--}}
{{--            <div class="col-md-4">--}}
{{--                <h2 style="color: #122B83">Recent Activity</h2>--}}
{{--            </div>--}}
{{--        </div>--}}
            <div class="row">
            @foreach($mcqs as $m)
                @php
                    $imagePath = explode('.', !is_null($m->subSubject->sub_subject_image) ? $m->subSubject->sub_subject_image : 'user-avatar.png');
                    $imagePath = $imagePath[0].'.'.$imagePath[1];
                    $path = asset('images'). '/' . $imagePath;
                @endphp
                    <div class="col-md-4 pt-5">
                        <a href="#" onclick="document.getElementById('mcq-form1-{{$m->id}}').submit()" style="display: block">
                            <div class="card alt shadow-lg" style="border-radius: 10px; border: 2px solid #004643">
                                <div class="card-header" style="border-bottom: 0px; background-color: unset">
                                    <h3 class="" style="font-weight: bold; font-size: 20px; color: #122B83; font-family: Roboto">{{ ucwords($m->subSubject->sub_subject_name) }}</h3>
                                    <span style="float: right; margin-top: -27px !important;" class="percentage">
                                        <svg width="18" height="20" viewBox="0 0 13 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.03033 0.46967C6.73744 0.176777 6.26256 0.176777 5.96967 0.46967L1.1967 5.24264C0.903806 5.53553 0.903806 6.01041 1.1967 6.3033C1.48959 6.59619 1.96447 6.59619 2.25736 6.3033L6.5 2.06066L10.7426 6.3033C11.0355 6.59619 11.5104 6.59619 11.8033 6.3033C12.0962 6.01041 12.0962 5.53553 11.8033 5.24264L7.03033 0.46967ZM5.75 21C5.75 21.4142 6.08579 21.75 6.5 21.75C6.91421 21.75 7.25 21.4142 7.25 21H5.75ZM5.75 1V21H7.25V1H5.75Z" fill="#001E1D"/>
                                        </svg>
                                        <span style="font-weight: bold; color: #004643">{{count($m->data) / count($m->subSubject->questions) * 100}}%</span>
                                    </span>
                                </div>

                                <div class="card-body">
                                    {{--                        <div class="meta" style="text-align: right; padding-top: 6px">--}}
                                    {{--                        <a href="#" style="text-decoration: none">--}}
                                    {{--                            <img class="recent-act-img" src="{{$path}}" width="120" alt="Image" />--}}
                                    {{--                        </a>--}}
                                    {{--                        </div>--}}

                                    <div class="description">
                                        <span style="float: right; margin-top: 45px; font-weight: bold; color: #004643">{{count($m->data)}} / {{count($m->subSubject->questions)}}</span>
                                        {{--                            <p class="pt-1 mt-0 mb-3" style="font-weight: bold; color: #122B83">{{$m->paper_type}}</p>--}}
                                        {{--                                    <a href="#" onclick="document.getElementById('mcq-form1-{{$m->id}}').submit()" class="btn btn-warning">Resume {{count($m->data)}} / {{count($m->subSubject->questions)}}</a>--}}
                                        {{--                            <a href="#" onclick="document.getElementById('mcq-form2-{{$m->id}}').submit()" class="btn btn-primary">Start Over</a>--}}
                                        <form action="{{ route('student.get-mcqs-ques') }}" id="mcq-form1-{{$m->id}}" method="post">
                                            @csrf
                                            <input type="hidden" name="paper_type" class="papr_type" value="{{$m->paper_type}}">
                                            <input type="hidden" name="activity" value="resume">
                                            <input type="hidden" name="mcqs" value="{{$m->id}}">
                                            <input type="hidden" name="sub_subj_id" value="{{ $m->subSubject->id }}">
                                        </form>

                                        {{--                            <form action="{{ route('student.get-mcqs-ques') }}" id="mcq-form2-{{$m->id}}" method="post">--}}
                                        {{--                                @csrf--}}
                                        {{--                                <input type="hidden" name="paper_type" class="papr_type" value="{{$m->paper_type}}">--}}
                                        {{--                                <input type="hidden" name="activity" value="start">--}}
                                        {{--                                <input type="hidden" name="mcqs" value="{{$m->id}}">--}}
                                        {{--                                <input type="hidden" name="sub_subj_id" value="{{ $m->subSubject->id }}">--}}
                                        {{--                            </form>--}}
                                        @php
                                            $correct = 0;
                                            $incorrect = 0;
                                            $total = count($m->data);
                                            foreach ($m->data as $key => $value) {
                                              $c = \App\Models\McqCorrectOption::where('mcq_option_id',$value)->first();
                                              if($c)
                                              {
                                                  $correct += 1;
                                              }else{
                                                  $incorrect += 1;
                                              }
                                            }
                                        @endphp
                                        {{--                                    @if($total>0)--}}
                                        {{--                                        <label for="" class="mt-3">Remaining</label>--}}
                                        {{--                                        <div class="progress">--}}
                                        {{--                                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{count($m->data) * 100 / count($m->subSubject->questions)}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{count($m->data)}} / {{count($m->subSubject->questions)}}</div>--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <label for="" class="mt-3">Correct </label>--}}
                                        {{--                                        <div class="progress">--}}
                                        {{--                                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{$correct * 100 / $total}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$correct}} / {{$total}}</div>--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <label for="" class="mt-3">Incorrect</label>--}}
                                        {{--                                        <div class="progress">--}}
                                        {{--                                            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: {{$incorrect * 100 / $total}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$incorrect}} / {{$total}}</div>--}}
                                        {{--                                        </div>--}}
                                        {{--                                    @endif--}}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

{{--                <div class="col-md-4">--}}
{{--                    <div class="card ">--}}
{{--                        <div class="card-header" style="color: white; background-color: #65151E; font-weight: bold">--}}
{{--                            Quiz--}}
{{--                        </div>--}}

{{--                        <div class="card-body">--}}
{{--                            <h5 style="color: #122B83; font-weight: bold" class="card-title">{{$m->subSubject->sub_subject_name}}</h5>--}}
{{--                            <p style="color: #122B83; font-weight: bold" class="card-text">{{$m->paper_type}}</p>--}}
{{--                            <a href="#" onclick="document.getElementById('mcq-form1-{{$m->id}}').submit()" class="btn btn-warning">Resume {{count($m->data)}} / {{count($m->subSubject->questions)}}</a>--}}
{{--                            <a href="#" onclick="document.getElementById('mcq-form2-{{$m->id}}').submit()" class="btn btn-primary">Start Over</a>--}}
{{--                            <form action="{{ route('student.get-mcqs-ques') }}" id="mcq-form1-{{$m->id}}" method="post">--}}
{{--                                @csrf--}}
{{--                                <input type="hidden" name="paper_type" class="papr_type" value="{{$m->paper_type}}">--}}
{{--                                <input type="hidden" name="activity" value="resume">--}}
{{--                                <input type="hidden" name="mcqs" value="{{$m->id}}">--}}
{{--                                <input type="hidden" name="sub_subj_id" value="{{ $m->subSubject->id }}">--}}
{{--                            </form>--}}

{{--                            <form action="{{ route('student.get-mcqs-ques') }}" id="mcq-form2-{{$m->id}}" method="post">--}}
{{--                                @csrf--}}
{{--                                <input type="hidden" name="paper_type" class="papr_type" value="{{$m->paper_type}}">--}}
{{--                                <input type="hidden" name="activity" value="start">--}}
{{--                                <input type="hidden" name="mcqs" value="{{$m->id}}">--}}
{{--                                <input type="hidden" name="sub_subj_id" value="{{ $m->subSubject->id }}">--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            @endforeach
        </div>
    </div>

    <div class="pagini">
        {{ $classes->links() }}
    </div>

@endsection

@section('JS')
    <script>
        $(document).ready(function() {
            $(document).on('keyup', '.search-input', function() {
                var data=$(".search-input").val();
                $(this).append('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>');
                $.ajax({
                    url: '{{ url('/student/find_class') }}',
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
        var a = $(".search-input").val();
        console.log(a);
    </script>
@endsection



