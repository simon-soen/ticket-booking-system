@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Events</h1>

    @if ($events->isEmpty())
        <div class="alert alert-info" role="alert">
            No events found.
        </div>
    @else
        <div class="card-deck">
            @foreach ($events as $event)
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">{{ $event->name }}</h2>
                        <p class="card-text">Date: {{ $event->date }}</p>
                        <p class="card-text">Time: {{ $event->time }}</p>
                        <p class="card-text">Description: {{ $event->description }}</p>

                        <!-- Booking Form -->
                        <form id="bookEventForm{{ $event->id }}" action="{{ route('bookEvent', $event) }}" method="POST">
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

                        @if (session('error') && session('eventId') == $event->id)
                            <div class="alert alert-danger mt-3" role="alert">
                                {{ session('error') }} for this event
                            </div>
                            @php
                                session()->forget('error');
                                session()->forget('eventId');
                            @endphp
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

@section('navbar-left')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('events.reserve') }}">Your Tickets</a>
    </li>
@endsection

@section('navbar-right')
    @include('layouts.nav')
@endsection

@section('scripts')
    <script>
        // Function to show booking success message
        function showBookingSuccess() {
            alert('Booking successful!');
        }
    </script>
@endsection
