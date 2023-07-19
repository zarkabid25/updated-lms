@extends('student.dashboard-layout')

@section('title', 'MCQS')

@section('content')
    <div class="container-fluid pl_0" style="margin-bottom: 15%;">
        <div class="row" style="padding-bottom: 4%">
            <div class="col-lg-8 pl_0" style="padding-top: 30px;">
                <h3 style="color: #122B83">MCQS</h3>
            </div>
            {{--            @php --}}
            {{--                $records = 1; --}}
            {{--            @endphp --}}

            <div class="col-lg-4" style="padding-top: 50px;">
                <button type="submit" class="search-btn">
                    <img src="{{ asset('images/search-icon.png') }}" alt="no image" width="20">
                </button>

                <input type="text" class="search-input" placeholder="search here.." name="search">
            </div>
        </div>


        <div class="row dashboard-searchbar-bottom-line">
            <div class="col-lg-12" style="border: 1px solid #122B83"></div>
        </div>
        <div class="alert alert-danger border-danger" style="font-size: 20px; margin-top: 15px;">
            
            <strong>Error!</strong>&nbsp;Please purchase the Mcqs to view Mcqs
            <a href="{{route('user-payment-methods')}}" style="float: right;bottom: 7px;" class="btn btn-info">
                Purchase Mcqs
            </a>
        </div>
        
    </div>

@endsection

@section('JS')
    <script>
        $(document).ready(function() {
            $(document).on('keyup', '.search-input', function() {
                var data = $(".search-input").val();
                $(this).append(
                    '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>'
                    );
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
