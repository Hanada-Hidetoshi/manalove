<?php

namespace App\Http\Controllers;
use App\Models\Test;
use Session;

class StudyController extends Controller
{
    function index(){
        return view('study_log_data');
    }
}