<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\UserData;

class LoginController extends Controller
{
    function login(){
        $user_id = "";
        $password = "";
        return view('login',compact('user_id','password'));
    }
    function postlogin(Request $request){
        $rules =[
            'user_id' => 'required|max:50',
            'password' => 'required|between:8,20',
        ];
        $user_id = $request->user_id;
        $password = $request->password;
        $process_message ='';
        $validator = Validator::make($request->all(), $rules);
        $validated = $validator->validate();
        $user = new UserData;
        $return = $user->loginValidate($request);
        $id = \App\Models\UserData::where('user_id',$user_id)->where('password',$password)->value('id');
        if($return){
            return redirect()->route('mypage',['id'=>$id]);
        }else{
            $process_message ='ユーザーIDかパスワードが違います';
            return view('login',compact('validator','process_message','user_id','password'));
        }
        // if (Auth::attempt($credentials)) {
        //     // Authentication passed...
        //     return redirect('/mypage');
        // }else{
        //     return view('login',compact('validator'));
        // }
    }
    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $process_message ='ログアウトしました';
        return view('/login',compact('process_message'));
    }
    function adminlogin(){
        return view('login');
    }
    function adminpostlogin(Request $request){
        $rules =[
            'user_id' => 'required|max:50',
            'password' => 'required|between:8,20',
        ];
        $validator = Validator::make($request->all(), $rules);
        $validated = $validator->validate();
        return view('login',compact('validator'));
    }
}