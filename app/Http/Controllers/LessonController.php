<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\UserData;
use App\Models\PerformanceData;
use Carbon\Carbon;
use Session;

class LessonController extends Controller
{
    function index(Request $request){
        $id = $request->session()->get('id');
        $user_attribute = $request->session()->get('user_attribute');
        $lessons = \App\Models\PerformanceData::where('t_id', $id)->get();
        if($user_attribute===0){
            $matching = \App\Models\UserData::where('id', $id)->value('matching');
            $matching_ids = explode(',', $matching);
            $matching_users = \App\Models\UserData::wherein('id', $matching_ids)->get();
            return view('lesson',compact('matching_users','lessons'));
        }else{
            return view('lesson',compact('lessons'));
        }
    }
    function lessondata(Request $request){
        $data = [
            'scheduled' => $request->scheduled,
            'implimantation' => $request->implimantation,
            'subject' => $request->subject,
            't_id' => $request->session()->get('id'),
            't_name' => $request->t_name,
            's_id' => $request->s_id,
            's_name' =>\App\Models\UserData::where('id', $request->s_id)->value('view_name'),
            'content' => $request->content,
            't_comment' => $request->t_comment,
            's_comment' => $request->s_comment,
            ];
        return $data;
    }
    function lessonregist(Request $request){
        $data = $this->lessondata($request);
        $now = Carbon::now('Asia/Tokyo');
        DB::table('performance_datas')->insert([
            's_id' => $data['s_id'],
            's_name' => $data['s_name'],
            't_id' => $data['t_id'],
            't_name' => $data['t_name'],
            'scheduled' => $data['scheduled'],
            'content' => $data['content'],
            'subject' => $data['subject'],
            'updated_at' => $now,
            'created_at' => $now,
            ]);
        return redirect()->to('/lesson');
    }
    function lessondelete(Request $request){
        $id = $request->id;
        $subject = \App\Models\PerformanceData::find($id);
        $subject->delete();
        return redirect()->to('/lesson');
    }
    function lessonedit(Request $request){
        $id = $request->id;
        $matching = \App\Models\UserData::where('id', $id)->value('matching');
        $matching_ids = explode(',', $matching);
        $matching_users = \App\Models\UserData::wherein('id', $matching_ids)->get();
        $items = \App\Models\PerformanceData::where('id',$id)->get();
        return view('lesson_edit',compact('items','matching_users'));
    }
    function lessoncomplete(Request $request){
        $data = $this->lessondata_data($request);
        $now = Carbon::now('Asia/Tokyo');
        DB::table('performance_datas')->where('id',$request->id)->update([
            'implimantation' => $data['implimantation'],
            'scheduled' => $data['scheduled'],
            'subject' => $data['subject'],
            'summary' => $data['summary'],
            'updated_at' => $now,
            ]);
        return redirect()->to('/lesson');
    }
    function lessonfix(Request $request){
        $lessonid = $request->id;
        $id = $request->session()->get('id');
        $user_attribute = $request->session()->get('user_attribute');
        if($user_attribute===0){
            $items = \App\Models\PerformanceData::where('t_id', $id)->where('id',$lessonid)->get();
            $matching = \App\Models\UserData::where('id', $id)->value('matching');
            $matching_ids = explode(',', $matching);
            $matching_users = \App\Models\UserData::wherein('id', $matching_ids)->get();
            return view('lesson_edit',compact('matching_users','items'));
        }else{
            $items = \App\Models\PerformanceData::where('s_id', $id)->where('id',$lessonid)->get();
            return view('lesson_edit',compact('items'));
        }
    }
}