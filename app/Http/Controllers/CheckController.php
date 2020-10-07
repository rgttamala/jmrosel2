<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Check;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CheckController extends Controller
{
    /**
     * Display a listing of the attendance.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $checks = DB::table('attendances')
        ->join('users', 'attendances.user_id', '=', 'users.id')
        ->join('leaves', 'leaves.user_id', '=', 'users.id')
        ->select('users.name','attendances.*', 'leaves.*')
        ->get();

        //Y-m-d H:s:i date time format
        foreach ($checks as $key => $value) {
            $to = \Carbon\Carbon::createFromFormat('H:s:i', $value->leave_time);
            $from = \Carbon\Carbon::createFromFormat('H:s:i', $value->attendance_time);
            //$timeout = strtotime($value->leave_time);
        } 

        $hours = $to->diffInHours($from);
        // print_r($diff_in_minutes);

        
       return view('admin.check')
       ->with('checks', $checks)
       ->with('hours', $hours);
        
    }

}
