<?php

namespace App\Http\Controllers;

use Auth;
use App\Location;
use Illuminate\Http\Request;
use App\User;
use Session;
use App\Models\SwitchAccount;
use App\InvNinja\Clients;

class UserController extends Controller
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
        $users = User::select(
                'id',
                'name',
                'email',
                'phone_number',
                'user_role'
            )->where('users.id', '!=', Auth::User()->id)
            ->paginate(10);

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("user.add");
    }

    public function addUser(Request $request) {
        $rules = array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|regex:/(01)[0-9]{9}/'
        );
        $validator = Validator::make(Input::only('name', 'email', 'phone_number'), $rules);
        
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $email = $request->email;
            $users = User::select('id')->where('email', '==', email);
            if ($users != NULL)
                return Redirect::back()->withErrors(['email' => 'This email is exist on this site.']);
            
            $data = Clients::getClientFromEmail($email)->data;
            if (count($clients->data) == 0) {
                return Redirect::back()->withErrors(['email' => 'This email doesn\'t not exist in Invoice Ninja.']);
            }

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt('123456'),
                'email_token' => base64_encode($request->email),
                'phone_number' => $request->phone_number,
                'user_role'=>"user",
                'verified' => 1
            ]);

            return redirect('user/view');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userById = User::find($id);
        $switchAccounts = SwitchAccount::where("user_id", $id)->get();

        return view('user.view', [
            'user' => $userById,
            'accounts' => $switchAccounts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locations=Location::all();
        $userById = User::find($id);

        return view('user.edit', compact('userById','locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->user_role=='Teacher')
        {
            $this->validate($request, [
                'name' => 'required',
                'phone_number'=>'required',
                'email' => 'required',
                'last_level_education' => 'required',
                'user_role' => 'required',
            //    'location_id'=>'required'
            ]);
        }else{

            $this->validate($request, [
                'name' => 'required',
                'phone_number'=>'required',
                'email' => 'required',
                'last_level_education' => 'required',
                'user_role' => 'required',
            //    'location_id'=>'required'
            ]);
        }

        $userById=User::find($id);
        $userById->name=$request->name;
        $userById->email=$request->email;
        $userById->phone_number=$request->phone_number;
        $userById->last_level_education=$request->last_level_education;
        $userById->user_role=$request->user_role;
        $userById->location_id=$request->location_id;
        $userById->save();
        Session::flash('message','User update Successfully...!');
        return  redirect('/user/view');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userById = User::find($id);
        $userById->delete();
        Session::flash('message','User Delete Successfully........!!!');
        return back();
    }
}
