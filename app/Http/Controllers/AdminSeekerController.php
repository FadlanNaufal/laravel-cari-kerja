<?php

namespace App\Http\Controllers;

use App\Seeker;
use Illuminate\Http\Request;
use Hash;

class AdminSeekerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.seeker.index',[
            'seek' => Seeker::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.seeker.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validateWithBag('post', [
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'gender'=>['required'],
            'address'=>['required'],
            'phone'=>['required'],
            'bio'=>['required'],
            'profile_picture'=>['required']
        ]);

        if($validatedData){
            $seeker = new Seeker();
            $seeker->name = $request->name;
            $seeker->email = $request->email;
            $seeker->password = Hash::make($request->password);
            $seeker->gender = $request->gender;
            $seeker->address = $request->address;
            $seeker->phone = $request->phone;
            $seeker->bio = $request->bio;
            $seeker->address = $request->address;

            $file = $request->profile_picture;
            $ext = $file->getClientOriginalExtension();
            $newName = "seeker-". $request->name . '-' . Date('y-m-d') . '.' . $ext;
            $file->move('upload/seeker',$newName);
            $seeker->profile_picture = $newName;
            $seeker->save();
            return redirect()->route('adminseeker.index');

        }else{
            return back();
        }
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.admin.seeker.edit',[
            'seek' => Seeker::where('id',$id)->first()
        ]);
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
        if($request->hasFile('profile_picture'))
        {
            $seeker = Seeker::where('id',$id)->first();
                        
            $seeker->name = $request->name;
            $seeker->email = $request->email;
            $seeker->gender = $request->gender;
            $seeker->address = $request->address;
            $seeker->phone = $request->phone;
            $seeker->bio = $request->bio;
            $seeker->address = $request->address;

            $file = $request->profile_picture;
            $ext = $file->getClientOriginalExtension();
            $newName = "Seeker-". $request->name . '-' . Date('y-m-d') . '.' . $ext;
            $file->move('upload/seeker',$newName);
            $seeker->profile_picture = $newName;
            $seeker->update();

        }else{
            Seeker::where('id',$id)->update($request->except('_method','_token','profile_picture'));
        }

        return redirect()->route('adminseeker.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp = Seeker::where('id',$id)->first();
        $emp->delete();
        return back();
    }
}
