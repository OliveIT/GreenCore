<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use App\Models\Geonames;
use App\Models\SwitchAccount;
use App\Models\UtilityCompany;
use Illuminate\Support\Facades\Auth;

use Session;
use App\InvNinja\Invoices;

class UsageController extends Controller
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

        $totalData = array();
        $curYear = date("Y");
        $curMonth = date("n");

        for ($i = 0; $i < 12; $i ++) {
            $zeroStr = "";
            if ($curMonth < 10) $zeroStr = "0";

            $newDate = sprintf('%d-%s%d', $curYear, $zeroStr, $curMonth);
            $totalData [$newDate] = 0;
            $curMonth --;
            if ($curMonth == 0) {
                $curMonth = 12;
                $curYear --;
            }
        }

        $invData = array();
        foreach ($data as $item) {
            $invDate = substr($item->invoice_date, 0, 7);
            if (isset($totalData [$invDate]))
                $totalData [$invDate] += ($item->custom_text_value2 ? (float)$item->custom_text_value2 : 0);
        }
        return view("usage.index", array("invData" => $totalData));
    }
}