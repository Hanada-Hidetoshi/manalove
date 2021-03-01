<?php

namespace App\Http\Controllers;
use App\Models\Test;

class TestController extends Controller
{
    function index(){
        return view('test_results');
    }
}