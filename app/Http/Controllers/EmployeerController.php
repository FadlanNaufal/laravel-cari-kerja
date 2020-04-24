<?php

namespace App\Http\Controllers;

use App\Employeer;
use Illuminate\Http\Request;
use Auth;

class EmployeerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.employeer.index',[
            'employeer' => Auth::guard('employeer')->user()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employeer  $employeer
     * @return \Illuminate\Http\Response
     */
    public function show(Employeer $employeer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employeer  $employeer
     * @return \Illuminate\Http\Response
     */
    public function edit(Employeer $employeer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employeer  $employeer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employeer $employeer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employeer  $employeer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employeer $employeer)
    {
        //
    }
}
