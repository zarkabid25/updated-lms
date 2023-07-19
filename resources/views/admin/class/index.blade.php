@extends('admin.layout')

@section('title', 'View All')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h3>Classes</h3>
                    </div>
                </div>

                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover text-center" id="requests">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Teacher</th>
                                    <th>Date</th>
                                    <th>Enrolled Students</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($classes as $class)
                                    <tr>
                                        <td style="vertical-align: middle !important;">{{ $loop->iteration }}</td>
                                        <td style="vertical-align: middle !important;"><img
                                                src="{{ asset('images') . '/' . $class->class_image }}" width="60"
                                                alt="" /></td>
                                        <td style="vertical-align: middle !important;">{{ $class->class_name }}</td>
                                        <td style="vertical-align: middle !important;">{{ $class->teacher_name }}</td>
                                        <td style="vertical-align: middle !important;">
                                            {{ $class->class_date . ' ' . $class->class_time }}</td>
                                        <td style="vertical-align: middle !important;"><a href="{{route('admin.class.students',['id' => encrypt($class->id)])}}" class="btn btn-info">Students</a></td>
                                        
                                        <td style="vertical-align: middle !important;">

                                            <a href="{{ route('admin.courseDelete', ['id' => encrypt($class->id)]) }}">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                                    stroke-width="2" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round" class="css-i6dzq1">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                    </path>
                                                    <line x1="10" y1="11" x2="10" y2="17">
                                                    </line>
                                                    <line x1="14" y1="11" x2="14" y2="17">
                                                    </line>
                                                </svg>
                                            </a>

                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('admin.student.edit')

@section('JS')
    
@endsection
