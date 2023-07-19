
@extends('student.layouts.mcqs-layout')

@section('title', 'Verify Your Email Address')


@section('content')

<section style="margin-top: 15px;" class="cardbgcolor">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Verify Your Email Address') }}</div>
        
                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif
        
                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section>

@endsection

{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>--}}
{{--<script src="{{ asset('js/custom.js') }}"></script>--}}

{{--<script>--}}
{{--    function check_alarm(){--}}
{{--        $(".main-header").toggle();--}}
{{--    }--}}
{{--</script>--}}

{{--</body>--}}
{{--</html>--}}


