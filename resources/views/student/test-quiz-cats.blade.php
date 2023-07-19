@extends('student.layouts.test-mcqs-layout')

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

        .card-body :hover{
            color: white !important;
        }

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

        /*.dropdown-item:focus, .dropdown-item:hover{*/
        /*    background-color: unset;*/
        /*}*/
    </style>
@endsection

@section('content')
    <div class="container pb-5">

        <div class="row mt-3">
            <div class="col-md-12 d-flex justify-content-center">
                <img src="{{ asset('images/mcqs-cats.png') }}" WIDTH="100" alt="" />
            </div>
        </div>

        <div class="row mt-2 mb-5">
            <div class="col-md-12 d-flex justify-content-center">
                <h2 style="font-family: cursive; color: #122B83"><b>MCQs Categories</b></h2>
            </div>
        </div>

        @php
//            $categories = (new \App\Models\MCQsCategory())->all();
//            $cats_data = (new \App\Models\MCQSubSubjectName())->getAllData();
//            dd($cats_data);
            $cates = (new \App\Models\MCQsCategory())->with('entryTest', 'uni')->whereHas('questions')->orderBy('id', 'DESC')->get();

        @endphp

        <table id="example" class="table table-striped border" style="width:100%">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th>Entry Test Type</th>
                <th>Universities</th>
                <th>Categories</th>
            </tr>
            </thead>
            <tbody>
            @php $count = 1; @endphp

            @forelse($cates as $rec)
                <tr>
                    <td scope="row">{{ $count++ }}</td>
                    <td>{{ $rec->entryTest->name }}</td>
                    <td>{{ $rec->uni->name }}</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-outline-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('test-get-mcqs', ['id' => encrypt($rec->id)]) }}">{{ ucwords($rec->category_name) }}</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
            @endforelse
            </tbody>
        </table>





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

@section('JS')
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endsection
