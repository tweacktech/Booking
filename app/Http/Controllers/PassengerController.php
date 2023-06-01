<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Illuminate\Http\Request;


class PassengerController extends Controller
{

    //    public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function passenger()
    {
        $passengers = Passenger::all();

        return view('passenger.index', compact('passengers'));
    }

    public function create()
    {
        return view('passengers.create');
    }

    public function store(Request $request)
    {
        $passenger = new Passenger();
        $passenger->name = $request->input('name');
        $passenger->email = $request->input('email');
        $passenger->phone = $request->input('phone');
        $passenger->passport_no = $request->input('passport_no');
        $passenger->flight_id = $request->input('flight_id');
        $passenger->save();

        return redirect()->route('passengers.index')->with('success', 'Passenger created successfully.');
    }

    public function editPassenger($id)
    {
        $passenger = Passenger::findOrFail($id);

        return view('passenger.show', compact('passenger'));
    }

    public function edit($id)
    {
        $passenger = Passenger::findOrFail($id);

        return view('passengers.edit', compact('passenger'));
    }

    public function updatePassenger(Request $request, $id)
    {
        $passenger = Passenger::findOrFail($id);
        $passenger->name = $request->input('name');
        $passenger->email = $request->input('email');
        $passenger->phone = $request->input('phone');
        $passenger->flight_id = $request->input('flight_id');
        $passenger->save();

        return redirect()->back()->with('success', 'Passenger updated successfully.');
    }

    public function deletePassenger($id)
    {
        $passenger = Passenger::findOrFail($id);
        $passenger->delete();

        return redirect()->route('passengers.index')->with('success', 'Passenger deleted successfully.');
    }
}
