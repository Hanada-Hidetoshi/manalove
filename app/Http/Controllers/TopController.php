<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserData;
use App\Models\SubjectData;

class TopController extends Controller
{
    function index(){
        $p_subjects = \App\Models\SubjectData::where('classfication', 1)->get();
        $j_h_subjects = \App\Models\SubjectData::where('classfication', 2)->get();
        $h_subjects = \App\Models\SubjectData::where('classfication', 3)->get();
        $s_subjects = \App\Models\SubjectData::where('classfication', 4)->get();
        $creates = \App\Models\UserData::where('user_attribute', 0)->orderBy('created_at', 'desc')->take(3)->get();
        $updates = \App\Models\UserData::where('user_attribute', 0)->orderBy('updated_at', 'desc')->take(3)->get();
        return view('top',compact('creates','updates','p_subjects','j_h_subjects','h_subjects','s_subjects'));
    }
}
