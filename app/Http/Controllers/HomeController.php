<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Validator;
use Redirect;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Models\Geonames;
use App\Models\Referral;
use App\Models\SwitchAccount;
use App\Models\UtilityCompany;

use Session;
use App\InvNinja\Clients;
use App\InvNinja\Invoices;

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
        $invoices = Invoices::getFromClientId(Session::get("switchaccount")->id)->data;
        $sumEnergy = 0;
        $invGraphData = array();
        $curYear = date("Y") - 1;
        $curMonth = date("n") + 1;

        for ($i = 0; $i < 12; $i ++) {
            $zeroStr = "";
            
            if ($curMonth == 13) {
                $curMonth = 1;
                $curYear ++;
            }
            if ($curMonth < 10) $zeroStr = "0";

            $newDate = sprintf('%d-%s%d', $curYear, $zeroStr, $curMonth);
            $invGraphData [$newDate] = 0;
            $curMonth ++;
        }

        foreach ($invoices as $invoice) {
            if (!$invoice->custom_text_value2) continue;

            $sumEnergy += $invoice->custom_text_value2;
            $date = substr($invoice->invoice_date, 0, 7);

            if (isset($invGraphData [$date]))
                $invGraphData [$date] += $invoice->custom_text_value2;
        }

        $referrals = Referral::getReffersById(Session::get("switchaccount")->id);
        return view('home', array(
            "energy" => $sumEnergy,
            "referrals" => $referrals,
            "invGraphData" => $invGraphData
        ));
    }

    public function profile() {
        $account = Session::get('switchaccount');
        $accounts = Clients::getClientFromEmail(auth()->user()->email)->data;
        return view('profile.index', [
            'accounts'=> $accounts,
            'account' => $account]);
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
        $geonames = Geonames::getStates();
        $utilityCompanies = UtilityCompany::all(['id', 'name']);

        return view('profile.service', [
            'data' => Session::get('switchaccount'),
            'geonames' => $geonames,
            'utility_company' => $utilityCompanies
        ]);
    }

    public function editAccount(Request $request) {
        $client = Session::get('switchaccount');
        $client->name = $request->input('name');
        $client->address1 = $request->input('address1');
        $client->address2 = $request->input('address2');
        $client->city = $request->input('city');
        $client->state = $request->input('state');
        $client->postal_code = $request->input('postal_code');
        
        $data = Clients::updateClient(Session::get('switchaccount')->id, $client)->data;
        Session::put('switchaccount', $data);
        return redirect('profile');
    }

    public function logout() {
        if (Auth::User() == null)
            return redirect("/");
        if (Auth::User()->user_role != "Admin") {
            Auth::logout();
            Session::forget("switchaccount");

            $admin = Session::get("adminaccount");
            if ($admin && $admin->user_role == "Admin") {
                Auth::login($admin);
                return redirect("user/view");
            }
            return redirect("/");
        } else {
            Auth::logout();
            Session::forget("switchaccount");
            Session::forget("adminaccount");
            return redirect("/");
        }
    }
}
