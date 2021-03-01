<?php

namespace App\Http\Controllers;
use App\Models\Test;

class LessonController extends Controller
{
    function index(){
        return view('lesson');
    }
}