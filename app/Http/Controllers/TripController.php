<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::all();
        return view('pages.trips.index', compact('trips'));
    }

    public function show()
    {
        return view('pages.trips.show');
    }

    public function search(Request $request)
    {
        $request->validate([
            'departure_location_id' => 'required|integer',
            'arrival_location_id' => 'required|integer',
        ]);
        $trips = Trip::where('departure_location_id', $request->departure_location_id)
            ->where('arrival_location_id', $request->arrival_location_id)->get();

        return view('pages.dashboard', compact('trips'));
    }
    public function create()
    {
        $locations = DB::table('locations')->get();
        return view('pages.trips.create', compact('locations'));

    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'departure_location_id' => 'required',
            'arrival_location_id' => 'required',
            'departure_time' => 'required|unique:trips',
        ]);
        if ($request->departure_location_id == $request->arrival_location_id) {
            return redirect()->back()->with('error', 'Departure and Arrival locations cannot be the same');
        }


        Trip::create($request->all());
        return redirect()->route('trips.index')->with('success', 'Trip created successfully');
    }

    public function edit(Trip $trip)
    {
        $locations = DB::table('locations')->get();
        return view('pages.trips.edit', ['trip' => $trip, 'locations' => $locations]);
    }

    public function update(Request $request, Trip $trip)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'departure_location_id' => 'required',
            'arrival_location_id' => 'required',
            'departure_time' => 'required|unique:trips'
        ]);
        if ($request->departure_location_id == $request->arrival_location_id) {
            return redirect()->back()->with('error', 'Departure and Arrival locations cannot be the same');
        }

        $trip->update($request->all());
        return redirect()->route('trips.index')->with('success', 'Trip updated successfully');
    }

    public function destroy(Trip $trip)
    {
        $trip->delete();
        return redirect()->route('trips.index')->with('success', 'Trip deleted successfully');
    }
}
