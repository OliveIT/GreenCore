<?php

namespace App\Http\Controllers;

use App\Location;
use App\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $refer_id = $request->input('refer_id');
        
        return view('welcome', array(
            "refer_id" => $refer_id
        ));
    }
}