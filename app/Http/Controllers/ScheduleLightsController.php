<?php

namespace App\Http\Controllers;

use App\Models\BulbStatus;
use Illuminate\Http\Request;
use App\Models\ScheduleLights;


class ScheduleLightsController extends Controller
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ScheduleLights $scheduleLights)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ScheduleLights $scheduleLights)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $pin = ScheduleLights::find($id);
        $pin->update($request->all());

        return redirect('/dashboard');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sched = ScheduleLights::find($id);
        $sched->schedule = NULL;
        $sched->save();

        return redirect('/dashboard');
    }
}
