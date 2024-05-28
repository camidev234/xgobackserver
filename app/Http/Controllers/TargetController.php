<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;

class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getAll() {
        return response()->json([
            'targets' => Target::all()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function saveTarget(Request $request)
    {
        $newTarget = new Target();

        $newTarget->color = $request->color;
        $newTarget->name = $request->name;

        $newTarget->save();

        return response()->json([
            'message' => 'Target Created Successfully',
            'target' => $newTarget
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Target $target)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Target $target)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Target $target)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Target $target)
    {
        //
    }
}
