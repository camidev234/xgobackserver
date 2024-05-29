<?php

namespace App\Http\Controllers;

use App\Models\Aircraft;
use App\Models\Aircraft_seat;
use Illuminate\Http\Request;

class AircraftSeatController extends Controller
{
    //

    public function saveAircraftSeat(Request $request)

    {

        $seatFilter = Aircraft_seat::where('seat_code', $request->seat_code)->where('aircraft_id', $request->aircraft_id)->first();

        if ($seatFilter) {
            return response()->json([
                'message' => 'El asiento ' . $seatFilter->seat_code . ' ' . 'ya existe para la aeronave ' . $seatFilter->aircraft->aircraft_name . " " . "con la tarifa " . $seatFilter->rate->name . " " . "Asociada."
            ], 200);
        }

        $newAircraftSeat = new Aircraft_seat();

        $newAircraftSeat->rate_id = $request->rate_id;
        $newAircraftSeat->aircraft_id = $request->aircraft_id;
        $newAircraftSeat->seat_code = $request->seat_code;

        $newAircraftSeat->save();

        return response()->json([
            'aircraft_seat' => $newAircraftSeat
        ], 201);
    }

    public function getSeatsByAircraft(Aircraft $aircraft)
    {
        $aircraftSeats = Aircraft_seat::with('aircraft')->with('rate')->where('aircraft_id', $aircraft->id)->get();

        if ($aircraftSeats->isEmpty()) {
            return response()->json([
                'error' => 'No se encontraron asientos para el avión especificado.'
            ], 404);
        }
    
        return response()->json([
            'seats' => $aircraftSeats
        ], 200);
    }
}
