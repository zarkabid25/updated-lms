@extends('admin.layout')

@section('title', 'Request Detail')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h3>Request Detail</h3>
                    </div>
                </div>

                <div class="card-body">
                    <table>
                        <tr>
                            <th>Name: </th>
                            <td>{{ ucwords($notification->user->name) }}</td>
                        </tr>

                        <tr>
                            <th>Email: </th>
                            <td>{{ $notification->user->email }}</td>
                        </tr>

                        <tr>
                            <th>Phone: </th>
                            <td>{{ $notification->user->phone }}</td>
                        </tr>

                        <tr>
                            <th>Role: </th>
                            <td>{{ ucfirst($notification->role) }}</td>
                        </tr>
                    </table>

                    <table class="table table-hover text-center mt-4" id="requests">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="vertical-align: middle !important;">1</td>
                            <td style="vertical-align: middle !important;">{{ $notification->title }}</td>
                            <td style="vertical-align: middle !important;">{{ $notification->description }}</td>
                            <td style="vertical-align: middle !important;">
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                        {{ ucfirst($notification->paymPlan->status) }}
                                    </a>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('admin.update-request-status', ['id' => encrypt($notification->paymPlan->id), 'request_product' => encrypt($notification->paymPlan->request_product)]) }}">Approved</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
