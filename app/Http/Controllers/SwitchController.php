<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use App\Models\Geonames;
use App\Models\SwitchAccount;
use App\Models\UtilityCompany;
use Illuminate\Support\Facades\Auth;

use Session;

class SwitchController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = SwitchAccount::findCurrentSwitch();
        return view("switch.view", ['accounts' => $accounts]);
    }

    public function add() {
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

        return view("switch.add", [
            'data' => $defaultData,
            'geonames' => $geonames,
            'utility_company' => $utilityCompanies
        ]);
    }

    public function addAccount(Request $request) {
        $client = new SwitchAccount();

        $client->user_id = Auth::User()->id;
        $client->street = $request->input('street');
        $client->city = $request->input('city');
        $client->state = $request->input('state');
        $client->zipcode = $request->input('zipcode');
        $client->utility_company_id = $request->input('utility_company_id');
        $client->utility_user = $request->input('utility_user');
        $client->utility_password = $request->input('utility_password');

        $client->save();

        $user = Auth::user();
        $user->switch_account_id = $client->id;
        $user->save();

        Session::put('switchaccount', $client);

        return redirect('/home');
    }

    public function set($id = 0) {
        if (!$id)
            return redirect('/switch');

        $user = Auth::user();
        $user->switch_account_id = $id;
        $user->save();

        $switchAccount = SwitchAccount::find($id);
        Session::put('switchaccount', $switchAccount);

        return redirect('/home');
    }
}