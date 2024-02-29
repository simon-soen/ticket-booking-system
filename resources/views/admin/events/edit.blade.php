@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Event</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.events.show', $event) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $event->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-control">{{ old('description', $event->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" id="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date', $event->date) }}" required>
                @error('date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="time" id="time" name="time" class="form-control @error('time') is-invalid @enderror" value="{{ old('time', $event->time) }}" required>
                @error('time')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="max_attendees" class="form-label">Max Attendees</label>
                <input type="number" id="max_attendees" name="max_attendees" class="form-control @error('max_attendees') is-invalid @enderror" value="{{ old('max_attendees', $event->max_attendees) }}" required>
                @error('max_attendees')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="VIP_price" class="form-label">VIP Price</label>
                <input type="number" id="VIP_price" name="VIP_price" class="form-control @error('VIP_price') is-invalid @enderror" value="{{ old('VIP_price', $event->VIP_price) }}" required>
                @error('VIP_price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Regular_price" class="form-label">Regular Price</label>
                <input type="number" id="Regular_price" name="Regular_price" class="form-control @error('Regular_price') is-invalid @enderror" value="{{ old('Regular_price', $event->Regular_price) }}" required>
                @error('Regular_price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
@section('navbar-left')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('events.index') }}">All Events</a>
    </li>
@endsection
@section('navbar-right')
    @include('layouts.nav')
@endsection