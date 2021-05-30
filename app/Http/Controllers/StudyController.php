<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\StudyLog;
use Carbon\Carbon;
use Session;

class StudyController extends Controller
{
    function index(Request $request){
        $id = $request->session()->get('id');
        $query =\App\Models\StudyLog::where('s_id',$id);
        $items = $query->orderBy('implimantation', 'desc')->orderBy('id', 'desc')->get();
        $daydata = Carbon::today();
        $daydata7 = $daydata->subday(7);
        $day7 = $daydata7->format('y-m-d');
        $thismonth = $daydata->format("Y-m-01");
        $subject_arr = \App\Models\StudyLog::where('s_id',$id)->distinct()->select('subject')->get()->toArray();
        $subject["subject_name"] = array();
        $subject["time"] = array();
        foreach($subject_arr as $val){
            if ($val["subject"] != "") {
                $subject_name = $val["subject"];
                $time = \App\Models\StudyLog::where('s_id',$id)->where('subject',$val["subject"])->sum('elapsed_time');
                array_push($subject["subject_name"], $subject_name);
                array_push($subject["time"], $time);
            }
        }
        // $subject_name = [
            // 'subject_name' => \App\Models\StudyLog::where('s_id',$id)->distinct()->select('subject')->get()->toArray(),
            // 'subject_name' => array("数学", "国語", "社会", "理科", "英語"),
            // 'time'=>array(200,300,400,500,600),
            // 'time' =>\App\Models\StudyLog::where('s_id',$id)->groupBy("subject")->sum('elapsed_time'),
            // ];
        $data = [
            'count' => $query->count(),
            'all_study' => $query->sum('elapsed_time'),
            'm_study' => $query->where('implimantation','>=',$thismonth)->sum('elapsed_time'),
            'w_study' => $query->where('implimantation','>=',$day7)->sum('elapsed_time'),
            ];
        return view('study_log_data',compact('items','data','subject'));
    }
    function logdata(Request $request){
        $data = [
            's_id' => $request->s_id,
            's_name' => $request->s_name,
            'implimantation' => $request->implimantation,
            'elapsed_time' => $request->elapsed_time,
            'summary' => $request->summary,
            'subject' => $request->subject,
            ];
        return $data;
    }
    function logregist(Request $request){
        $data = $this->logdata($request);
        $now = Carbon::now('Asia/Tokyo');
        DB::table('study_logs')->insert([
            's_id' => $data['s_id'],
            's_name' => $data['s_name'],
            'implimantation' => $data['implimantation'],
            'elapsed_time' => $data['elapsed_time'],
            'summary' => $data['summary'],
            'subject' => $data['subject'],
            'updated_at' => $now,
            'created_at' => $now,
            ]);
        return redirect()->to('/study_logs');
    }
    function logdelete(Request $request){
        $id = $request->id;
        $subject = \App\Models\StudyLog::find($id);
        $subject->delete();
        return redirect()->to('/study_logs');
    }
    function logedit(Request $request){
        $id = $request->id;
        $items = \App\Models\StudyLog::where('id',$id)->get();
        return view('study_log_data_edit',compact('items'));
    }
    function logcomplete(Request $request){
        $data = $this->logdata($request);
        $now = Carbon::now('Asia/Tokyo');
        DB::table('study_logs')->where('id',$request->id)->update([
            'implimantation' => $data['implimantation'],
            'elapsed_time' => $data['elapsed_time'],
            'subject' => $data['subject'],
            'summary' => $data['summary'],
            'updated_at' => $now,
            ]);
        return redirect()->to('/study_logs');
    }
}