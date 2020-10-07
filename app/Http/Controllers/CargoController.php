<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\Driver;
use App\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    //    $total = 0;
    //    $total = Cargo::where('status','paid')->sum('rate');
      
        return view('admin.cargo')
        ->with(['cargos'=>Cargo::all(), 'helpers'=>Helper::all(), 'drivers'=>Driver::all()]);
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
        $cargos = new Cargo;
        $cargos->origin = $request->origin;
        $cargos->destination = $request->destination;
        $cargos->route = $request->route;
        $cargos->trucktype = $request->trucktype;
        $cargos->cargoname = $request->cargoname;
        $cargos->driver_id = $request->driver;
        $cargos->helper_id = $request->helper;
        $cargos->remarks = $request->remarks;
        $cargos->save();
        return redirect()->route('cargos.index')->with('success', 'Cargo Rates Has Been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show(Cargo $cargo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function edit(Cargo $cargo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cargo $cargo)
    {
        $cargo->origin = $request->origin;
        $cargo->destination = $request->destination;
        $cargo->route = $request->route;
        $cargo->trucktype = $request->trucktype;
        $cargo->cargoname = $request->cargoname;
        $cargo->driver_id = $request->driver;
        $cargo->helper_id = $request->helper;
        $cargo->remarks = $request->remarks;
        $cargo->save();
        return redirect()->route('cargos.index')->with('success', 'Cargo Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
        return redirect()->route('cargos.index')->with('success', 'Cargo Has Been Deleted Successfully');
    }
}
