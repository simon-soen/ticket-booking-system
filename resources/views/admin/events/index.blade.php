@extends('layouts.app')

@section('content')
    <h1>Events</h1>

    <a href="{{ route('admin.events.create') }}" class="btn btn-primary mb-3">Create Event</a>

    @if ($events->isEmpty())
        <p>No events found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Number of Booked Tickets</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->date }}</td>
                        <td>{{ $event->No_of_Booked_Tickets }}</td>
                        <td>
                            <a href="{{ route('admin.events.show', $event) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
{{-- @section('navbar-left')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('events.index') }}">All Events</a>
    </li>
@endsection --}}
@section('navbar-right')
    @include('layouts.nav')
@endsection