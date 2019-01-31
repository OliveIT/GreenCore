<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use App\Models\Geonames;
use App\Models\SwitchAccount;
use App\Models\UtilityCompany;
use Illuminate\Support\Facades\Auth;

use Session;
use App\InvNinja\Clients;

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

        $this->middleware(function ($request, $next) {
            if (Auth::user()->user_role == "Admin")
                return redirect('/user/view');

            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Clients::getClientFromEmail(auth()->user()->email);
        return view("switch.view", ['accounts' => $accounts->data]);
    }

    public function add() {
        $defaultData = [
            'name' => '',
            'address1' => '',
            'address2' => '',
            'city' => '',
            'state' => '',
            'postal_code' => '',
        ];
        $defaultData = json_decode(json_encode($defaultData), false);

        $geonames = Geonames::getStates();
        $utilityCompanies = UtilityCompany::all(['id', 'name']);

        return view("switch.add", [
            'data' => $defaultData,
            'geonames' => $geonames,
            'utility_company' => $utilityCompanies,
            'newItem' => true
        ]);
    }

    public function addAccount(Request $request) {
        /*$client = new SwitchAccount();

        $client->user_id = Auth::User()->id;
        $client->street = $request->input('street');
        $client->city = $request->input('city');
        $client->state = $request->input('state');
        $client->zipcode = $request->input('zipcode');
        $client->utility_company_id = $request->input('utility_company_id');
        $client->utility_user = $request->input('utility_user');
        $client->utility_password = $request->input('utility_password');

        $client->save();*/
        
        $client = array(
            "name" => $request->input('name'),
            "address1" => $request->input('address1'),
            "address2" => $request->input('address2'),
            "city" => $request->input('city'),
            "state" => $request->input('state'),
            "postal_code" => $request->input('postal_code'),

            "shipping_address1" => $request->input('address1'),
            "shipping_address2" => $request->input('address2'),
            "shipping_city" => $request->input('city'),
            "shipping_state" => $request->input('state'),
            "shipping_postal_code" => $request->input('postal_code'),
            "country_id" => 0,
            "contact" => array(
                "first_name" => Auth::user()->name,
                "last_name" => "",
                "email" => Auth::user()->email,
            )
        );

        $data = Clients::addClient($client)->data;

        Session::put('switchaccount', $data);

        return redirect('/home');
    }

    public function set($id = 0) {
        if (!$id)
            return redirect('/switch');

        $user = Auth::user();
        $user->switch_account_id = $id;
        $user->save();

        $accounts = Clients::getClientFromEmail(auth()->user()->email)->data;
        if (count($accounts) == 0)
            return redirect('/switch');

        foreach($accounts as $account)
            if ($account->id == $id) {
                Session::put('switchaccount', $account);
                break;
            }

        return redirect('/home');
    }
}