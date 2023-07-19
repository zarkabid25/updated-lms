@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')

    <h1>Welcome! {{ auth()->user()->first_name }}</h1>

@endsection
