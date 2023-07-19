@extends('admin.layout')

@section('title', 'Create Test Type & Universities')

@section('css')
    <style>
        .select2-container--default .select2-selection--single .select2-selection__arrow{
            top: 6px !important;
            right: 10px !important;
        }

        .select2-container .select2-selection--single{
            height: 40px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered{
            background-color: unset !important;
            line-height: 20px !important;
        }

        .select2-container .select2-selection--single .select2-selection__rendered{
            padding-left: 12px !important;
        }

        .btn-style{
            width: 90%;
            height: 75px;
            border-radius: 15px;
            font-size: 24px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('admin.store-test-uni') }}" method="post">
            @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Test Type & University</h3>
                        </div>

                        <div class="card-body">
                            <div class="row mb-5 justify-content-center">
                                <div class="col-md-4 text-center">
                                    <button type="button" id="test_type" class="btn btn-group-lg btn-outline-info btn-style">Create Test Type</button>
                                </div>

                                <div class="col-md-4 text-center">
                                    <button type="button" id="both" class="btn btn-group-lg btn-outline-danger btn-style">Create University</button>
                                </div>
                            </div>

                            <div class="row mb-3" id="testType">
                                <div class="col-md-6">
                                    <label for="category_name">Test Type</label>
                                    <select id="category_name" name="test_type" autocomplete="test_type" autofocus
                                     class="js-example-tags form-control @error('test_type') is-invalid @enderror" required>
                                        <option selected disabled>Select Test Type/Add New</option>
                                        @forelse($test_types as $test_type)
                                            <option value="{{ $test_type->name }}">{{ ucfirst($test_type->name) }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('test_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3" id="uni" style="display: none">
                                <div class="col-md-6">
                                    <label for="">University Name</label>
                                    <input type="text" class="form-control" name="uni_name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('JS')
    <script>
        $(".js-example-tags").select2({
            tags: true
        });

        $(document).on('click', '#test_type', function (){
            $('#testType').show();
            $('#uni').hide();
        });

        $(document).on('click', '#both', function (){
            $('#testType').show();
            $('#uni').show();
        });
    </script>
@endsection
