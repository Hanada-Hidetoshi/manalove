<?php

namespace App\Http\Controllers;
use App\Models\Test;

class MessageController extends Controller
{
    function index(){
        return view('message');
    }
    function index2(){
        return view('message_data');
    }
}