<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use App\Models\Ticket;
use App\Notifications\TicketGeneratedNotification;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function Ticket()
    {
        return view('ticket');
    }

    public function generateTickets()
    {
        // Get approved passengers
        $passengers = Passenger::where('status', 'approved')->get();

        // Generate tickets for each approved passenger and send email notification
        foreach ($passengers as $passenger) {
            $ticket = new Ticket();
            $ticket->passenger_id = $passenger->id;
            $ticket->flight_number = 'XYZ123'; // Set the flight number
            $ticket->departure = 'New York'; // Set the departure location
            $ticket->destination = 'London'; // Set the destination location
            $ticket->departure_date = '2023-06-10'; // Set the departure date
            $ticket->departure_time = '09:00:00'; // Set the departure time
            $ticket->save();
            // Send email notification to the passenger
            $passenger->notify(new TicketGeneratedNotification($ticket));
        }

        return response()->json(['message' => 'Tickets generated and notifications sent successfully'], 200);
    }
}
