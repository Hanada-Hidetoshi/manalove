<?php

namespace App\Http\Controllers;
use App\Models\Test;

class StudyController extends Controller
{
    function index(){
        return view('study_log_data');
    }
}