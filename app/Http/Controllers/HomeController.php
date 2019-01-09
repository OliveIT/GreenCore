<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function editPhone() {
        return view('profile.phone');
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
