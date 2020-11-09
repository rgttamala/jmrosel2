<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\Transaction;
use Illuminate\Http\Request;

class TransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.trans')->with([
            'transactions'=> Transaction::orderBy('traveldate', 'DESC')->get(), 
            'cargos'=>Cargo::all()
        ]);
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
        $transactions = new Transaction;
        $transactions->traveldate = $request->traveldate;
        $transactions->cargo_id = $request->cargo;
        $transactions->docs = $request->docs;
        $transactions->trucking = $request->trucking;
        $transactions->platenumber = $request->platenumber;
        $transactions->client_rate = $request->client_rate;
        $transactions->subcon_rate = $request->subcon_rate;
        $transactions->remarks = $request->remarks;


        $transactions->client_partial = $request->client_partial;
        $transactions->client_full = $request->client_full;
        $transactions->subcon_partial = $request->subcon_partial;
        $transactions->subcon_full = $request->subcon_full;
        
        if ($transactions->client_partial == 'Unpaid') {
           $transactions->client_balance = $transactions->client_rate;
        }

        if ($transactions->subcon_partial == 'Unpaid') {
            $transactions->subcon_balance = $transactions->subcon_rate;
        }


        $transactions->save();
        

        return redirect()->route('trans.index')->with('success', 'Cargo Transactions Has Been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
