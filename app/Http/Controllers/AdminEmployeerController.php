<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employeer;
use Illuminate\Support\Facades\Validator;
use Hash;

class AdminEmployeerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.employeer.index',[
            'emp' => Employeer::all()
        ]);
    }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //         'gender'=>['required'],
    //         'address'=>['required'],
    //         'phone'=>['required'],
    //         'bio'=>['required'],
    //         'profile_picture'=>['required']
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.employeer.create');
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
            $employeer = new Employeer();
            $employeer->name = $request->name;
            $employeer->email = $request->email;
            $employeer->password = Hash::make($request->password);
            $employeer->gender = $request->gender;
            $employeer->address = $request->address;
            $employeer->phone = $request->phone;
            $employeer->bio = $request->bio;
            $employeer->address = $request->address;

            $file = $request->profile_picture;
            $ext = $file->getClientOriginalExtension();
            $newName = "Employeer-". $request->name . '-' . Date('y-m-d') . '.' . $ext;
            $file->move('upload/employeer',$newName);
            $employeer->profile_picture = $newName;
            $employeer->save();
            return redirect()->route('adminemployeer.index');

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
        return view('pages.admin.employeer.edit',[
            'emp' => Employeer::where('id',$id)->first()
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
            $emp = Employeer::where('id',$id)->first();
                        
            $emp->name = $request->name;
            $emp->email = $request->email;
            $emp->gender = $request->gender;
            $emp->address = $request->address;
            $emp->phone = $request->phone;
            $emp->bio = $request->bio;
            $emp->address = $request->address;

            $file = $request->profile_picture;
            $ext = $file->getClientOriginalExtension();
            $newName = "Employeer-". $request->name . '-' . Date('y-m-d') . '.' . $ext;
            $file->move('upload/employeer',$newName);
            $emp->profile_picture = $newName;
            $emp->update();

        }else{
            Employeer::where('id',$id)->update($request->except('_method','_token','profile_picture'));
        }

        return redirect()->route('adminemployeer.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp = Employeer::where('id',$id)->first();
        $emp->delete();
        return back();
    }
}
