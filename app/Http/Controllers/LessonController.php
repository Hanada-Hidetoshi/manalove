<?php

namespace App\Http\Controllers;
use App\Models\Test;
use Session;

class LessonController extends Controller
{
    function index(){
        return view('lesson');
    }
}