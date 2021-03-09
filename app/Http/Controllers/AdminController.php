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
    private function regist_count($days){
        $result ='';
        $result = \App\Models\UserData::where('regist_day', $days)->get()->count();
        return $result;
    }
    private function regist_count_attribute($days,$attribute){
        $result ='';
        $result = \App\Models\UserData::where('regist_day', $days)->where('user_attribute',$attribute)->get()->count();
        return $result;
    }
    private function study_count($days){
        $result ='';
        $result = \App\Models\StudyLog::where('implimantation', $days)->get()->count();
        return $result;
    }
    private function performance_count($days){
        $result ='';
        $result = \App\Models\PerformanceData::where('implimantation', $days)->get()->count();
        return $result;
    }
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
            'day0_ago' => $day1,
            'day1_ago' => $day2,
            'day2_ago' => $day3,
            'day3_ago' => $day4,
            'day4_ago' => $day5,
            'day5_ago' => $day6,
            'day6_ago' => $day7,
            'day1_regist'=>$this->regist_count($today),
            'day2_regist'=>$this->regist_count($daydata2),
            'day3_regist'=>$this->regist_count($daydata3),
            'day4_regist'=>$this->regist_count($daydata4),
            'day5_regist'=>$this->regist_count($daydata5),
            'day6_regist'=>$this->regist_count($daydata6),
            'day7_regist'=>$this->regist_count($daydata7),
            'week_regist'=>\App\Models\UserData::where('regist_day', '>=',$daydata7)->get()->count(),
            'month_regist'=>\App\Models\UserData::where('regist_day', '>=',$thismonth)->get()->count(),
            'year_regist'=>\App\Models\UserData::where('regist_day', '>=',$thisyear)->get()->count(),
            'all_regist'=>\App\Models\UserData::get()->count(),
            'day1_regist_t'=>$this->regist_count_attribute($today,0),
            'day2_regist_t'=>$this->regist_count_attribute($daydata2,0),
            'day3_regist_t'=>$this->regist_count_attribute($daydata3,0),
            'day4_regist_t'=>$this->regist_count_attribute($daydata4,0),
            'day5_regist_t'=>$this->regist_count_attribute($daydata5,0),
            'day6_regist_t'=>$this->regist_count_attribute($daydata6,0),
            'day7_regist_t'=>$this->regist_count_attribute($daydata7,0),
            'day1_regist_s'=>$this->regist_count_attribute($today,1),
            'day2_regist_s'=>$this->regist_count_attribute($daydata2,1),
            'day3_regist_s'=>$this->regist_count_attribute($daydata3,1),
            'day4_regist_s'=>$this->regist_count_attribute($daydata4,1),
            'day5_regist_s'=>$this->regist_count_attribute($daydata5,1),
            'day6_regist_s'=>$this->regist_count_attribute($daydata6,1),
            'day7_regist_s'=>$this->regist_count_attribute($daydata7,1),
            'day1_performance'=>$this->performance_count($today),
            'day2_performance'=>$this->performance_count($daydata2),
            'day3_performance'=>$this->performance_count($daydata3),
            'day4_performance'=>$this->performance_count($daydata4),
            'day5_performance'=>$this->performance_count($daydata5),
            'day6_performance'=>$this->performance_count($daydata6),
            'day7_performance'=>$this->performance_count($daydata7),
            'day1_studylog'=>$this->study_count($today),
            'day2_studylog'=>$this->study_count($daydata2),
            'day3_studylog'=>$this->study_count($daydata3),
            'day4_studylog'=>$this->study_count($daydata4),
            'day5_studylog'=>$this->study_count($daydata5),
            'day6_studylog'=>$this->study_count($daydata6),
            'day7_studylog'=>$this->study_count($daydata7),
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
            'id' => $request->id,
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
            'comment' => $request->comment,
            'matching' => $request->matching,
            'waiting' => $request->waiting,
            'from_myself' => $request->from_myself,
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
            'updated_at' => $now,
            'matching' => $data['matching'],
            'waiting' => $data['waiting'],
            'from_myself' => $data['from_myself'],
        ]);
        $process_message = '下記内容にて変更完了しました。';
        return view('admins.adminformaction',compact('data','process_message'));
    }
    function subject_data(Request $request){
        $data = [
            'classfication' => $request->classfication,
            'classfication_name' => $request->classfication_name,
            'subject_name' => $request->subject_name,
            ];
        return $data;
    }
    function regist(Request $request){
        $data = $this->subject_data($request);
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
    function subject_delete(Request $request){
        $id = $request->id;
        $subject = \App\Models\SubjectData::find($id);
        $subject->delete();
        return redirect()->to('/admin/subjects');
    }
    function subject_edit(Request $request){
        $id = $request->id;
        $items = \App\Models\SubjectData::where('id',$id)->get();
        return view('admins.adminsubjectedit',compact('items'));
    }
    function subject_complete(Request $request){
        $data = $this->subject_data($request);
        $id = $request->id;
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
