<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserData;
use App\Models\SubjectData;
use Session;

class TopController extends Controller
{
    function index(){
        if(\App\Models\SubjectData::exists()){
            $p_subjects = \App\Models\SubjectData::where('classfication', 1)->get();
            $j_h_subjects = \App\Models\SubjectData::where('classfication', 2)->get();
            $h_subjects = \App\Models\SubjectData::where('classfication', 3)->get();
            $s_subjects = \App\Models\SubjectData::where('classfication', 4)->get();
        }
        if(\App\Models\UserData::exists()){
            $creates = \App\Models\UserData::where('user_attribute', 0)->orderBy('created_at', 'desc')->take(3)->get();
            $updates = \App\Models\UserData::where('user_attribute', 0)->orderBy('updated_at', 'desc')->take(3)->get();
            $specials = \App\Models\UserData::where('user_attribute', 0)->whereNotNull('s_subject')->orderBy('updated_at', 'desc')->take(3)->get();
        }
        return view('top',compact('creates','updates','specials','p_subjects','j_h_subjects','h_subjects','s_subjects'));
    }
}
