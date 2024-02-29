@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Booked Events</h1>

    @if (count($tickets) > 0)
        <div class="table-responsive">
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
                    @php
                        $events = [];
                    @endphp
                    @foreach ($tickets->sortBy('created_at')->reverse() as $ticket)
                        @php
                            $eventName = $ticket->event->name;
                            $ticketType = $ticket->type;
                            $key = $eventName . '-' . $ticketType;
                            if (!isset($events[$key])) {
                                $events[$key] = [
                                    'eventName' => $eventName,
                                    'ticketType' => $ticketType,
                                    'quantity' => 1,
                                ];
                            } else {
                                $events[$key]['quantity']++;
                            }
                        @endphp
                    @endforeach

                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event['eventName'] }}</td>
                            <td>{{ $ticket->event->date }}</td>
                            <td>{{ $event['ticketType'] }}</td>
                            <td>{{ $event['quantity'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>You don't have any booked events yet.</p>
    @endif
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
