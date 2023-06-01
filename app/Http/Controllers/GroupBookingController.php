<?php

namespace App\Http\Controllers;

use App\Models\GroupBooking;
use Illuminate\Http\Request;
use App\Notifications\NewPassengerNotification;
use Illuminate\Support\Facades\Notification;
use Validator;

class GroupBookingController extends Controller
{
    public function index()
    {
        $groupBookings = GroupBooking::all();

        return view('group_bookings.index', compact('groupBookings'));
    }

    public function create()
    {
        return view('group_bookings.create');
    }

    public function store(Request $request)
    {

        $emails = explode(',', $request->input('emails'));

        // Save each email to the database
        foreach ($emails as $email) {

            // return ['email' => trim($email)];
            // Notification::route('mail', $email)
            // ->notify(new NewPassengerNotification());
        }

        $validator = Validator::make($request->all(), [
    'customer_id' => 'required',
    'company_id' => 'required',
    'booking_number' => 'required',
    'group_name' => 'required',
    'flight_id' => 'required',
    'group_size' => 'required',
    // 'emails' => 'required|array',
    'emails.*' => 'email',
]);

// Check if validation fails
if ($validator->fails()) {
    // Handle validation errors
    return response()->json([
        'error' => $validator->errors(),
    ], 400);
}

// Create a new instance of the GroupBooking model
$groupBooking = new GroupBooking();

// Set the properties based on the validated input
$groupBooking->customer_id = $request->input('customer_id');
$groupBooking->company_id = $request->input('company_id');
$groupBooking->booking_number = $request->input('booking_number');
$groupBooking->group_name = $request->input('group_name');
$groupBooking->flight_id = $request->input('flight_id');
$groupBooking->group_size = $request->input('group_size');
$groupBooking->emails = $request->input('emails');

// Save the group booking
$groupBooking->save();
if ($groupBooking) {
    return response()->json(['status'=>'success',
'date'=>$groupBooking]);
}

 return response()->json(['status'=>'error'],200);
        // return redirect()->route('group_bookings.index')->with('success', 'Group Booking created successfully.');
    }

    public function show($id)
    {
        $groupBooking = GroupBooking::findOrFail($id);

        return view('group_bookings.show', compact('groupBooking'));
    }

    public function edit($id)
    {
        $groupBooking = GroupBooking::findOrFail($id);

        return view('group_bookings.edit', compact('groupBooking'));
    }

    public function update(Request $request, $id)
    {
        $groupBooking = GroupBooking::findOrFail($id);
        $groupBooking->booking_number = $request->input('booking_number');
        $groupBooking->group_name = $request->input('group_name');
        $groupBooking->flight_id = $request->input('flight_id');
        $groupBooking->group_size  = $request->input('group_size ');
        $groupBooking->save();

        return redirect()->route('group_bookings.index')->with('success', 'Group Booking updated successfully.');
    }

    public function destroy($id)
    {
        $groupBooking = GroupBooking::findOrFail($id);
        $groupBooking->delete();

        return redirect()->route('group_bookings.index')->with('success', 'Group Booking deleted successfully.');
    }
}
