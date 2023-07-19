@extends('admin.layout')

@section('title', 'View All')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h3>Courses</h3>
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
                                    <th>Price</th>
                                    <th>Teacher</th>
                                    <th>Date</th>
                                    <th>Enrolled Students</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($courses as $course)
                                    <tr>
                                        <td style="vertical-align: middle !important;">{{ $loop->iteration }}</td>
                                        <td style="vertical-align: middle !important;"><img
                                                src="{{ asset('images') . '/' . $course->course_image }}" width="60"
                                                alt="" /></td>
                                        <td style="vertical-align: middle !important;">{{ $course->course_name }}</td>
                                        <td style="vertical-align: middle !important;">{{ $course->price }}</td>
                                        <td style="vertical-align: middle !important;">{{ $course->teacher->name }}</td>
                                        <td style="vertical-align: middle !important;">
                                            {{ $course->course_date . ' ' . $course->course_time }}</td>
                                            <td style="vertical-align: middle !important;"><a href="{{route('admin.class.students',['id' => encrypt($course->id)])}}" class="btn btn-info">Students</a></td>
                                        
                                            <td style="vertical-align: middle !important;">
                                            <button
                                                class="btn @if ($course->status == 1) btn-danger @else btn-success @endif active-deactive"
                                                data-id="{{ encrypt($course->id) }}" data-status="{{ $course->status }}">
                                                @if ($course->status == 1)
                                                     Deactive
                                                @else
                                                Active
                                                @endif
                                            </button>
                                        </td>
                                        <td style="vertical-align: middle !important;">

                                            <a href="{{ route('admin.courseDelete', ['id' => encrypt($course->id)]) }}">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.active-deactive').click(function() {
            var id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            if (status == 0) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to change this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                         fetch("{{ route('admin.courseEdit') }}", {

                                // Adding method type
                                method: "POST",

                                // Adding body or contents to send
                                body: JSON.stringify({
                                    id: id,
                                    status: 1,
                                }),

                                // Adding headers to the request
                                headers: {
                                    "Content-type": "application/json; charset=UTF-8"
                                }
                            })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error(response.statusText)
                                }
                                $(this).attr('data-status', 1)
                        $(this).removeClass('btn-success')
                        $(this).addClass('btn-danger')
                        $(this).html('Deactive')
                        Swal.fire(
                            'changed!',
                            'Course status has been changed.',
                            'success'
                        )
                            })
                            .catch(error => {
                                Swal.showValidationMessage(
                                    `Request failed: ${error}`
                                )
                            })
                        
                    }
                })
            } else {
                Swal.fire({
                    title: 'Mention Reason For Deactivation',
                    input: 'text',
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    showLoaderOnConfirm: true,
                    preConfirm: (reason) => {
                        return fetch("{{ route('admin.courseEdit') }}", {

                                // Adding method type
                                method: "POST",

                                // Adding body or contents to send
                                body: JSON.stringify({
                                    id: id,
                                    status: 0,
                                    reason: reason
                                }),

                                // Adding headers to the request
                                headers: {
                                    "Content-type": "application/json; charset=UTF-8"
                                }
                            })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error(response.statusText)
                                }
                                return response.json()
                            })
                            .catch(error => {
                                Swal.showValidationMessage(
                                    `Request failed: ${error}`
                                )
                            })
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).attr('data-status', 0)
                        $(this).addClass('btn-success')
                        $(this).removeClass('btn-danger')
                        $(this).html('Active')
                        Swal.fire(
                            'changed!',
                            'Course status has been changed.',
                            'success'
                        )
                    }
                })
            }
        })
    </script>
@endsection
