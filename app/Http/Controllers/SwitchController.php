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