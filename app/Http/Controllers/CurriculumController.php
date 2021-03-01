<?php

namespace App\Http\Controllers;
use App\Models\Test;

class CurriculumController extends Controller
{
    function index(){
        return view('curriculum');
    }
}