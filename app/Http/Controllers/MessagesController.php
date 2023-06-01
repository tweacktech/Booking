<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    $staffs = DB::table('employees')->get();
    $customers = DB::table('customers')->get();

    $messages = DB::table('messages')
      ->join('users', 'users.id', 'messages.message_from')
      ->get();

    return view('messages.index', compact('staffs', 'customers', 'messages'));
  }

  public function create_message(Request $req)
  {
    return $req->all();
  }

  public function create_general_message(Request $req)
  {
    $data = [
      'message_to' => $req->message_to,
      'message_from' => Auth::id(),
      'message' => $req->message,
      'type' => 'general',
    ];

    $create = DB::table('messages')->insert($data);

    if ($create) {

      DB::table('activities')
        ->insert([
          'activity' => 'a genereal message was created by' . Auth::user()->name,
          'activity_type' => 'add'
        ]);

      return redirect()->back()->with('alert', 'Message Created Successfully');
    }
    return redirect()->back()->with('alert', 'Failed To Create');
  }

  public function create_staff_message(Request $req)
  {
    $data = [
      'message_to' => $req->message_to,
      'message_from' => Auth::id(),
      'message' => $req->message,
      'type' => ' staff message',
    ];

    $create = DB::table('messages')->insert($data);

    if ($create) {
      DB::table('activities')
        ->insert([
          'activity' => 'a staff message was created by' . Auth::user()->name,
          'activity_type' => 'add'
        ]);
      return redirect()->back()->with('alert', 'Message Created Successfully');
    }
    return redirect()->back()->with('alert', 'Failed To Create');
  }

  public function create_customer_message(Request $req)
  {
    $data = [
      'message_to' => $req->message_to,
      'message_from' => Auth::id(),
      'message' => $req->message,
      'type' => ' customer message',
    ];

    $create = DB::table('messages')->insert($data);

    if ($create) {
      DB::table('activities')
        ->insert([
          'activity' => 'a customer message was created by' . Auth::user()->name,
          'activity_type' => 'add'
        ]);
      return redirect()->back()->with('alert', 'Message Created Successfully');
    }
    return redirect()->back()->with('alert', 'Failed To Create');
  }
}
