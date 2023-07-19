@extends('admin.layout')

@section('title', 'Enrolled Students')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h3>Enrolled Students</h3>
                    </div>
                </div>

                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover text-center" id="requests">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Image</th>
{{--                                <th>Status</th>--}}
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = 1;

                            @endphp
                         @forelse ( $users as $user )

                            <tr>
                                <td style="vertical-align: middle !important;">{{ $count++ }}</td>
                                <td style="vertical-align: middle !important;">{{ucfirst($user->name)}}</td>
                                <td style="vertical-align: middle !important;">{{ $user->email }}</td>

                                <td style="vertical-align: middle !important;">
                                    @if(!empty($user->image))
                                        {{ $user->image }}
                                    @else
                                       <img src="{{asset('files/images//do_not_delete/do_not_delete.png')}}" width="50" alt="no image">
                                    @endif
                                </td>

                                <td style="vertical-align: middle !important;">
                                    <button
                                                class="btn @if ($user->getPurchasedCourse($id)->status == 1) btn-danger @else btn-success @endif active-deactive"
                                                data-id="{{ encrypt($user->id) }}" data-status="{{ $user->getPurchasedCourse($id)->status }}">
                                                @if ($user->getPurchasedCourse($id)->status == 1)
                                                     Suspend
                                                @else
                                                Active
                                                @endif
                                            </button>

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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.active-deactive').click(function() {
        var id = $(this).attr('data-id');
        var status = $(this).attr('data-status');
        var class_id = '{{$id}}';
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
                     fetch("{{ route('admin.classEdit') }}", {

                            // Adding method type
                            method: "POST",

                            // Adding body or contents to send
                            body: JSON.stringify({
                                id: id,
                                status: 1,
                                'class_id':class_id
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
                    $(this).html('Suspend')
                    Swal.fire(
                        'changed!',
                        'Student status has been changed.',
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
                    return fetch("{{ route('admin.classEdit') }}", {

                            // Adding method type
                            method: "POST",

                            // Adding body or contents to send
                            body: JSON.stringify({
                                id: id,
                                status: 0,
                                reason: reason,
                                'class_id':class_id
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
                        'Student status has been changed.',
                        'success'
                    )
                }
            })
        }
    })
</script>
@endsection
