<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.driver')->with(['drivers'=>Driver::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $drivers = new Driver;
        $drivers->drivername = $request->drivername;
        $drivers->sss = $request->sss;
        $drivers->philhealth = $request->philhealth;
        $drivers->save();

        return redirect()->route('drivers.index')->with('success', 'Driver Has Been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        $driver->drivername = $request->drivername;
        $driver->sss = $request->sss;
        $driver->philhealth = $request->philhealth;
        $driver->save();
        return redirect()->route('drivers.index')->with('success', 'Driver Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('drivers.index')->with('success', 'Driver Has Been Deleted Successfully');
    }
}
