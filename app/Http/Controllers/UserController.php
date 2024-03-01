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
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to book tickets.');
        }

        $request->validate([
            'type' => 'required|in:VIP,Regular',
            'quantity' => 'required|numeric|min:1|max:5', 
        ]);

        

        
        $user = Auth::user();

        $availableTickets = $event->max_attendees - $event->No_of_Booked_Tickets;
        $userBookedTickets = $user->tickets()->where('event_id', $event->id)->count();

        
        if ($availableTickets < $request->quantity || $userBookedTickets + $request->quantity > 5) {
            $message = $availableTickets < $request->quantity
                ? 'No available tickets for this event'
                : 'You cannot book more than 5 tickets for this event.';
    
            return redirect()->route('events.index')->with([
                'error' => $message,
                'eventId' => $event->id, 
            ]);
        }

        $totalPrice = $request->quantity * ($request->type === 'VIP' ? $event->VIP_price: $event->Regular_price);
        
        
        $tickets = [];
        for ($i = 0; $i < $request->quantity; $i++) {
            $tickets[] = auth()->user()->tickets()->create([
                'event_id' => $event->id,
                'type' => $request->type,
                
            ]);
        }
        
        $event->No_of_Booked_Tickets = $event->No_of_Booked_Tickets + $request->quantity;
        $event->save();

        $ticketDetails = [
            'event_name' => $event->name,
            'event_date' => $event->date,
            'ticket_type' => $request->type,
            'ticket_quantity' => $request->quantity,
            'total_price' => $totalPrice,
        ];
        
        Mail::to(auth()->user())->send(new SuccessfulReservation(auth()->user(), $ticketDetails));
       
        return redirect()->route('events.reserve')->with('success', 'Tickets reserved successfully!');
     
    }
    public function bookedEvents()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to check your tickets.');
        }
        $user = Auth::user();
        $tickets = $user->tickets()->with('event')->get();
        return view('events.reserve', compact('tickets'));
    }
    
    
}
