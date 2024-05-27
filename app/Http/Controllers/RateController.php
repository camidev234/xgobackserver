<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function saveRate(Request $request) {
        $newRate = new Rate();

        $newRate->name = $request->name;
        $newRate->description = $request->description;
        $newRate->base_price = floatval($request->base_price);

        $newRate->save();

        return response()->json([
            'message' => "Rate created successfully",
            'rate' => $newRate
        ], 200);
    }
}
