<?php

namespace App\Http\Controllers;

use App\Location;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentIndexController extends Controller
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
        return view('studentIndex',compact('locations'));
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
     * student post details
     *
     */

    public function studentPostDetails($id)
    {
        $students = Post::join('locations','locations.id','posts.location_id')
            ->join('users','users.id','posts.created_by')
            ->where('posts.location_id',$id)
            ->where(function($query){
                return $query
                    ->where('users.user_role','Student')
                    ->where('posts.created_at','>=',Carbon::now()->startOfMonth());
            })->select(
                'users.name',
                'locations.location_name',
                'posts.teacher_type',
                'posts.expected_amount',
                'posts.days',
                'posts.class_name',
                'posts.experience',
                'posts.subject',
                'users.phone_number',
                'users.last_level_education'
            )->get();

        return view('studentDetails',compact('students'));
     //   dd($students);
    }

    /**
     * student
     * search
     */
    public function studentSearch(Request $request)
    {
        $students = Post::join('locations','locations.id','posts.location_id')
            ->join('users','users.id','posts.created_by')
            ->where('users.user_role','Teacher')
            ->orderBy('class_name');
        $class_name=$request->input('class_name');

        if(!empty($class_name))
        {
            $students->where('posts.class_name','LIKE','%'.$class_name.'%');
        }
        $students=$students->get();

        return view('studentDetails',compact('students'));
    }
}
