<?php

namespace App\Http\Controllers;

use App\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rates = Rate::all();
        return view('admin.rates')->with('rates', $rates);
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
        $rates = new Rate;
        $rates->jobdescription = $request->jobdescription;
        $rates->sss = $request->sss;
        $rates->philhealth = $request->philhealth;
        $rates->frequency = $request->frequency;
        $rates->salary = $request->salary;
        $rates->save();

        return redirect()->route('rates.index')->with('success', 'Rates Has Been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function show(Rate $rate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function edit(Rate $rate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rate $rate)
    {
        $rate->jobdescription = $request->jobdescription;
        $rate->sss = $request->sss;
        $rate->philhealth = $request->philhealth;
        $rate->frequency = $request->frequency;
        $rate->salary = $request->salary;
        $rate->save();

        return redirect()->route('rates.index')->with('success', 'Rates Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rate $rate)
    {
        $rate->delete();
        return redirect()->route('rates.index')->with('success', 'Employee Information Has Been Deleted Successfully');
    }
}
