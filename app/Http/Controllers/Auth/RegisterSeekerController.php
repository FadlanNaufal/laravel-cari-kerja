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

class RegisterSeekerController extends Controller
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
    protected $redirectTo = 'seeker.home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:seeker');
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
   

    protected function createSeeker(Request $request)
    {
        $this->validator($request->all())->validate();
       
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
        $newName = "Seeker-". $request->name . '-' . Date('y-m-d') . '.' . $ext;
        $file->move('upload/seeker',$newName);
        $seeker->profile_picture = $newName;
        $seeker->save();
        
        return redirect()->intended('login/seeker');
    }



    public function showSeekerRegisterForm()
    {
        return view('auth.register-seeker');
    }
}
