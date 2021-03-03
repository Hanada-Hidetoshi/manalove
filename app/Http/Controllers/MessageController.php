<?php

namespace App\Http\Controllers;
use App\Models\Test;
use Session;

class MessageController extends Controller
{
    function index(){
        return view('message');
    }
    function index2(){
        return view('message_data');
    }
}