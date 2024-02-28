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
