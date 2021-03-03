<?php

namespace App\Http\Controllers;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class MypageController extends Controller
{
    function index(){
        return view('mypage');
    }
}