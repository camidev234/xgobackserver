<?php

namespace App\Http\Controllers;

use App\Models\Aircraft;
use Illuminate\Http\Request;

class AircraftController extends Controller
{
    

    public function getAllAircraft() {

        $baseUrl = 'http://127.0.0.1:8000/'; 

        $aircraft = Aircraft::all();

        foreach($aircraft as $plane) {
            $plane->aircraft_photo = $baseUrl . $plane->aircraft_photo;
        }

        if($aircraft) {
            return response()->json([
                'aircraft' => $aircraft
            ], 200);
        }
    }

    public function storeAircraft(Request $request)
    {
        $request->validate([
            'aircraft_photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->file('aircraft_photo')) {
            $file = $request->file('aircraft_photo');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/', $file_name);
            $fileRoute = 'storage/' . $file_name;
            $newAircraft = new Aircraft();
            $newAircraft->aircraft_name = $request->aircraft_name;
            $newAircraft->seats = $request->seats;
            $newAircraft->aircraft_photo = $fileRoute;

            $newAircraft->save();

            return response()->json(['path' => $fileRoute, 'message' => 'Aircraft created successfully'], 201);
        }

        return response()->json(['message' => 'Error uploading file'], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Aircraft $aircraft)
    {
        $baseUrl = 'http://127.0.0.1:8000/'; 

        $aircraft->aircraft_photo = $baseUrl . $aircraft->aircraft_photo;

        if($aircraft) {
            return response()->json([
                'aircraft' => $aircraft
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aircraft $aircraft)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aircraft $aircraft)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aircraft $aircraft)
    {
        //
    }
}
