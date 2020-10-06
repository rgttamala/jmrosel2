<?php

namespace App\Http\Controllers;

use App\Payroll;
use App\User;
use App\Rate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users = User::all();
       return view('admin.payroll')->with('users', $users);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id){
        $employee = User::findOrFail($id);
        
         $rates = DB::table('users')
         ->join('rates', 'users.rates_id', 'rates.id')
         ->select('rates.*', 'users.*')
         ->where('users.id', '=', $id)
         ->get();

        return view('payroll.create')
        ->with('employee',$employee)
        ->with('rates', $rates);
       
    }


    public function payrollIndex($id){
		$employee = User::findOrFail($id);
        return view('payroll.payroll')->with('employee',$employee);
    }

   


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id){
    {   
        $userId = $id;
        $payroll = new Payroll();
        $payroll->payperiodstart = $request->payperiodstart;
        $payroll->payperiodend = $request->payperiodend;
        $payroll->workedhours = $request->workedhours;
        $payroll->cashadvance = $request->cashadvance;
        $payroll->salary = $request->salary;
        $payroll->sss = $request->sss;
        $payroll->philhealth = $request->philhealth;
        $payroll->deductions = $request->deductions;
        $payroll->deductionremarks = $request->deductionremarks;
        $payroll->subtotal = $request->subtotal;
        $payroll->status = $request->status;
        $payroll->dateissued = $request->dateissued;
        $payroll->user_id = $userId;
        $total = $request->salary - $request->sss - $request->philhealth - $request->deductions - $request->cashadvance;
        $payroll->subtotal = $total;
        $payroll->save();
        return redirect()->route('payrolls.show',['id'=>$id])->with('success', 'Payroll Employee Has Been Created Successfully');
    }

    

    
}
         
         

    /**
     * Display the specified resource.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function show(Payroll $payroll)
    {
       
    }

    public function receipt($id){
        $payroll = Payroll::findOrFail($id);
        return view('payroll.receipt')->with('payroll',$payroll);
    }

    public function edit($id){
        $payroll = Payroll::findOrFail($id);
        return view('payroll.edit')->with('payroll',$payroll);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function AddPayroll(Request $request, $id){

        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    

    public function update(Request $request, $id)
{
        $userId = $id;
        $payroll = Payroll::findOrFail($id);
        $payroll->payperiodstart = $request->payperiodstart;
        $payroll->payperiodend = $request->payperiodend;
        $payroll->workedhours = $request->workedhours;
        $payroll->cashadvance = $request->cashadvance;
        $payroll->salary = $request->salary;
        $payroll->sss = $request->sss;
        $payroll->philhealth = $request->philhealth;
        $payroll->deductions = $request->deductions;
        $payroll->deductionremarks = $request->deductionremarks;
        $payroll->subtotal = $request->subtotal;
        $payroll->status = $request->status;
        $payroll->dateissued = $request->dateissued;
        $total = $request->salary - $request->sss - $request->philhealth - $request->deductions - $request->cashadvance;
        $payroll->subtotal = $total;
        $payroll->user_id = $userId;
        $payroll->update();
        return redirect()->route('payrolls.show',['id'=>$id])->with('success', 'Payroll Employee Has Been Created Successfully');		
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payroll $payroll)
    {
        //
    }
}
