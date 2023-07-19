@extends('student.layouts.mcqs-layout')

@section('title', 'Payment Methods')

@section('css')
    <style>
        @import url(https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,700,900italic,900);
        @import url(https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900);
        @import url(https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900);

        body{background-color:#eee;}

        #generic_price_table{
            background-color: #f0eded;
        }

        /*PRICE COLOR CODE START*/
        #generic_price_table .generic_content{
            background-color: #fff;
        }

        #generic_price_table .generic_content .generic_head_price{
            background-color: #f6f6f6;
        }

        #generic_price_table .generic_content .generic_head_price .generic_head_content .head_bg{
            border-color: #e4e4e4 rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) #e4e4e4;
        }

        #generic_price_table .generic_content .generic_head_price .generic_head_content .head span{
            color: #525252;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .price .sign{
            color: #414141;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .price .currency{
            color: #414141;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .price .cent{
            color: #414141;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .month{
            color: #414141;
        }

        #generic_price_table .generic_content .generic_feature_list ul li{
            color: #a7a7a7;
        }

        #generic_price_table .generic_content .generic_feature_list ul li span{
            color: #414141;
        }
        #generic_price_table .generic_content .generic_feature_list ul li:hover{
            background-color: #E4E4E4;
            border-left: 5px solid #f0a32f ;
        }

        #generic_price_table .generic_content .generic_price_btn a{
            border: 1px solid #f0a32f ;
            color: #f0a32f;
        }

        #generic_price_table .generic_content.active .generic_head_price .generic_head_content .head_bg,
        #generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head_bg{
            border-color:#f0a32f  rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) #f0a32f ;
            color: #fff;
        }

        #generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head span,
        #generic_price_table .generic_content.active .generic_head_price .generic_head_content .head span{
            color: #fff;
        }

        #generic_price_table .generic_content:hover .generic_price_btn a,
        #generic_price_table .generic_content.active .generic_price_btn a{
            background-color: #122B83;
            color: #fff;
        }
        #generic_price_table{
            margin: 50px 0 50px 0;
            font-family: 'Raleway', sans-serif;
        }
        .row .table{
            padding: 28px 0;
        }

        /*PRICE BODY CODE START*/

        #generic_price_table .generic_content{
            overflow: hidden;
            position: relative;
            text-align: center;
        }

        #generic_price_table .generic_content .generic_head_price {
            margin: 0 0 20px 0;
        }

        #generic_price_table .generic_content .generic_head_price .generic_head_content{
            margin: 0 0 50px 0;
        }

        #generic_price_table .generic_content .generic_head_price .generic_head_content .head_bg{
            border-style: solid;
            border-width: 90px 1411px 23px 399px;
            position: absolute;
        }

        #generic_price_table .generic_content .generic_head_price .generic_head_content .head{
            padding-top: 40px;
            position: relative;
            z-index: 1;
        }

        #generic_price_table .generic_content .generic_head_price .generic_head_content .head span{
            font-family: "Raleway",sans-serif;
            font-size: 28px;
            font-weight: 400;
            letter-spacing: 2px;
            margin: 0;
            padding: 0;
            text-transform: uppercase;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag{
            padding: 0 0 20px;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .price{
            display: block;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .price .sign{
            display: inline-block;
            font-family: "Lato",sans-serif;
            font-size: 28px;
            font-weight: 400;
            vertical-align: middle;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .price .currency{
            font-family: "Lato",sans-serif;
            font-size: 60px;
            font-weight: 300;
            letter-spacing: -2px;
            line-height: 60px;
            padding: 0;
            vertical-align: middle;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .price .cent{
            display: inline-block;
            font-family: "Lato",sans-serif;
            font-size: 24px;
            font-weight: 400;
            vertical-align: bottom;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .month{
            font-family: "Lato",sans-serif;
            font-size: 18px;
            font-weight: 400;
            letter-spacing: 3px;
            vertical-align: bottom;
        }

        #generic_price_table .generic_content .generic_feature_list ul{
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #generic_price_table .generic_content .generic_feature_list ul li{
            font-family: "Lato",sans-serif;
            font-size: 18px;
            padding: 15px 0;
            transition: all 0.3s ease-in-out 0s;
        }
        #generic_price_table .generic_content .generic_feature_list ul li:hover{
            transition: all 0.3s ease-in-out 0s;
            -moz-transition: all 0.3s ease-in-out 0s;
            -ms-transition: all 0.3s ease-in-out 0s;
            -o-transition: all 0.3s ease-in-out 0s;
            -webkit-transition: all 0.3s ease-in-out 0s;

        }
        #generic_price_table .generic_content .generic_feature_list ul li .fa{
            padding: 0 10px;
        }
        #generic_price_table .generic_content .generic_price_btn{
            margin: 20px 0 32px;
        }

        #generic_price_table .generic_content .generic_price_btn a{
            border-radius: 50px;
            -moz-border-radius: 50px;
            -ms-border-radius: 50px;
            -o-border-radius: 50px;
            -webkit-border-radius: 50px;
            display: inline-block;
            font-family: "Lato",sans-serif;
            font-size: 18px;
            outline: medium none;
            padding: 12px 30px;
            text-decoration: none;
            text-transform: uppercase;
        }

        #generic_price_table .generic_content,
        #generic_price_table .generic_content:hover,
        #generic_price_table .generic_content .generic_head_price .generic_head_content .head_bg,
        #generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head_bg,
        #generic_price_table .generic_content .generic_head_price .generic_head_content .head h2,
        #generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head h2,
        #generic_price_table .generic_content .price,
        #generic_price_table .generic_content:hover .price,
        #generic_price_table .generic_content .generic_price_btn a,
        #generic_price_table .generic_content:hover .generic_price_btn a{
            transition: all 0.3s ease-in-out 0s;
            -moz-transition: all 0.3s ease-in-out 0s;
            -ms-transition: all 0.3s ease-in-out 0s;
            -o-transition: all 0.3s ease-in-out 0s;
            -webkit-transition: all 0.3s ease-in-out 0s;
        }
        @media (max-width: 320px) {
        }

        @media (max-width: 767px) {
            #generic_price_table .generic_content{
                margin-bottom:75px;
            }
        }
        @media (min-width: 768px) and (max-width: 991px) {
            #generic_price_table .col-md-3{
                float:left;
                width:50%;
            }

            #generic_price_table .col-md-4{
                float:left;
                width:50%;
            }

            #generic_price_table .generic_content{
                margin-bottom:75px;
            }
        }
        @media (min-width: 992px) and (max-width: 1199px) {
        }
        @media (min-width: 1200px) {
        }
        #generic_price_table_home{
            font-family: 'Raleway', sans-serif;
        }

        .text-center h1,
        .text-center h1 a{
            color: #7885CB;
            font-size: 30px;
            font-weight: 300;
            text-decoration: none;
        }
        .demo-pic{
            margin: 0 auto;
        }
        .demo-pic:hover{
            opacity: 0.7;
        }

        #generic_price_table_home ul{
            margin: 0 auto;
            padding: 0;
            list-style: none;
            display: table;
        }
        #generic_price_table_home li{
            float: left;
        }
        #generic_price_table_home li + li{
            margin-left: 10px;
            padding-bottom: 10px;
        }
        #generic_price_table_home li a{
            display: block;
            width: 50px;
            height: 50px;
            font-size: 0px;
        }
        #generic_price_table_home .blue{
            background: #3498DB;
            transition: all 0.3s ease-in-out 0s;
        }
        #generic_price_table_home .emerald{
            background: #f0a32f ;
            transition: all 0.3s ease-in-out 0s;
        }
        #generic_price_table_home .grey{
            background: #7F8C8D;
            transition: all 0.3s ease-in-out 0s;
        }
        #generic_price_table_home .midnight{
            background: #34495E;
            transition: all 0.3s ease-in-out 0s;
        }
        #generic_price_table_home .orange{
            background: #E67E22;
            transition: all 0.3s ease-in-out 0s;
        }
        #generic_price_table_home .purple{
            background: #9B59B6;
            transition: all 0.3s ease-in-out 0s;
        }
        #generic_price_table_home .red{
            background: #E74C3C;
            transition:all 0.3s ease-in-out 0s;
        }
        #generic_price_table_home .turquoise{
            background: #f0a32f ;
            transition: all 0.3s ease-in-out 0s;
        }

        #generic_price_table_home .blue:hover,
        #generic_price_table_home .emerald:hover,
        #generic_price_table_home .grey:hover,
        #generic_price_table_home .midnight:hover,
        #generic_price_table_home .orange:hover,
        #generic_price_table_home .purple:hover,
        #generic_price_table_home .red:hover,
        #generic_price_table_home .turquoise:hover{
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
            transition: all 0.3s ease-in-out 0s;
        }
        #generic_price_table_home .divider{
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
            padding: 20px;
        }
        #generic_price_table_home .divider span{
            width: 100%;
            display: table;
            height: 2px;
            background: #ddd;
            margin: 50px auto;
            line-height: 2px;
        }
        #generic_price_table_home .itemname{
            text-align: center;
            font-size: 50px ;
            padding: 50px 0 20px ;
            border-bottom: 1px solid #ddd;
            margin-bottom: 40px;
            text-decoration: none;
            font-weight: 300;
        }
        #generic_price_table_home .itemnametext{
            text-align: center;
            font-size: 20px;
            padding-top: 5px;
            text-transform: uppercase;
            display: inline-block;
        }
        #generic_price_table_home .bk{
            padding:40px 0;
        }

        .price-heading{
            text-align: center;
        }
        .price-heading h1{
            color: #666;
            margin: 0;
            padding: 0 0 50px 0;
        }
        .demo-button {
            background-color: #333333;
            color: #ffffff;
            display: table;
            font-size: 20px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
            margin-bottom: 50px;
            outline-color: -moz-use-text-color;
            outline-style: none;
            outline-width: medium ;
            padding: 10px;
            text-align: center;
            text-transform: uppercase;
        }
        .bottom_btn{
            background-color: #f0a32f ;
            color: #ffffff;
            display: table;
            font-size: 28px;
            margin: 60px auto 20px;
            padding: 10px 25px;
            text-align: center;
            text-transform: uppercase;
            text-decoration: none;
            border-radius: 25px;
        }
        .demo-button:hover{
            background-color:6 #fff;
            color: #000;
            text-decoration: none;

        }
        .bottom_btn:hover{
            background-color: #122B83;
            color: #FFF;
            text-decoration: none;
        }
    </style>
@endsection

@section('content')
    <div id="generic_price_table">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!--PRICE HEADING START-->
                        <div class="price-heading clearfix">
                            <h1>Quiz Pricing Table</h1>
                        </div>
                        <!--//PRICE HEADING END-->
                    </div>
                </div>
            </div>
            <div class="container">
                @php
                    $data = '';
                    if(auth()->user()){
                        $data = (new \App\Models\PaymentPlan())->where('user_id', auth()->user()->id)->where('payment_plan', '!=', null)->first();
                    }
                @endphp
                <!--BLOCK ROW START-->
                <div class="row">
                    <div class="col-md-4">
                        <!--PRICE CONTENT START-->
                        <div class="generic_content clearfix">
                            <!--HEAD PRICE DETAIL START-->
                            <div class="generic_head_price clearfix">
                                <!--HEAD CONTENT START-->
                                <div class="generic_head_content clearfix">
                                    <!--HEAD START-->
                                    <div class="head_bg"></div>
                                    <div class="head">
                                        <span>Basic</span>
                                    </div>
                                    <!--//HEAD END-->
                                </div>
                                <!--//HEAD CONTENT END-->

                                <!--PRICE START-->
                                <div class="generic_price_tag clearfix">
                                            <span class="price">
                                                <span class="sign">$</span>
                                                <span class="currency">99</span>
                                                <span class="cent">.99</span>
                                                <span class="month">/MON</span>
                                            </span>
                                </div>
                                <!--//PRICE END-->
                            </div>
                            <!--//HEAD PRICE DETAIL END-->

                            <!--FEATURE LIST START-->
                            <div class="generic_feature_list">
                                <ul>
                                    <li><span>2GB</span> Bandwidth</li>
                                    <li><span>150GB</span> Storage</li>
                                    <li><span>12</span> Accounts</li>
                                    <li><span>7</span> Host Domain</li>
                                    <li><span>24/7</span> Support</li>
                                </ul>
                            </div>
                            <!--//FEATURE LIST END-->

                            <!--BUTTON START-->
                            <div class="generic_price_btn clearfix">
                                @if(auth()->user() && empty($data))
                                    <a class="" href="#" onclick="paymPlan('basic');" data-bs-toggle="modal" data-bs-target="#exampleModal">Preview</a>
                                @elseif(auth()->user() && !empty($data))
                                    <a class="" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2">Preview</a>
                                @else
                                    <a class="" href="{{ route('login') }}">Preview</a>
                                @endif
                            </div>
                            <!--//BUTTON END-->
                        </div>
                        <!--//PRICE CONTENT END-->

                    </div>

                    <div class="col-md-4">

                        <!--PRICE CONTENT START-->
                        <div class="generic_content active clearfix">

                            <!--HEAD PRICE DETAIL START-->
                            <div class="generic_head_price clearfix">

                                <!--HEAD CONTENT START-->
                                <div class="generic_head_content clearfix">

                                    <!--HEAD START-->
                                    <div class="head_bg"></div>
                                    <div class="head">
                                        <span>Standard</span>
                                    </div>
                                    <!--//HEAD END-->

                                </div>
                                <!--//HEAD CONTENT END-->

                                <!--PRICE START-->
                                <div class="generic_price_tag clearfix">
                                            <span class="price">
                                                <span class="sign">$</span>
                                                <span class="currency">199</span>
                                                <span class="cent">.99</span>
                                                <span class="month">/MON</span>
                                            </span>
                                </div>
                                <!--//PRICE END-->

                            </div>
                            <!--//HEAD PRICE DETAIL END-->

                            <!--FEATURE LIST START-->
                            <div class="generic_feature_list">
                                <ul>
                                    <li><span>2GB</span> Bandwidth</li>
                                    <li><span>150GB</span> Storage</li>
                                    <li><span>12</span> Accounts</li>
                                    <li><span>7</span> Host Domain</li>
                                    <li><span>24/7</span> Support</li>
                                </ul>
                            </div>
                            <!--//FEATURE LIST END-->

                            <!--BUTTON START-->
                            <div class="generic_price_btn clearfix">
                                @if(auth()->user() && empty($data))
                                    <a class="" href="#" onclick="paymPlan('standard');" data-bs-toggle="modal" data-bs-target="#exampleModal">Preview</a>
                                @elseif(auth()->user() && !empty($data))
                                    <a class="" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2">Preview</a>
                                @else
                                    <a class="" href="{{ route('login') }}">Preview</a>
                                @endif
{{--                                <a class="" href="#" onclick="paymPlan('standard');" data-bs-toggle="modal" data-bs-target="#exampleModal">Preview</a>--}}
                            </div>
                            <!--//BUTTON END-->

                        </div>
                        <!--//PRICE CONTENT END-->

                    </div>
                    <div class="col-md-4">

                        <!--PRICE CONTENT START-->
                        <div class="generic_content clearfix">

                            <!--HEAD PRICE DETAIL START-->
                            <div class="generic_head_price clearfix">

                                <!--HEAD CONTENT START-->
                                <div class="generic_head_content clearfix">

                                    <!--HEAD START-->
                                    <div class="head_bg"></div>
                                    <div class="head">
                                        <span>Unlimited</span>
                                    </div>
                                    <!--//HEAD END-->

                                </div>
                                <!--//HEAD CONTENT END-->

                                <!--PRICE START-->
                                <div class="generic_price_tag clearfix">
                                            <span class="price">
                                                <span class="sign">$</span>
                                                <span class="currency">299</span>
                                                <span class="cent">.99</span>
                                                <span class="month">/MON</span>
                                            </span>
                                </div>
                                <!--//PRICE END-->

                            </div>
                            <!--//HEAD PRICE DETAIL END-->

                            <!--FEATURE LIST START-->
                            <div class="generic_feature_list">
                                <ul>
                                    <li><span>2GB</span> Bandwidth</li>
                                    <li><span>150GB</span> Storage</li>
                                    <li><span>12</span> Accounts</li>
                                    <li><span>7</span> Host Domain</li>
                                    <li><span>24/7</span> Support</li>
                                </ul>
                            </div>
                            <!--//FEATURE LIST END-->

                            <!--BUTTON START-->
                            <div class="generic_price_btn clearfix">
                                @if(auth()->user() && empty($data))
                                    <a class="" href="#" onclick="paymPlan('unlimited');" data-bs-toggle="modal" data-bs-target="#exampleModal">Preview</a>
                                @elseif(auth()->user() && !empty($data))
                                    <a class="" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2">Preview</a>
                                @else
                                    <a class="" href="{{ route('login') }}">Preview</a>
                                @endif
{{--                                <a class="" href="#" onclick="paymPlan('unlimited');" data-bs-toggle="modal" data-bs-target="#exampleModal">Preview</a>--}}
                            </div>
                            <!--//BUTTON END-->

                        </div>
                        <!--//PRICE CONTENT END-->

                    </div>
                </div>
                <!--//BLOCK ROW END-->

            </div>
        </section>
        <div class="bk">
            <button @if($btn == false) onclick="popupInstruction(1)" @else onclick="popupInstruction(0)" @endif class="bottom_btn">
                <i class="fa-regular fa-backward"></i>Test Mcqs
            </button>
        </div>
        <!-- footer-section -->
    </div>



    <!-- Button trigger modal -->
{{--    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
{{--        Launch demo modal--}}
{{--    </button>--}}

    <!-- Modal for payment request-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Payment Request</h3>
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                </div>

                <div class="modal-body">
                    <h5>Your request against this plan has been submitted. We will get back to you soon.</h5>
                </div>

                <div class="modal-footer">
{{--                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
                    <form action="{{ route('paymnt-plan') }}" method="post">
                        @csrf
                        <input type="hidden" name="payment_plan" id="payment_plan">
                        <input type="hidden" name="request_product" value="1">
                        <input type="hidden" name="price" value="10">
                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal for already buy plan-->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel2"><i class="fa fa-warning"></i></h3>
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                </div>
                <div class="modal-body">
                    <h5>Sorry! you already buy a payment plan.</h5>
                </div>
                <div class="modal-footer">
                    {{--                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                    <form action="{{ route('paymnt-plan') }}" method="post">--}}
{{--                        @csrf--}}

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('JS')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function popupInstruction(v)
        {
            if(v == 1)
            {
                Swal.fire(
                            'Oops!',
                            'you have already attempt test quiz. Purchase any package to attempt quiz.',
                            'error'
                        )
            }else{
                window.location.href = "{{route('test.categories')}}"
            }
        }

        function paymPlan(plan){
            $('#payment_plan').val(plan);
        }
    </script>
@endsection
