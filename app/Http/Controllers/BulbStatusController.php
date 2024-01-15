<?php

namespace App\Http\Controllers;

use App\Models\BulbStatus;
use Illuminate\Http\Request;

class BulbStatusController extends Controller
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
    public function show()
    {
        $status = BulbStatus::all();
        return response()->json(['data' => $status], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $pin1 = $request->input('pin1');
        $pin2 = $request->input('pin2');
        $pin3 = $request->input('pin3');
        $pin4 = $request->input('pin4');

        $id1 = 1;
        $id2 = 2;
        $id3 = 3;
        $id4 = 4;

        BulbStatus::where('id', $id1)->update(['status' => $pin1]);
        BulbStatus::where('id', $id2)->update(['status' => $pin2]);
        BulbStatus::where('id', $id3)->update(['status' => $pin3]);
        BulbStatus::where('id', $id4)->update(['status' => $pin4]);
        $led = BulbStatus::all();
        return view('/dashboard')->with('led', $led);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
