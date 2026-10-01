<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();
        return $bookings;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date_of_booking = $request->booking_date;

        $booking = Booking::where('booking_date', $date_of_booking)
            ->where('property_id', $request->property_id)
            ->first();

        if ($booking !== null) {
            return redirect()
                ->route('dashboard')
                ->with('modal_open', true)
                ->with('modal_message', 'This property is already booked.')
                ->with('modal_property_id', $request->property_id);
        }

        Booking::create([
            'booking_date' => $request->booking_date,
            'people_count' => $request->people_count,
            'user_id' => Auth::id(),
            'property_id' => $request->property_id
        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
