@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-4 mt-5 mb-4">Welcome to Our Events Platform</h1>
            <p class="lead mb-5">Join our community and explore a world of exciting events happening near you.</p>
            <a href="{{ route('events.index') }}" class="btn btn-primary btn-lg">Show Available Events</a>
        </div>
    </div>
</div>
@endsection
