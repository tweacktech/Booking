<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use DB;
use Auth;
class FlightController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }


    public function indexFlight()
    {
        $flights = Flight::all();

        return view('flights.index', compact('flights'));
    }

    public function create()
    {
        return view('flights.create');
    }

    public function addFlight(Request $request)
    {
        $flight = new Flight();
        $flight->flight_number = $request->input('flight_number');
        $flight->company_id = $request->input('company_id');
        $flight->origin = $request->input('origin');
        $flight->destination = $request->input('destination');
        $flight->departure = $request->input('departure');
        $flight->return_date = $request->input('return_date');
        $flight->price = $request->input('price');
        $flight->save();

        return redirect()->back()->with('alert', 'Flight created successfully.');
    }

    public function editFlight($id)
    {
        $flight = Flight::findOrFail($id);

        return view('flights.show', compact('flight'));
    }

    public function edit($id)
    {
        $flight = Flight::findOrFail($id);

        return view('flights.edit', compact('flight'));
    }


public function unhideFlight(Request $req, $id)
  {
    $update = DB::table('flights')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Flight was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back()->with('success', 'Flight unhide successfully.');
    }
  return redirect()->back()->with('error', 'Could not perform this action');
  }

  public function hideFlight(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('flights')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Flight was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
    return redirect()->back()->with('success', 'Flight hidden successfully.');
    }
   return redirect()->back()->with('error', 'Could not perform this action');
  }

    public function updateFlight(Request $request, $id)
    {
        $flight = Flight::findOrFail($id);
        $flight->flight_number = $request->input('flight_number');
        $flight->company_id = $request->input('company_id');
        $flight->origin = $request->input('origin');
        $flight->destination = $request->input('destination');
        $flight->departure = $request->input('departure');
        $flight->return_date = $request->input('return_date');
        $flight->price = $request->input('price');
        $flight->save();

        return redirect()->back()->with('success', 'Flight updated successfully.');
    }

    public function deleteFlight($id)
    {
        $flight = Flight::findOrFail($id);
        $flight->delete();

        return redirect()->route('flights.index')->with('success', 'Flight deleted successfully.');
    }
}
