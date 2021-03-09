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
        $thismonth = $daydata->format("Y-m-1");
        $data = [
            'w_study' => $query->where('implimantation','>=',$day7)->sum('elapsed_time'),
            'm_study' => $query->where('implimantation','>=',$thismonth)->sum('elapsed_time'),
            'all_study' => $query->sum('elapsed_time'),
            'count' => $query->count(),
            ];
        return view('study_log_data',compact('items','data'));
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
        $data = $this->logdata_data($request);
        $now = Carbon::now('Asia/Tokyo');
        DB::table('sstudy_logs')->where('id',$request->id)->update([
            'implimantation' => $data['implimantation'],
            'elapsed_time' => $data['elapsed_time'],
            'subject' => $data['subject'],
            'summary' => $data['summary'],
            'updated_at' => $now,
            ]);
        return redirect()->to('/study_logs');
    }
}