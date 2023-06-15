<?php

namespace App\Http\Controllers;

use App\Models\GroupBooking;
use Illuminate\Http\Request;
use App\Notifications\NewPassengerNotification;
use App\Notifications\Proposalprice;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TicketGeneratedNotification;
use App\Models\Ticket;
use Carbon\Carbon;
use Validator;
use DB;
use Auth;

class APIGroupBookingController extends Controller
{
     public function proposal(Request $request)
{
    $book = $request->input('status');
    $customer_id = $request->input('customer_id');

    if ($book == 1) {
        $update = GroupBooking::where('customer_id', $customer_id)->update(['status' => 'Approved']);
        if ($update) {

            // $data=GroupBooking::join('passengers','passengers.booking_number','group_bookings.booking_number')
            // ->where('customer_id', $customer_id)
            // ->get();

            // $urls = 'https://arik-group-booking.vercel.app/passenger?customer_id='.$customer_id;
            
              $data=GroupBooking::join('passengers','passengers.booking_number','group_bookings.booking_number')
            ->where('customer_id', $customer_id)
            ->get();
              foreach ($data as $passenger) {
                 // $email$passenger->email;
            $ticket = new Ticket();
            $ticket->passenger_id = $passenger->id;
            $ticket->flight_number = $passenger->flight_number; // Set the flight number
            $ticket->departure = $passenger->departure_date; // Set the departure location
            $ticket->destination = $passenger->return_date; // Set the destination location
            $ticket->departure_date = '2023-06-10'; // Set the departure date
            $ticket->departure_time = '09:00:00'; // Set the departure time
            $ticket->save();
            // Send email notification to the passenger
            $email=$passenger->email;
            // $email->notify(new TicketGeneratedNotification($ticket));
            Notification::route('mail', $email)
        ->notify(new TicketGeneratedNotification($ticket));
        }

            return response()->json(['status' => 'Approved', 'data' => $update]);
        }
        return response()->json(['error' => 'Error updating status to Approved.'], 400);
    }

    $update = GroupBooking::where('customer_id', $customer_id)->update(['status' => 'canceled']);
    if ($update) {
        return response()->json(['status' => 'Canceled', 'data' => $update]);
    }
    return response()->json(['error' => 'Error updating status to Canceled.'], 400);
}

public function groupDetails($customer_id){

        $book=$customer_id;
        $data=DB::table('group_bookings')->join('customers','customers.id','group_bookings.customer_id')->where('customers.id',$book)->get();
        if ($data) {
           return response()->json(['status'=>'success','data'=>$data]);
        }
        
    }




}
