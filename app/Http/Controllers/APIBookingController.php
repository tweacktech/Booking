<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupBooking;
use App\Models\Timeline;
use Validator;
use DB;
use Carbon\Carbon;
class APIBookingController extends Controller
{

        // list of invite
       public function timeline(){
        $data=DB::table('timelines')->get();
         return response()->json(['data'=>$data]);
    }
      public function timelineShow($customer_id){
        $data=DB::table('timelines')->where('customer_id',$customer_id)->get();
         return response()->json(['data'=>$data]);
    }



   // list of payment
       public function Paymet(){
        $data=DB::table('payments')->get();
         return response()->json(['data'=>$data]);
    }
      public function paymentShow($id){
        $data=DB::table('payments')->where('id',$id)->get();
         return response()->json(['data'=>$data]);
    }



public function Invite(Request $request)
{

     $validator = Validator::make($request->all(), [
        'emails'=>'required', 
        'booking_number'=>'required',
]);

// Check if validation fails
if ($validator->fails()) {
    // Handle validation errors
    return response()->json([
        'error' => $validator->errors(),
    ], 400);
}
     $emails = explode(',', $request->input('emails'));
         $savedEmails = [];

          $emailString = $request->input('emails');

    // Extract emails using regular expressions
    $pattern = '/[\s,]+/'; // Match one or more spaces or commas
    preg_match_all('/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}\b/', $emailString, $matches);
    $emailArr = $matches[0];

        // Save each email to the database
        foreach ($emails as $email) {
            // return ['email' => trim($email)];
            $urls = 'https://arik-group-booking.vercel.app/passenger?email='.$email.'&&booking_number='.$request->input('booking_number');
            $booking_number=$request->input('booking_number');
            // Notification::route('mail', $email)
            // ->notify(new NewPassengerNotification($urls));
            // array_push($savedEmails,$email);
        }

        // $data=DB::table('group_bookings')->where('booking_number',$request->input('booking_number'))->get();
        $booking_number=$request->input('booking_number');
        $data=GroupBooking::where('booking_number',$booking_number)
        ->update(['emails'=>$request->input('emails')]);
       if ($data) {
           DB::table('timelines')
        ->insert([
            'user'=>'customer_id',
            'booking_number'=>$request->input('booking_number'),
          'activity' => 'Members Invited',
          'activity_type' => 'Invite',
          'status' => 'Approved',
          'created_at'=>Carbon::now(),
        ]);
    return response()->json(['status'=>'success',
'date'=>$data]);
       }

}



}
