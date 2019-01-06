<?php

namespace App\Http\Controllers;

use App\Location;
use App\Mail\SendNotificationToStudent;
use App\Mail\SendNotificationToTeacher;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        if(auth()->user()->user_role == 'Admin'){
            $posts=Post::join('locations','locations.id','posts.location_id')
                ->join('users','users.id','posts.created_by')
                ->select(
                    'posts.id',
                    'posts.teacher_type',
                    'posts.looking_for',
                    'posts.expected_amount',
                    'posts.days',
                    'posts.class_name',
                    'posts.experience',
                    'posts.subject',
                    'locations.location_name',
                    'users.name',
                    'posts.available_sit'
                )->get();
        }else{
            $posts=Post::join('locations','locations.id','posts.location_id')
                ->join('users','users.id','posts.created_by')
                ->where('users.id',$userId)
                ->select(
                    'posts.id',
                    'posts.teacher_type',
                    'posts.looking_for',
                    'posts.expected_amount',
                    'posts.days',
                    'posts.class_name',
                    'posts.experience',
                    'posts.subject',
                    'locations.location_name',
                    'users.name',
                    'posts.available_sit'
                )->get();
        }
        return view('post.view',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations=Location::all();
        return view('post.create',compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        if(auth()->user()->user_role == 'Teacher' || auth()->user()->user_role == 'Admin'){
            $this->validate($request, [
                'looking' => 'required',
                'expected_amount' => 'required',
                'days' => 'required',
                'class' => 'required',
                'location_id' => 'required',
                'experience' => 'required',
                'subject' => 'required',
              //  'available_sit' => 'required'
            ]);
        }else{
            $this->validate($request, [
                'teacher_type' => 'required',
                'expected_amount' => 'required',
                'days' => 'required',
                'class' => 'required',
                'location_id' => 'required',
                'experience' => 'required',
                'subject' => 'required'
            ]);
        }

        $post= new Post();
        $post->teacher_type=$request->teacher_type;
        $post->looking_for=$request->looking;
        $post->available_sit=$request->available_sit;
        $post->expected_amount=$request->expected_amount;
        $post->days=$request->days;
        $post->class_name=$request->class;
        $post->location_id=$request->location_id;
        $post->experience=$request->experience;
        $post->subject=$request->subject;
        $post->created_by=auth()->id();
        $post->save();
        if(auth()->user()->user_role=='Student'){
            $this->sendEveryTeacherNotification($post->location_id,$post);
        }
        if(auth()->user()->user_role=='Teacher'){
            $this->sendEveryStudentNotification($post->location_id,$post);
        }
        Session::flash('message','Post create Successfully...!');
        return  redirect()->back();
    }


    /**
     * send notification to teacher
     *
     */

    public function sendEveryTeacherNotification($locationId,$post)
    {
        $userInfo = User::join('locations','locations.id','users.location_id')
            ->where('users.user_role','=','Teacher')
            ->where('users.verified','=','1')
            ->where('users.location_id',$locationId)
            ->select(
                'users.email'
            )->get();

        $postById = Post::join('locations','locations.id','posts.location_id')
            ->join('users','users.id','posts.created_by')
            ->where('posts.id',$post->id)
            ->select(
                'posts.teacher_type',
                        'posts.expected_amount',
                        'posts.days',
                        'locations.location_name',
                        'users.phone_number',
                        'posts.class_name',
                        'posts.experience',
                        'posts.subject',
                        'users.name'
            )->first();

        foreach ($userInfo as $email){
            Mail::to($email->email)
                ->send(new SendNotificationToTeacher($postById));
        }
    }

    /**
     * send notification to student
     */

    public function sendEveryStudentNotification($locationId,$post)
    {
        $userInfo = User::join('locations','locations.id','users.location_id')
            ->where('users.user_role','=','Student')
            ->where('users.verified','=','1')
            ->where('users.location_id',$locationId)
            ->select(
                'users.email'
            )->get();

        $postById = Post::join('locations','locations.id','posts.location_id')
            ->join('users','users.id','posts.created_by')
            ->where('posts.id',$post->id)
            ->select(
                'posts.looking_for',
                'posts.expected_amount',
                'posts.days',
                'locations.location_name',
                'users.phone_number',
                'posts.class_name',
                'posts.experience',
                'posts.subject',
                'users.name',
                'posts.available_sit'
            )->first();

      //  dd($postById);

        foreach ($userInfo as $email){
            Mail::to($email->email)
                ->send(new SendNotificationToStudent($postById));
        }
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
    {   $locations=Location::all();
        $postById=Post::find($id);

        return view('post.edit',compact('postById','locations'));
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
        if(auth()->user()->user_role == 'Teacher' || auth()->user()->user_role == 'Admin'){
            $this->validate($request, [
                'looking' => 'required',
                'expected_amount' => 'required',
                'days' => 'required',
                'class' => 'required',
                'location_id' => 'required',
                'experience' => 'required',
                'subject' => 'required',
                'available_sit' => 'required'
            ]);
        }else{
            $this->validate($request, [
                'teacher_type' => 'required',
                'expected_amount' => 'required',
                'days' => 'required',
                'class' => 'required',
                'location_id' => 'required',
                'experience' => 'required',
                'subject' => 'required'
            ]);
        }

        $postById = Post::find($id);
        $postById->teacher_type=$request->teacher_type;
        $postById->looking_for=$request->looking;
        $postById->available_sit=$request->available_sit;
        $postById->expected_amount=$request->expected_amount;
        $postById->days=$request->days;
        $postById->class_name=$request->class;
        $postById->location_id=$request->location_id;
        $postById->experience=$request->experience;
        $postById->subject=$request->subject;
        $postById->created_by=auth()->id();
        $postById->save();
        Session::flash('message','Post update Successfully...!');
        return  redirect('/post/view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postById = Post::find($id);
        $postById->delete();
        Session::flash('message','Post Delete Successfully........!!!');
        return back();
    }
}
