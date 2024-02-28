<!-- resources/views/events/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Events</h1>

    @if ($events->isEmpty())
        <p>No events found.</p>
    @else
        <ul>
            @foreach ($events as $event)
                <li>
                    <h2>{{ $event->name }}</h2>
                    <p>Date: {{ $event->date }}</p>
                    <p>Time: {{ $event->time }}</p>
                    <p>Description: {{ $event->description }}</p>
                    <form action="{{ route('events.reserve', $event) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="type">Ticket Type:</label>
                            <select name="type" id="type" class="form-control">
                                <option value="VIP">VIP</option>
                                <option value="Regular">Regular</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" max="5">
                        </div>
                        <button type="submit" class="btn btn-primary">Reserve Ticket</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
