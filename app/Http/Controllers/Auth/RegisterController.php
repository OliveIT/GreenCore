<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Jobs\SendVerificationEmail;

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'email_token' => base64_encode($data['email']),
            'user_role'=>"user"
        ]);
    }

    /**
     * Handle a registration request for the application
     */

     public function register(Request $request) 
     {
        $this->validator($request->all())->validate();
//Only for test mode.
        event(new Registered($user = $this->create($request->all())));

//        dispatch(new SendVerificationEmail($user));

//        return view('verification');


//        $user = $this->create($request->all());
        return view('email.verify_account')->with([
            'email_token'=>$user->email_token
        ]);
 
     }

     /**
      * registration request for the applicatio
      */

      public function verify($token)
      {
        //  dd($token);
        $user = User::where('email_token', $token)->first();
        $user->verified = 1;

        if($user->save()){
            return view('emailconfirm', ['user' => $user]);
        }
      }
}
