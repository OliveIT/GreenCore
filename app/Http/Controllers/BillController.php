<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use App\Models\Geonames;
use App\Models\SwitchAccount;
use App\Models\UtilityCompany;
use Illuminate\Support\Facades\Auth;

use Session;

class BillController extends Controller
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
        $data = Invoices::getFromClientId(Session::get("switchaccount")->id)->data;
        return view("bill.index", array(
            "data" => $data
        ));
    }
    
    public function viewBill()
    {
        return view("bill.view");
    }
    
    public function payment()
    {
        return view("bill.payment");
    }
}