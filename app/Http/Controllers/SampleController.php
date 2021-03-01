<?php

namespace App\Http\Controllers;
use App\Models\Test;

class SampleController extends Controller
{
    function test(){
        $test = 'aiueo';
        // phpinfo();
        $test = Test::all();
        var_dump($test);
        return view('sample',compact('test'));
    }
}