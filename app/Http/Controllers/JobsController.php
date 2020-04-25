<?php

namespace App\Http\Controllers;

use App\Jobs;
use App\Category;
use Illuminate\Http\Request;
use Auth;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guard('employeer')->check()){
            return view('pages.employeer.job.index',[
                'job' => Jobs::where('id_employeer',Auth::guard('employeer')->user()->id)->get()
            ]);
        }else if(Auth::guard('web')->check()){
            return view('pages.admin.job.index',[
                'job' => Jobs::where('id_admin',Auth::user()->id)->get()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::guard('web')->check()){
            return view('pages.admin.job.create',[
                'category' => Category::all()
            ]);
        }else if(Auth::guard('employeer')->check()){
            return view('pages.employeer.job.create',[
                'category' => Category::all()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::guard('web')->check()){
    
          
                $jobs = new Jobs();
                $jobs->id_employeer = null;
                $jobs->id_admin = Auth::user()->id;
                $jobs->id_category = $request->id_category;
                $jobs->name = $request->name;
                $jobs->position = $request->position;
                $jobs->desc = $request->desc;
                $jobs->salary = $request->salary;
                $jobs->place = $request->place;
                $jobs->open_at = Date('y-m-d');
                $jobs->close_at = $request->close_at;
                $jobs->save();
                return redirect()->route('job.index');
    
           
        }else if(Auth::guard('employeer')->check()){
           
                $jobs = new Jobs();
                $jobs->id_employeer = Auth::guard('employeer')->user()->id;
                $jobs->id_admin = null;
                $jobs->id_category = $request->id_category;
                $jobs->name = $request->name;
                $jobs->position = $request->position;
                $jobs->desc = $request->desc;
                $jobs->salary = $request->salary;
                $jobs->place = $request->place;
                $jobs->open_at = Date('y-m-d');
                $jobs->close_at = $request->close_at;
                $jobs->save();
                return redirect()->route('job.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show(Jobs $jobs)
    {
        return view('pages.seeker.job.detail',[
            'jobs' => Jobs::where('id',$jobs->id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function edit(Jobs $jobs)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jobs $jobs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jobs $jobs)
    {
        //
    }
}
