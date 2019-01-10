<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Validator;
use Redirect;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Models\Geonames;
use App\Models\SwitchAccount;
use App\Models\UtilityCompany;

use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function profile() {
        $accounts = SwitchAccount::findCurrentSwitch();
        return view('profile.index', ['accounts' => $accounts]);
    }

    public function editPassword() {
        return view('profile.password');
    }

    public function changePassword(Request $request) {
        $rules = array(
            'old_password'          => 'required|min:5',
            'password'              => 'required|min:5|different:old_password',
            'confirm_password'      => 'required|min:5|required_with:password'
        );
        
        $validator = Validator::make(Input::only('old_password', 'password', 'confirm_password'), $rules);                  

        $old_password   = Input::get('old_password');
        $password   = Input::get('password');
        $confirm_password   = Input::get('confirm_password');

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } if ($password != $confirm_password) {
            return Redirect::back()->withErrors(['confirm_password' => 'Confirm password dismatch.']);
        } elseif (Hash::check($old_password, Auth::user()->password)) {
            $user = Auth::User();
            $user->password = Hash::make($password);
            $user->save();
            return redirect('profile');
        } else  {
            return Redirect::back()->withErrors(['old_password' => 'Old password is incorrect.']);
        }
    }

    public function editPhone() {
        return view('profile.phone');
    }

    public function changePhone(Request $request) {
        $rules = array(
            'phone_number' => 'required|regex:/(01)[0-9]{9}/'
        );
        
        $validator = Validator::make(Input::only('phone_number'), $rules);

        $phone_number = Input::get('phone_number');

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $user = Auth::User();
            $user->phone_number = $phone_number;
            $user->save();
            return redirect('profile');
        }
    }

    public function editService() {
        $defaultData = [
            'street' => '',
            'city' => '',
            'state' => '',
            'zipcode' => '',
            'utility_company_id' => '',
            'utility_user' => '',
        ];

        $geonames = Geonames::getStates();
        $utilityCompanies = UtilityCompany::all(['id', 'name']);

        return view('profile.service', [
            'data' => $defaultData,
            'geonames' => $geonames,
            'utility_company' => $utilityCompanies
        ]);
    }
}
