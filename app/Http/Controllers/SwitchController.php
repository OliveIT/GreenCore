<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use App\Models\SwitchAccount;
use App\Models\UtilityCompany;
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
        return view("switch.view", ['switchAccounts' => $accounts]);
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

        $utilityCompanies = UtilityCompany::all(['id', 'name']);

        return view("switch.add", [
            'data' => $defaultData,
            'utility_company' => $utilityCompanies
        ]);
    }

    public function addAccount(Request $request) {
        $client = new SwitchAccount();

        $client->street = $request->input('street');
        $client->city = $request->input('city');
        $client->state = $request->input('state');
        $client->zipcode = $request->input('zipcode');
        $client->utility_company_id = $request->input('utility_company_id');
        $client->utility_user = $request->input('utility_user');
        $client->utility_password = $request->input('utility_password');
    }
}