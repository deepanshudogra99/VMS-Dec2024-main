<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\State;
use App\Models\District;
use App\Models\Office;
use App\Models\UserType;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class RegisterController extends Controller
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
  protected $redirectTo = '/home';

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest');
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
      'statecode' => ['required'],
      'districtcode' => ['required'],
      'officecode' => ['required'],
      'usertypecode' => ['required'],
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'email', 'unique:users,email', 'max:255'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
    ], [
      'statecode.required' => 'State Name is Required!',
      'districtcode.required' => 'District Name is Required!',
      'officecode.required' => 'Office Name is Required!',
      'usertypecode.required' => 'User Type is Required!',
      'name.required' => 'User Name is Required!',
      'email.required' => 'User Email is Required!',
      'email.email' => 'Enter Correct Email Address!',
      'password.required' => 'Password is Required!',
      'password.min' => 'Password Should be Minimum 8 Characters!',
      'password.confirmed' => 'Password and Confirm Password Do Not Match!'
    ]);
  }



  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\Models\User
   */
  protected function create(array $data)
  {
    return User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => Hash::make($data['password']),
    ]);
  }



  public function getDistricts(Request $request)
  {
    //dd($request);
    $data['districts'] = District::where('statecode', $request->state_id)->get(['districtcode', 'districtname']);
    return response()->json($data);
  }

  public function showRegistrationForm()
  {
    $states = State::all(['statecode', 'statename']);
    $districts = District::all(['districtcode', 'districtname']);
    $offices = Office::all(['officecode', 'officename']);
    $userTypes = UserType::all(['usertypecode', 'usertypename']);

    return view('auth.register', compact('states', 'districts', 'offices', 'userTypes'))
      ->with('success', 'User Registered Successfully');
  }

  public function register(Request $request)
  {
    $states = State::all(['statecode', 'statename']);
    $districts = District::all(['districtcode', 'districtname']);
    $offices = Office::all(['officecode', 'officename']);
    $userTypes = UserType::all(['usertypecode', 'usertypename']);
    //dd($request->name);
    $request->validate([
      'statecode' => 'required',
      'districtcode' => 'required',
      'officecode' => 'required',
      'usertypecode' => 'required',
      'name' => 'required',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|confirmed|min:8',
    ], [
      "statecode" => 'State Name is Required !',
      "districtcode" => 'District Name is Required !',
      "officecode" => 'Office Name is Required !',
      "usertypecode" => 'User Type is Required !',
      "name.required" => 'User Name is Required !',
      "email.required" => 'User Email is Required !',
      "email.email" => 'Enter Correct Email Address !',
      "password.required" => 'Password is Required !',
      "password.min" => 'Password Should be Minimum 8 Characters !',
      "password.confirmed" => 'Password and Confirm Password Does Not Match !'
    ]);

    $user = new User();

    $user->statecode = $request->statecode;
    $user->districtcode = $request->districtcode;
    $user->officecode = $request->officecode;
    $user->usertypecode = $request->usertypecode;

    if ($request->usertypecode == '1') {
      $user->userrole = '1';
    } elseif ($request->usertypecode == '2') {
      $user->userrole = '2';
    }

    $user->name = strtoupper($request->name);
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();

    $lastUser = User::latest()->first();
    if ($lastUser) {
      $lastUser->update(['userid' => 'Usr' . (string) $lastUser->id]);
    } else {
      echo "No user records found.";
    }
    //return view('auth.register')->with('success', 'User Registered successfully');
    return view('auth.register', compact('states', 'districts', 'offices', 'userTypes'))->with('success', 'User Registered successfully');
  }





}
