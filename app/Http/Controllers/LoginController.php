<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\UserData;
use Session;

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
        $userdata = \App\Models\UserData::where('user_id',$user_id)->where('password',$password)->first();
        if($return){
            session([
                'id' => $userdata['id'],
                'user_id' => $userdata['user_id'],
                'user_attribute' => $userdata['user_attribute'],
                'view_name' => $userdata['view_name']
                ]);
            return redirect()->route('mypage');
        }else{
            $process_message ='ユーザーIDかパスワードが違います';
            return view('login',compact('validator','process_message','user_id','password'));
        }
    }
    function logout(Request $request){
        session()->flush();
        $process_message ='ログアウトしました';
        return view('/login',compact('process_message'));
    }
    function adminlogin(){
        $user_id = "";
        $password = "";
        return view('login',compact('user_id','password'));
    }
    function adminpostlogin(Request $request){
        $user_id = $request->user_id;
        $password = $request->password;
        if($user_id==='superuser'&&$password==='superuser'){
            return redirect('/admin/mypage');
        }else{
            $process_message ='ユーザーIDかパスワードが違います';
            return view('login',compact('process_message','user_id','password'));
        }
    }
}