<?php

namespace App\Http\Controllers;
use App\Models\Test;

class AccountController extends Controller
{
    function index(){
        return view('account_info');
    }
}