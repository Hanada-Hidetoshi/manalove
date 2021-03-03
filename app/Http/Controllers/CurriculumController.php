<?php

namespace App\Http\Controllers;
use Session;

class CurriculumController extends Controller
{
    function index(){
        return view('curriculum');
    }
}