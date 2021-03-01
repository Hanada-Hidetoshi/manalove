<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserData;

class SearchController extends Controller
{
    function teachers(){
        $teachers = \App\Models\UserData::where('user_attribute', 1)->paginate(10);
        return view('teachers',compact('teachers'));
    }
    function teacherprofile(){
        $teachers = \App\Models\UserData::where('user_attribute', 1)->paginate(10);
        return view('profile',compact('teachers'));
    }
}
