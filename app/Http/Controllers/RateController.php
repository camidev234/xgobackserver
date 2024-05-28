<?php

namespace App\Http\Controllers;

use App\Http\Resources\RateResource;
use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function saveRate(Request $request) {
        $newRate = new Rate();

        $newRate->name = $request->name;
        $newRate->description = $request->description;
        $newRate->base_price = floatval($request->base_price);
        $newRate->target_id = $request->target_id;

        $newRate->save();

        return response()->json([
            'message' => "Rate created successfully",
            'rate' => $newRate
        ], 201);
    }

    public function getAllRates() {
        $rates = Rate::with('target')->get();

        return response()->json([
            'rates' => RateResource::collection($rates)
        ], 200);
    }
}
