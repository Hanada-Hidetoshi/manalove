<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\SubjectData;
use Session;

class FormController extends Controller
{
    function student(){
        $attribute = 'student';
        return view('regist',compact('attribute'));
    }
    function teacher(){
        $primarys = \App\Models\SubjectData::where('classfication', 1)->get();
        $juniorhighs = \App\Models\SubjectData::where('classfication', 2)->get();
        $highs = \App\Models\SubjectData::where('classfication', 3)->get();
        $specials = \App\Models\SubjectData::where('classfication', 4)->get();
        $attribute = 'teacher';
        return view('regist',compact('attribute','primarys','juniorhighs','highs','specials'));
    }
    function postdata(Request $request){
        $data = [
            'attribute' => $request->attribute,
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'last_name_fri' => $request->last_name_fri,
            'first_name_fri' => $request->first_name_fri,
            'birth_day' => $request->birth_day,
            'prefecture' => $request->prefecture,
            'view_name' => $request->view_name,
            'email' => $request->email,
            'user_id' => $request->user_id,
            'password' => $request->password,
            'user_attribute' => $request->user_attribute,
            'course' => $request->course,
            'university' => $request->university,
            'faculty' => $request->faculty,
            'department' => $request->department,
            'liberal' => $request->liberal,
            'j_h_exam' => $request->j_h_exam,
            'h_exam' => $request->h_exam,
            'p_subjects' => $request->p_subjects,
            'j_h_subjects' => $request->j_h_subjects,
            'h_subjects' => $request->h_subjects,
            's_subjects' => $request->s_subjects,
            'hour_pays' => $request->hour_pays,
            'comment' => $request->comment
        ];
        return $data;
    }
    function validationrules(Request $request){
        $commonrules = [
            'attribute' => 'required|max:50',
            'last_name' => 'required|max:50',
            'first_name' => 'required|max:50',
            'last_name_fri' => 'required|max:50|kana',
            'first_name_fri' => 'required|max:50|',
            'birth_day'  => 'required|date',
            'prefecture' => 'required|max:50',
            'view_name' => 'required|max:50',
            'email' => 'required|email',
            'user_id' => 'required|max:50|alpha_num|unique:user_datas,user_id',
            'password' => 'required|between:8,20|confirmed',
            'user_attribute' => 'required|max:50',
            'comment' => 'string|nullable'
        ];
        if($request->attribute ==='student'){
            $studentrules = [
                'course' => 'required|max:50',
            ];
            $rules = array_merge($commonrules , $studentrules);
        }elseif($request->attribute ==='teacher'){
            $teacherrules = [
                'university' => 'required|max:50',
                'faculty' => 'required|max:50',
                'department' => 'nullable|max:50',
                'liberal' =>'required|numeric',
                'j_h_exam' =>'required|numeric',
                'h_exam' =>'required|numeric',
                'j_h_subjects' => 'nullable|array',
                'p_subjects' => 'nullable|array',
                'h_subjects' => 'nullable|array',
                's_subjects' => 'nullable|array',
                'hour_pays' => 'nullable|numeric',
            ];
            $rules = array_merge($commonrules , $teacherrules);
        }
        return $rules;
    }
    function confirm(Request $request){
        $data = $this->postdata($request);
        $rules = $this->validationrules($request);
        $validator = Validator::make($request->all(), $rules);
        $validated = $validator->validate();
        $p_subjects = "";
        $j_h_subjects ="";
        $h_subjects ="";
        $s_subjects ="";
        $spl = "";
        if (isset($data['p_subjects'])) {
            foreach($data['p_subjects'] as $val){
                $p_subjects = $p_subjects . $spl . $val;
                $spl = ",";
            }
            $spl = "";
        }
        if (isset($data['j_h_subjects'])) {
            foreach($data['j_h_subjects'] as $val){
                $j_h_subjects = $j_h_subjects . $spl . $val;
                $spl = ",";
            }
            $spl = "";
        }
        if (isset($data['h_subjects'])) {
            foreach($data['h_subjects'] as $val){
                $h_subjects = $h_subjects . $spl . $val;
                $spl = ",";
            }
            $spl = "";
        }
        if (isset($data['s_subjects'])) {
            foreach($data['s_subjects'] as $val){
                $s_subjects = $s_subjects . $spl . $val;
                $spl = ",";
            }
            $spl = "";
        }
        return view('formaction', compact('data','p_subjects','j_h_subjects','h_subjects','s_subjects'));
    }
    function complete(Request $request){
        $data = $this->postdata($request);
        $now = Carbon::now('Asia/Tokyo');
        $today= Carbon::now('Asia/Tokyo')->format("Y-m-d");
        DB::table('user_datas')->insert([
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'last_name_fri' => $data['last_name_fri'],
            'first_name_fri' => $data['first_name_fri'],
            'birth_day' => $data['birth_day'],
            'prefecture' => $data['prefecture'],
            'view_name' => $data['view_name'],
            'email' => $data['email'],
            'user_id' => $data['user_id'],
            'password' => $data['password'],
            'user_attribute' => $data['user_attribute'],
            'course' => $data['course'],
            'university' => $data['university'],
            'faculty' => $data['faculty'],
            'department' => $data['department'],
            'liberal' => $data['liberal'],
            'j_h_exam' => $data['j_h_exam'],
            'h_exam' => $data['h_exam'],
            'p_subject' => $data['p_subjects'],
            'j_h_subject' => $data['j_h_subjects'],
            'h_subject' => $data['h_subjects'],
            's_subject' => $data['s_subjects'],
            'hour_pays' => $data['hour_pays'],
            'comment' => $data['comment'],
            'hour_pays' => 1500,
            'updated_at' => $now,
            'created_at' => $now,
            'regist_day' => $today
        ]);
        $process_message = '下記内容にて登録完了しました。';
        return view('formaction',compact('data','process_message'));
    }
}