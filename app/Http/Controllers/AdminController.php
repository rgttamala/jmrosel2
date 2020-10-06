<?php

namespace App\Http\Controllers;

use App\User;
use App\Latetime;
use App\Attendance;
use App\Driver;
use App\Helper;
use App\Payroll;
use App\Transaction;

class AdminController extends Controller
{

    /**
     * Display a listing of the attendance.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalEmp =  count(user::all());
        $helpers = count(Helper::all());
        $drivers = count(Driver::all());
        $payrolls = Payroll::take(5)->get();
        $transactions = Transaction::take(5)->get();
        $AllAttendance = count(Attendance::whereAttendance_date(date("Y-m-d"))->get());
        $ontimeEmp = count(Attendance::whereAttendance_date(date("Y-m-d"))->whereStatus('1')->get());
        $latetimeEmp = count(Attendance::whereAttendance_date(date("Y-m-d"))->whereStatus('0')->get());
        if($AllAttendance > 0){
        $percentageOntime = str_split(($ontimeEmp/ $AllAttendance)*100, 4)[0];
        }else {
            $percentageOntime = 0 ;
        }

        
        
        $data = [$totalEmp-1, $helpers, $drivers, $ontimeEmp, $latetimeEmp, $percentageOntime];
        return view('admin.index')
        ->with('payrolls', $payrolls)
        ->with('transactions', $transactions)
        ->with(['data' => $data]);
    }

}
