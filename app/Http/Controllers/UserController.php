<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use App\User;
use Session;

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
        $userId = auth()->user()->id;
        if(auth()->user()->user_role == 'Admin')
        {
            $users = User::leftJoin('locations','locations.id','users.location_id')
                ->select(
                    'users.id',
                    'users.name',
                    'users.email',
                    'users.phone_number',
                    'users.last_level_education',
                    'locations.location_name',
                    'user_role'
                )
                ->paginate(10);
        }else{
            $users = User::leftJoin('locations','locations.id','users.location_id')
                ->where('users.id',$userId)
                ->select(
                    'users.id',
                    'users.name',
                    'users.email',
                    'users.phone_number',
                    'users.last_level_education',
                    'locations.location_name',
                    'user_role'
                )
                ->paginate(10);
        }

        return view('user.view', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
