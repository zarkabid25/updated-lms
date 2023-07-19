@extends('admin.layout')

@section('title', 'Edit MCQ Category')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>All Categories</h3>
            </div>

            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Entry Test Type</th>
                        <th>Universities</th>
                        <th>Categories</th>
                        <th>Subjects</th>
                        <th>Sub Subjects</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                @php $count = 1; @endphp
                    @forelse($cats_data as $rec)

                        @php
                            $imagePath = explode('.', !is_null($rec->subj->cat->category_image) ? $rec->subj->cat->category_image : 'user-avatar.png');
                        @endphp

                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $rec->subj->cat->entryTest->name }}</td>
                            <td>{{ $rec->subj->cat->uni->name }}</td>
                            <td>{{ ucwords($rec->subj->cat->category_name) }}
                                <img src="{{asset('images')."/". $imagePath[0].".".$imagePath[1]}}" width="60" alt="" />
                            </td>

                                @php
                                    $imagePath = explode('.', !is_null($rec->subj->subject_image) ? $rec->subj->subject_image : 'user-avatar.png');
                                @endphp

                                <td>
                                    {{ ucwords($rec->subj->subject_name) }}
                                    <img src="{{asset('images')."/". $imagePath[0].".".$imagePath[1]}}" width="60" alt="" />
                                </td>

                                    @php
                                        $imagePath = explode('.', !is_null($rec->sub_subject_image) ? $rec->sub_subject_image : 'user-avatar.png');
                                    @endphp

                                    <td>
                                        {{ ucwords($rec->sub_subject_name) }}
                                        <img src="{{asset('images')."/". $imagePath[0].".".$imagePath[1]}}" width="60" alt="" />
                                    </td>
                                <td>
                                    {{$rec->time}}
                                </td>

                            <td>
                                <a href="{{ route('admin.edit-cat', ['id' => encrypt($rec->id)]) }}" class="feather icon-edit"></a>
                                <a href="{{ route('admin.cats-ques', ['id' => encrypt($rec->id)]) }}" class="feather icon-question">Questions</a>
                            </td>
                        </tr>

                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
