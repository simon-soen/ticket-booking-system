@extends('layouts.app')

@section('content')
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

    <form action="{{ route('admin.events.edit', $event) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $event->name) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control">{{ old('description', $event->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" class="form-control" value="{{ old('date', $event->date) }}" required>
        </div>
        <div class="form-group">
            <label for="time">Time</label>
            <input type="time" id="time" name="time" class="form-control" value="{{ old('time', $event->time) }}" required>
        </div>
        <div class="form-group">
            <label for="max_attendees">Max Attendees</label>
            <input type="number" id="max_attendees" name="max_attendees" class="form-control" value="{{ old('max_attendees', $event->max_attendees) }}" required>
        </div>
        <div class="form-group">
            <label for="VIP_price">VIP Price</label>
            <input type="number" id="VIP_price" name="VIP_price" class="form-control" value="{{ old('VIP_price', $event->VIP_price) }}" required>
        </div>
        <div class="form-group">
            <label for="Regular_price">Regular Price</label>
            <input type="number" id="Regular_price" name="Regular_price" class="form-control" value="{{ old('Regular_price', $event->Regular_price) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
