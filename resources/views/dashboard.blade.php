@extends('layouts.main')

@section('content')
    @auth
        <h1>Welcome, {{ auth()->user()->name }}</h1>
    @else
        <h1>Halaman Home</h1>
    @endauth
@endsection
