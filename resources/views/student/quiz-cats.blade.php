@extends('student.dashboard-layout')

@section('title', 'Quiz Categories')

@section('css')
    <style>
        .crd-bg{
            border: #c8fdc8;
            border-radius: 30px;
            background-color: #F0A32F;
            color: white;
        }

        .crd-bg :hover{
            background-color: #65151E;
            color: white;
            border-radius: 30px;
        }

        .crd-bg .card-body .mcq-cat :hover{
            color: white !important;
            border-radius: 30px;
        }

        /*.card-body :hover{*/
        /*    color: white !important;*/
        /*}*/

        .crd-bg .card-body :hover{
            color: white !important;
            border-radius: 30px;
        }

        .crd-bg .card-body a{
            margin-top: 15px;
            font-family: cursive;
            font-size: 28px;
            font-weight: bold;
            color: #122B83;
            text-decoration: none;
            border-radius: 30px;
        }

        .crd-bg .card-body a:hover{
            color: white !important;
            background-color: #65151E !important;
            border-radius: 30px;
            font-size: 32px;

        }

        /*.accordion-item .accordion-header .btn-header-link :hover {*/
        /*    font-size: 35px;*/
        /*}*/

        .btn-header-link .panel-text {
            font-weight: bold;
            color: #65151E;
        }

        .btn-header-link .panel-text:after{
            /*content: "\f107";*/
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            float: right;
        }

        .panel-body a :hover{
            font-size: 25px;
        }


        .rad-btn{
            border: 1px solid black;
        }
        .btn-group .rad-btn {
            background-color: #fff;
        }

        .btn-group .rad-btn span{
            color: #000;
        }

        .btn-group .rad-btn .badgee {
            background-color: #007bff;
            color: white;
        }

        .btn-group .active {
            background-color: #65151E
        }

        .btn-group .active span{
            color: white;
        }

        .btn-group .active .badgee{
            background-color: #ffc107;
            color: #000;
        }

        /*.dropdown-item:focus, .dropdown-item:hover{*/
        /*    background-color: unset;*/
        /*}*/
    </style>
@endsection

@section('content')
    <div class="container pb-5">

{{--        <div class="row mt-3">--}}
{{--            <div class="col-md-12 d-flex justify-content-center">--}}
{{--                <img src="{{ asset('images/mcqs-cats.png') }}" WIDTH="100" alt="" />--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="row mt-2 mb-5">
            <div class="col-md-12 pt-3">
                <h2 style="font-family: Roboto !important; color: #1E1E1E !important;"><b>{{ ucwords($test_name) }}</b></h2>
            </div>
        </div>

        @php
//            $categories = (new \App\Models\MCQsCategory())->all();
//            $cats_data = (new \App\Models\MCQSubSubjectName())->getAllData();
//            dd($cats_data);


        @endphp

        @php $count = 1; @endphp
        @forelse($cates as $rec)

            @php
                $imagePath = explode('.', !is_null($rec->subject_image) ? $rec->subject_image : 'user-avatar.png');
            @endphp

            <div class="row" style="justify-content: center; margin-top: 50px">
                <div class="col-md-10">
                    <div class="accordion shadow" style="border-radius: 10px; border: 2px solid #004643;" id="accordionExample">
                        <div class="accordion-item" style="border-radius: 10px;">
                            <h2 class="accordion-header" id="heading{{$count}}">
                                <a href="#" class="btn btn-header-link" data-bs-toggle="collapse" data-bs-target="#collapse{{$count}}"
                                   aria-expanded="true" aria-controls="collapse{{$count}}"
                                   style="padding: 6px 10px; border-radius: 20px; width: 100%; text-align: left; font-size: 24px;">

{{--                                    <span>--}}
{{--                                        <img src="{{asset('images')."/". $imagePath[0].".".$imagePath[1]}}" width="180" alt="Image" />--}}
{{--                                    </span>--}}

                                    <span class="panel-text" style="color: #000000 !important;">
                                        {{ ucwords($rec->category->category_name) }}
{{--                                        {{  ($cat_name == 'Topical' || $cat_name == 'topical') ? '('.count($rec->subSubjects).' Topics)' : 'Papers'  }}--}}
                                        <svg width="32" height="32" style="float: right; margin-top: 3px;" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="22" cy="22" r="22" fill="#F9BC60"/>
                                        <path d="M14 18L23 27L31 18" stroke="white" stroke-width="4" stroke-linecap="round"/>
                                        </svg>

                                    </span>

                                </a>
                            </h2>
                            <hr class="hr-line">

                            <div id="collapse{{$count}}" class="accordion-collapse collapse show" aria-labelledby="heading{{$count}}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="card-body panel-body" style="text-align: center; font-size: 1.2rem; padding-top: 0px;">
                                        <h4>
                                            <strong>{{ ucwords($rec->subject_name) }}</strong>
                                        </h4>
                                        <hr class="hr-line">
                                        @forelse($rec->subSubjects as $sub_subject)

                                            @php
                                                $imagePath = explode('.', !is_null($sub_subject->sub_subject_image) ? $sub_subject->sub_subject_image : 'user-avatar.png');
                                            @endphp

                                            <div>
                                                <span style="color: #122B83; text-align: left !important; display: inherit">
                                                    <img src="{{asset('images')."/". $imagePath[0].".".$imagePath[1]}}" alt="Image" width="50"/>
                                                    <b>{{ ucwords($sub_subject->sub_subject_name) }}</b>
                                                </span>

                                                <a class="panel-text rounded mt-1" data-id="{{ $sub_subject->id }}" style="margin-top: -40px !important; float: right; background-color: #2c6c59; color: white; padding: 5px" href="#">
                                                    Practice
                                                </a>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @php $count++; @endphp
        @empty
        @endforelse


{{--        @forelse($categories as $category)--}}
{{--            @php--}}
{{--                $imagePath = explode('.', !is_null($category->category_image) ? $category->category_image : 'user-avatar.png');--}}
{{--            @endphp--}}

{{--            <div class="row my-4 d-flex justify-content-center">--}}
{{--                <div class="col-md-10 cat-col">--}}
{{--                    <div class="card crd-bg shadow-lg">--}}
{{--                        <div class="card-body text-center py-2">--}}
{{--                            <a class="mcq-cat" href="{{ route('student.get-mcqs', ['id' => encrypt($category->id)]) }}">--}}
{{--                                <span>--}}
{{--                                    <img src="{{asset('images')."/". $imagePath[0].".".$imagePath[1]}}" width="80" alt="Image" />--}}
{{--                                </span>--}}
{{--                                <span style="color:white">{{ ucwords($category->category_name) }}</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @empty--}}
{{--        @endforelse--}}
    </div>
@endsection

@include('user.mcqs.instruction-modal')

@section('JS')
    <script>
        // $(document).ready(function () {
        //     $('#example').DataTable();
        // });

        $(document).on('click', '.panel-text', function (){
           var id = $(this).data('id');

            $.ajax({
                url: "{{ route('student.instruction-page') }}",
                type: 'GET',
                data: {id:id},
                dataType:'json',
                success : function(response) {
                    if(response){
                        $('.appen-modal').html(response);
                        $('#exampleModal').modal('show');
                    }
                }
            })
        });

        $('#color-switch').on('change', 'input', function() {
            const container = $(this).closest('.btn-group');
            container.find('.active').removeClass('active');
            container.find('input:checked').parent().addClass('active');
        });


        function paperType(type){
            var paper_type = type;
            $('.papr_type').val(paper_type);
        }

        //
        // $(document).on('click', '.start_test', function (){
        //
        // })

    </script>
@endsection
