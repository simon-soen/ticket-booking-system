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
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }} for event: {{ session('eventId') }}
                        </div>
                        @php
                            // Clear the session data to avoid displaying the message again
                            session()->forget('error');
                            session()->forget('eventId');
                        @endphp
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
@endsection
@section('navbar-left')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('events.reserve') }}">Your Tickets</a>
    </li>
@endsection

@section('navbar-right')
    @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
@endsection