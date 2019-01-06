<?php

namespace App\Http\Controllers;

use App\Location;
use App\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        return view('welcome',compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * student page route
     */
    public function studentPage()
    {
        return view('studentIndex');
    }

    /**
     * teacher
     * search
     */
    public function teacherSearch(Request $request)
    {

        $teachers = Post::join('locations','locations.id','posts.location_id')
            ->join('users','users.id','posts.created_by')
            ->where('users.user_role','Teacher')
            ->orderBy('class_name');
        $class_name=$request->input('class_name');

        if(!empty($class_name))
        {
            $teachers->where('posts.class_name','LIKE','%'.$class_name.'%');
        }
        $teachers=$teachers->get();

        return view('teacherDetails',compact('teachers'));
    }
}
