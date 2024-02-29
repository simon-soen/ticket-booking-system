@extends('layouts.app')

@section('content')
<h1>Your Booked Events</h1>

@if (count($tickets) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Event Name</th>
                <th>Date</th>
                <th>Ticket Type</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->event->name }}</td>
                    <td>{{ $ticket->event->date }}</td>
                    <td>{{ $ticket->type }}</td>
                    <td>1</td> </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>You don't have any booked events yet.</p>
@endif
@endsection
@section('navbar-left')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('events.index') }}">All Events</a>
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