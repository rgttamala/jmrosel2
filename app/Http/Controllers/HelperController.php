<?php

namespace App\Http\Controllers;

use App\Helper;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.helper')->with(['helpers'=>Helper::all()]);
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
        $helpers = new Helper;
        $helpers->helpername = $request->helpername;
        $helpers->sss = $request->sss;
        $helpers->philhealth = $request->philhealth;
        $helpers->save();

        return redirect()->route('helpers.index')->with('success', 'Helper Has Been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function show(Helper $helper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function edit(Helper $helper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Helper $helper)
    {
        $helper->helpername = $request->helpername;
        $helper->sss = $request->sss;
        $helper->philhealth = $request->philhealth;
        $helper->save();
        return redirect()->route('helpers.index')->with('success', 'Helper Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Helper $helper)
    {
        $helper->delete();
        return redirect()->route('helpers.index')->with('success', 'Helper Has Been Deleted Successfully');
    
    }
}
