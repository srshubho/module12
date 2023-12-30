<?php

namespace App\Http\Controllers;

use App\Constant;
use App\Models\Trip;
use Illuminate\Http\Request;
use App\Models\SeatAllocation;

class SeatAllocationController extends Controller
{
    private $seatCapacity = Constant::SEAT_CAPACITY;
    public function index()
    {
        $allocatedSeats = SeatAllocation::with('trip')->get();
        return view('pages.seat-allocations.index', compact('allocatedSeats'));
    }

    private function checkSeatCapacity(Request $request): bool
    {
        $bookedSeats = SeatAllocation::where('trip_id', $request->trip_id)->sum('number_of_seats');
        if ($bookedSeats + $request->number_of_seats > $this->seatCapacity) {
            return false;
        }
        return true;
    }

    public function create(Trip $trip)
    {

        return view('pages.seat-allocations.create', compact('trip'));
    }

    public function show()
    {

        $userTicketInfo = SeatAllocation::where('user_id', auth()->user()->id)->with('trip')->get();
        return view('pages.seat-allocations.ticket-info', compact('userTicketInfo'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'user_id' => 'required|exists:users,id',
            'number_of_seats' => 'required|min:1',
        ]);
        if (!$this->checkSeatCapacity($request)) {
            return redirect()->back()->with('error', 'Seat capacity is exceeded');
        }
        SeatAllocation::create([
            'trip_id' => $request->trip_id,
            'user_id' => $request->user_id,
            'number_of_seats' => $request->number_of_seats
        ]);
        return redirect()->route('dashboard')->with('success', 'Ticket purchased successfully');
    }

    public function destroy(SeatAllocation $seatAllocation)
    {
        $seatAllocation->delete();
        return redirect()->back()->with('success', 'Ticket cancelled successfully');
    }
}
