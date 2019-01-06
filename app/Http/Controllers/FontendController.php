<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FontendController extends Controller
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
        //
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
      * show teacher details post
      */
     public function teacherPostDetails($id)
     {
         $teachers = Post::join('locations','locations.id','posts.location_id')
             ->join('users','users.id','posts.created_by')
             ->where('posts.location_id',$id)
             ->where(function($query){
                 return $query
                     ->where('users.user_role','Teacher')
                     ->where('posts.created_at','>=',Carbon::now()->startOfMonth());
             })->select(
                 'users.name',
                         'locations.location_name',
                         'posts.looking_for',
                         'posts.expected_amount',
                         'posts.days',
                         'posts.class_name',
                         'posts.experience',
                         'posts.subject',
                         'users.phone_number',
                         'users.name',
                         'users.last_level_education'
             )->get();
        // dd($teachers);
             return view('teacherDetails',compact('teachers'));

     }
}
