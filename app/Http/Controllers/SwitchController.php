<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use App\Models\SwitchAccount;
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
}