@extends('admin.layout')

@section('title', 'All Questions')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>All Questions</h3>
                <a href="{{route('admin.create-mcqs',['s'=>encrypt($s)])}}" class="btn btn-info" style="float:right">Add Question</a>
            </div>


            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Questions</th>
                        <th>Options</th>
                        <th>Correct Option</th>
                        <th>Correct Explanation</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @php $count = 1; @endphp

                    @forelse($questions as $q)

                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{!! substr_replace(ucwords($q->ques), "...", 70) !!}</td>
                            <td>
                                <ul>
                                @foreach($q->options as $op)
                                @php
                                        $opt_name = substr($op->opt_key, '4');
                                    @endphp
                                        <li> {{strtoupper($opt_name) . ' = ' . $op->opt_value}}</li>
                                @endforeach
                            </ul>
                            </td>
                            <td>{{ ucwords($q->correct_option->correct_opt) }}</td>
                            <td>{{ substr_replace(ucwords($q->correct_option->incorrect_explanation), "...", 40) }}</td>
                            <td>
                                <a href="{{ route('admin.edit-ques', ['id' => encrypt($q->id)]) }}" class="btn btn-info">Edit</a>
                            </td>
                        </tr>

                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
