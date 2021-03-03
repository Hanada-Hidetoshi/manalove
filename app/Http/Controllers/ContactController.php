<?php

namespace App\Http\Controllers;
use Session;

class ContactController extends Controller
{
    function index(){
        return view('contact');
    }
}