<?php

namespace App\Http\Controllers;

use Auth;
use App\Seeker;
use Illuminate\Http\Request;

class SeekerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.seeker.index',[
            'seeker'=>Auth::guard('seeker')->user()
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
     * @param  \App\Seeker  $seeker
     * @return \Illuminate\Http\Response
     */
    public function show(Seeker $seeker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seeker  $seeker
     * @return \Illuminate\Http\Response
     */
    public function edit(Seeker $seeker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seeker  $seeker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seeker $seeker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seeker  $seeker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seeker $seeker)
    {
        //
    }
}
