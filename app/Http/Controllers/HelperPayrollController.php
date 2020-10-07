<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\Helper;
use App\HelperPayroll;
use App\HelperRates;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelperPayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function payrollIndex($id){

        $helper = Helper::findOrFail($id);

        $payroll = HelperPayroll::all();
        
        $payrolldetails = DB::table('helper_rates')
        ->leftJoin('helper_payroll', 'helper_rates.payroll_id', 'helper_payroll.id')
        ->select('helper_payroll.*','helper_rates.*')
        ->where('helper_payroll.id', 'helper_rates.payroll_id')
        ->get();

        return view('admin.helper_payroll_index')
        ->with('helper', $helper)
        ->with('payroll', $payroll)
        ->with('payrolldetails', $payrolldetails);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id){
        $helper = Helper::findOrFail($id);
        $cargos = Cargo::all();
        $transaction = Transaction::all();        
        return view('admin.helper_payroll_create')
        ->with('transaction', $transaction)
        ->with('cargos', $cargos)
        ->with('helper', $helper);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id){
        
        $deductions = new HelperPayroll();
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
        $deductions->helper_id = $id;
        $deductions->save();
        $helperratesId = $deductions->id;
          
        foreach ($request->cargo as $key => $cargo) {
            $data = new HelperRates();
            $data->payroll_id = $helperratesId;
            $data->cargo = $cargo;
            $data->trip = $request->trip[$key];
            $data->datetrip = $request->tripdate[$key];
            $data->cargo = $request->cargo[$key];
            $data->rate = $request->rate[$key];
            $data->cashadvance = $request->cashadvance[$key];
            $data->datecashadvance = $request->datecashadvance[$key];
            $data->save();
         }

         $totalRates = DB::table('helper_rates')
         ->leftJoin('helper_payroll', 'helper_rates.payroll_id', 'helper_payroll.id')
         ->select('helper_payroll.*','helper_rates.*')
         ->where('payroll_id', '=', $helperratesId)
         ->sum('rate');

         $totalcashadvance = DB::table('helper_rates')
         ->leftJoin('helper_payroll', 'helper_rates.payroll_id', 'helper_payroll.id')
         ->select('helper_payroll.*','helper_rates.*')
         ->where('payroll_id', '=', $helperratesId)
         ->sum('cashadvance');
         
         $subtotal = $totalRates - $totalcashadvance;
        
         $storeTotalRates = HelperPayroll::find($helperratesId);
         $totalpayroll = $subtotal - $storeTotalRates->sss - $storeTotalRates->philhealth - $storeTotalRates->deduction;
         $storeTotalRates->totalrates = $totalRates;
         $storeTotalRates->totalcashadvance = $totalcashadvance;
         $storeTotalRates->subtotal = $subtotal;
         $storeTotalRates->totalpayroll = $totalpayroll;
         
         $storeTotalRates->save();
     
        
        
         return redirect()->route('helperpayrolls.show',['id'=>$id])->with('success', 'Payroll Helper Has Been Created Successfully');

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

    public function receipt($id){
        
        $payrollId = $id;
        $helperpayroll = HelperRates::findOrFail($id);
        $payroll = HelperPayroll::all();

       
        $payrolldetails = DB::table('helper_rates')
        ->leftJoin('helper_payroll', 'helper_rates.payroll_id', 'helper_payroll.id')
        ->select('helper_payroll.*','helper_rates.*')
        ->where('helper_payroll.id', '=', $payrollId)
        ->get();

        return view('admin.helper_payroll_receipt')
        ->with('payrolldetails', $payrolldetails)
        ->with('payroll', $payroll)
        ->with('helperpayroll', $helperpayroll);
        
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
