@extends('layouts.app')

@section('content')
    <h1>Booking Confirmation</h1>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    @if (count($bookings) > 0)
        <h2>Your Bookings</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Ticket Type</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->event->name }}</td>
                        <td>{{ $booking->event->date }}</td>
                        <td>{{ $booking->type }}</td>
                        <td>{{ $booking->quantity }}</td>
                        <td>{{ $booking->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>You don't have any past bookings.</p>
    @endif
@endsection
