<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\UserData;
use App\Models\PerformanceData;
use App\Models\SubjectData;
use App\Models\StudyLog;
use Carbon\Carbon;
use lluminate\Database\Eloquent\Builder;
use Session;

class AdminController extends Controller
{
    function index(){
        $daydata = Carbon::today();
        $thismonth = $daydata->format("Y-m-1");
        $thisyear = $daydata->format("Y-1-1");
        $today = $daydata->format("Y-m-d");
        $day1 = $daydata->format('m月d日');
        $daydata2 = $daydata->subday(1);
        $day2 = $daydata2->format('m月d日');
        $daydata2 =$daydata->format("Y-m-d");
        $daydata3 = $daydata->subday(1);
        $day3 = $daydata3->format('m月d日');
        $daydata3 =$daydata->format("Y-m-d");
        $daydata4 = $daydata->subday(1);
        $day4 = $daydata4->format('m月d日');
        $daydata4 =$daydata->format("Y-m-d");
        $daydata5 = $daydata->subday(1);
        $day5 = $daydata5->format('m月d日');
        $daydata5 =$daydata->format("Y-m-d");
        $daydata6 = $daydata->subday(1);
        $day6 = $daydata6->format('m月d日');
        $daydata6 =$daydata->format("Y-m-d");
        $daydata7 = $daydata->subday(1);
        $day7 = $daydata7->format('m月d日');
        $daydata7 =$daydata->format("Y-m-d");
        $items =[
            'today' => $day1,
            'yesterday' => $day2,
            'twodays_ago' => $day3,
            'threedays_ago' => $day4,
            'fourdays_ago' => $day5,
            'fivedays_ago' => $day6,
            'sixdays_ago' => $day7,
            'day1_regist'=>\App\Models\UserData::where('regist_day', $today)->get()->count(),
            'day2_regist'=>\App\Models\UserData::where('regist_day', $daydata2)->get()->count(),
            'day3_regist'=>\App\Models\UserData::where('regist_day', $daydata3)->get()->count(),
            'day4_regist'=>\App\Models\UserData::where('regist_day', $daydata4)->get()->count(),
            'day5_regist'=>\App\Models\UserData::where('regist_day', $daydata5)->get()->count(),
            'day6_regist'=>\App\Models\UserData::where('regist_day', $daydata6)->get()->count(),
            'day7_regist'=>\App\Models\UserData::where('regist_day', $daydata7)->get()->count(),
            'week_regist'=>\App\Models\UserData::where('regist_day', '>=',$daydata7)->get()->count(),
            'month_regist'=>\App\Models\UserData::where('regist_day', '>=',$thismonth)->get()->count(),
            'year_regist'=>\App\Models\UserData::where('regist_day', '>=',$thisyear)->get()->count(),
            'all_regist'=>\App\Models\UserData::get()->count(),
            'day1_regist_t'=>\App\Models\UserData::where('regist_day', $today)->where('user_attribute',0)->get()->count(),
            'day2_regist_t'=>\App\Models\UserData::where('regist_day', $daydata2)->where('user_attribute',0)->get()->count(),
            'day3_regist_t'=>\App\Models\UserData::where('regist_day', $daydata3)->where('user_attribute',0)->get()->count(),
            'day4_regist_t'=>\App\Models\UserData::where('regist_day', $daydata4)->where('user_attribute',0)->get()->count(),
            'day5_regist_t'=>\App\Models\UserData::where('regist_day', $daydata5)->where('user_attribute',0)->get()->count(),
            'day6_regist_t'=>\App\Models\UserData::where('regist_day', $daydata6)->where('user_attribute',0)->get()->count(),
            'day7_regist_t'=>\App\Models\UserData::where('regist_day', $daydata7)->where('user_attribute',0)->get()->count(),
            'day1_regist_s'=>\App\Models\UserData::where('regist_day', $today)->where('user_attribute',1)->get()->count(),
            'day2_regist_s'=>\App\Models\UserData::where('regist_day', $daydata2)->where('user_attribute',1)->get()->count(),
            'day3_regist_s'=>\App\Models\UserData::where('regist_day', $daydata3)->where('user_attribute',1)->get()->count(),
            'day4_regist_s'=>\App\Models\UserData::where('regist_day', $daydata4)->where('user_attribute',1)->get()->count(),
            'day5_regist_s'=>\App\Models\UserData::where('regist_day', $daydata5)->where('user_attribute',1)->get()->count(),
            'day6_regist_s'=>\App\Models\UserData::where('regist_day', $daydata6)->where('user_attribute',1)->get()->count(),
            'day7_regist_s'=>\App\Models\UserData::where('regist_day', $daydata7)->where('user_attribute',1)->get()->count(),
            'day1_performance'=>\App\Models\PerformanceData::where('implimantation', $today)->get()->count(),
            'day2_performance'=>\App\Models\PerformanceData::where('implimantation', $daydata2)->get()->count(),
            'day3_performance'=>\App\Models\PerformanceData::where('implimantation', $daydata3)->get()->count(),
            'day4_performance'=>\App\Models\PerformanceData::where('implimantation', $daydata4)->get()->count(),
            'day5_performance'=>\App\Models\PerformanceData::where('implimantation', $daydata5)->get()->count(),
            'day6_performance'=>\App\Models\PerformanceData::where('implimantation', $daydata6)->get()->count(),
            'day7_performance'=>\App\Models\PerformanceData::where('implimantation', $daydata7)->get()->count(),
            'day1_studylog'=>\App\Models\StudyLog::where('implimantation', $today)->get()->count(),
            'day2_studylog'=>\App\Models\StudyLog::where('implimantation', $daydata2)->get()->count(),
            'day3_studylog'=>\App\Models\StudyLog::where('implimantation', $daydata3)->get()->count(),
            'day4_studylog'=>\App\Models\StudyLog::where('implimantation', $daydata4)->get()->count(),
            'day5_studylog'=>\App\Models\StudyLog::where('implimantation', $daydata5)->get()->count(),
            'day6_studylog'=>\App\Models\StudyLog::where('implimantation', $daydata6)->get()->count(),
            'day7_studylog'=>\App\Models\StudyLog::where('implimantation', $daydata7)->get()->count(),
            ];
        return view('admins.adminmypage',compact('items'));
    }
    function teachers(){
        $items = \App\Models\UserData::where('user_attribute', 0)->orderBy('id', 'asc')->get();
        return view('admins.adminteachers',['items'=>$items]);
    }
    function students(){
        $items = \App\Models\UserData::where('user_attribute', 1)->orderBy('id', 'asc')->get();
        return view('admins.adminstudents',['items'=>$items]);
    }
    function subjects(){
        $items = \App\Models\SubjectData::all();
        return view('admins.adminsubjects',['items'=>$items]);
    }
    function studylogs(){
        $items = \App\Models\StudyLog::all();
        return view('admins.adminstudy_logs',['items'=>$items]);
    }
    function performances(){
        $items = \App\Models\PerformanceData::all();
        return view('admins.adminperformances',['items'=>$items]);
    }
    function user_delete($id){
        $user = \App\Models\UserData::find($id);
        $user->delete();
        return redirect()->to('/admin/students');
    }
    function user_edit($id){
        $items = \App\Models\UserData::where('id',$id)->get();
        return view('admins.adminuserdata',compact('items'));
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
            'last_name' => 'required|max:50',
            'first_name' => 'required|max:50',
            'last_name_fri' => 'required|max:50',
            'first_name_fri' => 'required|max:50',
            'birth_day'  => 'required|date',
            'prefecture' => 'required|max:50',
            'view_name' => 'required|max:50',
            'email' => 'required|email',
            'user_id' => 'required|max:50',
            'password' => 'required|between:8,20|confirmed',
            'comment' => 'string|nullable'
        ];
        if($request->user_attribute ==1){
            $studentrules = [
                'course' => 'required|max:50',
            ];
            $rules = array_merge($commonrules , $studentrules);
        }elseif($request->user_attribute ==0){
            $teacherrules = [
                'university' => 'required|max:50',
                'faculty' => 'required|max:50',
                'department' => 'nullable|max:50',
                'liberal' =>'required|numeric',
                'j_h_exam' =>'required|numeric',
                'h_exam' =>'required|numeric',
                'p_subjects' => 'nullable|array',
                'j_h_subjects' => 'nullable|array',
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
        return view('admins.adminformaction',compact('data'));
    }
    function complete(Request $request){
        $data = $this->postdata($request);
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
        $now = Carbon::now('Asia/Tokyo');
        DB::table('user_datas')->where('id',$request->id)->update([
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
            'updated_at' => $now
        ]);
        $process_message = '下記内容にて変更完了しました。';
        return view('admins.adminformaction',compact('data','process_message'));
    }
    function regist(Request $request){
        $data = [
            'classfication' => $request->classfication,
            'classfication_name' => $request->classfication_name,
            'subject_name' => $request->subject_name,
            ];
        $now = Carbon::now('Asia/Tokyo');
        DB::table('subject_datas')->insert([
            'classfication' => $data['classfication'],
            'subject_name' => $data['subject_name'],
            'classfication_name' => $data['classfication_name'],
            'updated_at' => $now,
            'created_at' => $now,
            ]);
        return redirect()->to('/admin/subjects');
    }
    function subject_delete($id){
        $subject = \App\Models\SubjectData::find($id);
        $subject->delete();
        return redirect()->to('/admin/subjects');
    }
    function subject_edit($id){
        $items = \App\Models\SubjectData::where('id',$id)->get();
        return view('admins.adminsubjectedit',compact('items'));
    }
    function subject_complete($id){
        $now = Carbon::now('Asia/Tokyo');
        DB::table('subject_datas')->where('id',$request->id)->update([
            'classfication' => $data['classfication'],
            'subject_name' => $data['subject_name'],
            'classfication_name' => $data['classfication_name'],
            'updated_at' => $now,
            ]);
        return redirect()->to('/admin/subjects');
    }
}
