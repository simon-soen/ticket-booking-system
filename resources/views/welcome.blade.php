@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-4 mt-5 mb-4">Welcome to Our Events Platform</h1>
            <p class="lead mb-5">Join our community and explore a world of exciting events happening near you.</p>
            <div class="mb-3">
                <a href="{{ route('events.index') }}" class="btn btn-primary btn-lg btn-block">Show Available Events</a>
            </div>
            <div>
                <a href="{{ route('admin.events.index') }}" class="btn btn-secondary btn-lg btn-block">Create Event</a>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-block {
        display: block;
        width: 100%;
        margin-bottom: 10px; 
    }
</style>
@endsection
