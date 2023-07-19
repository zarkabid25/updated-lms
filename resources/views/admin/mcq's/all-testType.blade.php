@extends('admin.layout')

@section('title', 'All Test Type & Universities')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>All Test Type & University</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Test Types</th>
                                    <th>Universities</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $count = 1; @endphp

                            @forelse($test_types as $rec)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ ucwords($rec->entryTest->name) }}</td>
                                    <td>{{ ucwords($rec->name) }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit-testTypes', ['id' => encrypt($rec->entryTest->id), 'uni_id' => encrypt($rec->id)]) }}" class="feather icon-edit" ></a>
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
