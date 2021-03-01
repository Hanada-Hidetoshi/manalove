<?php

namespace App\Http\Controllers;
use App\Models\Test;

class ContactController extends Controller
{
    function index(){
        return view('contact');
    }
}