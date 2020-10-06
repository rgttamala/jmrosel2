<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\Deduction;
use App\Driver;
use App\DriverPayroll;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DriverPayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all();
        return view('admin.payroll')->with('drivers', $drivers);
    }

    public function payrollIndex($id){

        $driver = Driver::findOrFail($id);
        $payroll = Deduction::all();
        
        $payrolldetails = DB::table('driver_rates')
        ->leftJoin('driver_payroll', 'driver_rates.payroll_id', 'driver_payroll.id')
        ->select('driver_payroll.*','driver_rates.*')
        ->where('driver_payroll.id', 'driver_rates.payroll_id')
        ->get();
      
        return view('admin.driver_payroll_index')
        ->with('driver', $driver)
        ->with('payroll', $payroll)
        ->with('payrolldetails', $payrolldetails);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id){
        $driver = Driver::findOrFail($id);
       
        $cargos = Cargo::all();
        $transaction = Transaction::all();        
        return view('admin.driver_payroll_create')
        ->with('transaction', $transaction)
        ->with('cargos', $cargos)
        ->with('driver', $driver);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id){
                
        $deductions = new Deduction();
        $deductions->sss = $request->sss;
        $deductions->philhealth = $request->philhealth;
        $deductions->dateissued = $request->dateissued;
        $deductions->payperiodstart = $request->payperiodstart;
        $deductions->payperiodend = $request->payperiodend;
        $deductions->deduction = $request->deduction;
        $deductions->deductionremarks = $request->deductionremarks;
        $deductions->totalcashadvance = 0;
        $deductions->totalrates = 0;
        $deductions->subtotal = 0;
        $deductions->totalpayroll = 0;
        $deductions->driver_id = $id;
        $deductions->save();
        $driverratesId = $deductions->id;
          
        foreach ($request->cargo as $key => $cargo) {
            $data = new DriverPayroll();
            $data->payroll_id = $driverratesId;
            $data->cargo = $cargo;
            $data->trip = $request->trip[$key];
            $data->datetrip = $request->tripdate[$key];
            $data->cargo = $request->cargo[$key];
            $data->rate = $request->rate[$key];
            $data->cashadvance = $request->cashadvance[$key];
            $data->datecashadvance = $request->datecashadvance[$key];
            $data->save();
         }

         $totalRates = DB::table('driver_rates')
         ->leftJoin('driver_payroll', 'driver_rates.payroll_id', 'driver_payroll.id')
         ->select('driver_payroll.*','driver_rates.*')
         ->where('payroll_id', '=', $driverratesId)
         ->sum('rate');

         $totalcashadvance = DB::table('driver_rates')
         ->leftJoin('driver_payroll', 'driver_rates.payroll_id', 'driver_payroll.id')
         ->select('driver_payroll.*','driver_rates.*')
         ->where('payroll_id', '=', $driverratesId)
         ->sum('cashadvance');
         
         $subtotal = $totalRates - $totalcashadvance;
        
         $storeTotalRates = Deduction::find($driverratesId);
         $totalpayroll = $subtotal - $storeTotalRates->sss - $storeTotalRates->philhealth - $storeTotalRates->deduction;
         $storeTotalRates->totalrates = $totalRates;
         $storeTotalRates->totalcashadvance = $totalcashadvance;
         $storeTotalRates->subtotal = $subtotal;
         $storeTotalRates->totalpayroll = $totalpayroll;
         
         $storeTotalRates->save();
     
         return redirect()->route('driverpayrolls.show',['id'=>$id])->with('success', 'Payroll Driver Has Been Created Successfully');

    }

    public function receipt($id){
        
        $payrollId = $id;
        $driverpayroll = DriverPayroll::findOrFail($id);
        $payroll = Deduction::all();

       
        $payrolldetails = DB::table('driver_rates')
        ->leftJoin('driver_payroll', 'driver_rates.payroll_id', 'driver_payroll.id')
        ->select('driver_payroll.*','driver_rates.*')
        ->where('driver_payroll.id', '=', $payrollId)
        ->get();

        return view('admin.driver_payroll_receipt')
        ->with('payrolldetails', $payrolldetails)
        ->with('payroll', $payroll)
        ->with('driverpayroll', $driverpayroll);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\DriverPayroll  $driverPayroll
     * @return \Illuminate\Http\Response
     */
    public function show(DriverPayroll $driverPayroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DriverPayroll  $driverPayroll
     * @return \Illuminate\Http\Response
     */
    public function edit(DriverPayroll $driverPayroll)
    {
        return 'hi';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DriverPayroll  $driverPayroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DriverPayroll $driverPayroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DriverPayroll  $driverPayroll
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriverPayroll $driverPayroll)
    {
        //
    }
}
