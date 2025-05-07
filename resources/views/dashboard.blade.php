@extends('layouts.layout')
@section('title', 'Dashboard')
@section('content')
<div class="container mt-4">
    <h1>Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}!</p>
    <p>Your email: {{ Auth::user()->email }}</p>
    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
    <a href="{{route('innerpage')}}" class="btn btn-primary">Innerpage</a>
</div>

@endsection