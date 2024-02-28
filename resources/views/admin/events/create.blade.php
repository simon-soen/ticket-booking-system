<!-- resources/views/admin/events/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Event</h1>

    <form action="{{ route('admin.events.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="time">Time</label>
            <input type="time" id="time" name="time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="max_attendees">Max Attendees</label>
            <input type="number" id="max_attendees" name="max_attendees" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="VIP_price">VIP Price</label>
            <input type="number" id="VIP_price" name="VIP_price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Regular_price">Regular Price</label>
            <input type="number" id="Regular_price" name="Regular_price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
