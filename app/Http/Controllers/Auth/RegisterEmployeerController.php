<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Employeer;
use App\Seeker;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterEmployeerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'employeer.home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:employeer');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender'=>['required'],
            'address'=>['required'],
            'phone'=>['required'],
            'bio'=>['required'],
            'profile_picture'=>['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function createEmployeer(Request $request)
    {
        $this->validator($request->all())->validate();
       
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
        
        return redirect()->intended('login/employeer');
    }


    public function showEmployeerRegisterForm()
    {
        return view('auth.register-employeer');
    }

}
