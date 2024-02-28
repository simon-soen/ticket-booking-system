<!DOCTYPE html>
<html>
<head>
    <title>Successful Reservation</title>
</head>
<body>
    <h1>Successful Reservation</h1>
    <p>Hello {{ $user->name }},</p>
    <p>Your reservation for the event "{{ $ticketDetails['event_name'] }}" has been successful.</p>
    <p>Details:</p>
    <ul>
        <li>Event: {{ $ticketDetails['event_name'] }}</li>
        <li>Date: {{ $ticketDetails['event_date'] }}</li>
        <li>Ticket Type: {{ $ticketDetails['ticket_type'] }}</li>
        <li>Quantity: {{ $ticketDetails['ticket_quantity'] }}</li>
        <li>Total Price: {{$ticketDetails['totalPrice']}} </li>

    </ul>
    <p>Thank you for your reservation.</p>
</body>
</html>
