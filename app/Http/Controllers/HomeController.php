<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Geonames;
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
        return view('profile.index');
    }

    public function editProfile() {
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

        return view('profile.edit', [
            'data' => $defaultData,
            'geonames' => $geonames,
            'utility_company' => $utilityCompanies
        ]);
    }
}
