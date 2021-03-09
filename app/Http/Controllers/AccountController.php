<?php

namespace App\Http\Controllers;
use App\Models\UserData;
use App\Models\SubjectData;
use Illuminate\Http\Request;
use Session;

class AccountController extends Controller
{
    function index(Request $request){
        $id = $request->session()->get('id');
        $items = \App\Models\UserData::where('id', $id)->get();
        return view('account_info',compact('items'));
    }
    function profile($id){
        $items = \App\Models\UserData::where('id', $id)->get();
        return view('profile',compact('items'));
    }
    function myprofile(Request $request){
        $id = $request->session()->get('id');
        $items = \App\Models\UserData::where('id', $id)->get();
        return view('profile',compact('items'));
    }
    function profilechange(Request $request){
        $id = $request->session()->get('id');
        $items = \App\Models\UserData::where('id', $id)->get();
        return view('account_info',compact('items'));
    }
}