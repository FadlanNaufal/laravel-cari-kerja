<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Seeker;
use App\Jobs;
use Auth;

use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guard('seeker')->check()){
            $app = Applicant::where('id_applicant',Auth::guard('seeker')->user()->id)->get();
            return view('pages.seeker.applicant.index',compact('app'));
        }else{
            $app = Applicant::with('Job.Employeer')->where('id',Auth::guard('employeer')->user()->id)->get();
            return $app;
        }
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
        $app = new Applicant;
        $app->id_applicant = \Auth::guard('seeker')->user()->id;
        $app->id_job = $request->id_job;
        $file = $request->cv;

        $ext = $file->getClientOriginalExtension();
        $newName = 'PDF-Applicant-'. \Auth::guard('seeker')->user()->name. '.' .$ext;
        $file->move('upload/apply/pdf',$newName);

        $app->cv = $newName;
        $app->save();

        return redirect()->route('seeker.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.seeker.job.apply',[
            'jobs' => Jobs::where('id',$id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}
