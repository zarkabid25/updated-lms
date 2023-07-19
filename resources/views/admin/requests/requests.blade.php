@extends('admin.layout')

@section('title', 'All Payment Requests')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h3>Payment Requests</h3>
                    </div>
                </div>

                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover text-center" id="requests">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                @endphp

                            @forelse ( $notifications as $notification )
{{--                                @php--}}
{{--                                    $status = (new \App\Models\PaymentPlan())->where('user_id', $notification->user_id)->first()->status;--}}
{{--                                    $name = (new \App\Models\User())->where('id', $notification->user_id)->first()->name;--}}
{{--                                @endphp--}}
                                <tr>
                                    <td style="vertical-align: middle !important;">{{ $count++ }}</td>
                                    <td style="vertical-align: middle !important;">{{ ucwords($notification->user->name) }}</td>
                                    <td style="vertical-align: middle !important;">{{ $notification->title }}</td>
                                    <td style="vertical-align: middle !important;">{{ $notification->description }}</td>
                                    <td style="vertical-align: middle !important;">{{ ucfirst($notification->paymPlan->status) }}</td>
                                    <td style="vertical-align: middle !important;">{{ ucfirst($notification->role) }}</td>
                                    <td style="vertical-align: middle !important;">
                                        <a href="{{ route('admin.request-detail', ['id' => encrypt($notification->id)]) }}"><i class="feather icon-eye" style="font-size: 24px;"></i></a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="11">
                                    {{ $notifications->onEachSide(2)->links('admin.components.pagination') }}
                                </td>
                                <td colspan="2" style="vertical-align: middle" class="text-right">
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
