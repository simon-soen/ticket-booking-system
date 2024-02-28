<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SuccessfulReservation;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function viewEvents()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }
    public function bookEvent(Request $request, Event $event)
    {
        $this->middleware('auth');

        $request->validate([
            'type' => 'required|in:VIP,Regular',
            'quantity' => 'required|numeric|min:1|max:5', 
        ]);

        

        
        $user = Auth::user();

        $availableTickets = $event->max_attendees - $event->No_of_Booked_Tickets;
        $userBookedTickets = $user->tickets()->where('event_id', $event->id)->count();

        
        if ($availableTickets < $request->quantity || $userBookedTickets + $request->quantity > 5) {
            return response()->json([
                'message' => $availableTickets < $request->quantity
                    ? 'No available tickets for this event'
                    : 'You cannot book more than 5 tickets for this event.',
            ], 400);
        }

        $totalPrice = $request->quantity * ($request->type === 'VIP' ? $event->ticket_price_vip : $event->ticket_price_regular);
        
        
        $tickets = [];
        for ($i = 0; $i < $request->quantity; $i++) {
            $tickets[] = auth()->user()->tickets()->create([
                'event_id' => $event->id,
                'type' => $request->type,
                
            ]);
        }
        $ticketDetails = [
            'event_name' => $event->name,
            'event_date' => $event->date,
            'ticket_type' => $request->type,
            'ticket_quantity' => $request->quantity,
            'total_price' => $totalPrice,
        ];
        // ...

        Mail::to(auth()->user())->send(new SuccessfulReservation(auth()->user(), $ticketDetails));
        return redirect()->route('events.reserve')->with('success', 'Tickets reserved successfully!');
    }
}