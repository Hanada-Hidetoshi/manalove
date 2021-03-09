<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserData;
use Session;

class SearchController extends Controller
{
    function teachers(){
        $teachers = \App\Models\UserData::where('user_attribute', 0)->orderBy('updated_at', 'desc')->paginate(10);
        return view('teachers',compact('teachers'));
    }
    function students(){
        $students = \App\Models\UserData::where('user_attribute', 1)->orderBy('updated_at', 'desc')->paginate(10);
        return view('students',compact('students'));
    }
}
