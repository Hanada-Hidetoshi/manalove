<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TestResult;
use App\Models\UserData;
use App\Models\SubjectData;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;

class TestController extends Controller
{
    function index(Request $request){
        $id = $request->session()->get('id');
        $primarys = \App\Models\SubjectData::where('classfication', 1)->get();
        $juniorhighs = \App\Models\SubjectData::where('classfication', 2)->get();
        $highs = \App\Models\SubjectData::where('classfication', 3)->get();
        $specials = \App\Models\SubjectData::where('classfication', 4)->get();
        $max_test_id = \App\Models\TestResult::where('s_id',$id)->max('test_id')+1;
        // $items = \App\Models\TestResult::where('s_id',$id)->where('test_id',1)->orderBy('subject_id', 'asc')->get();
        $list=[];
        
        for($i=0;$i<$max_test_id-1;$i++){
            $list[$i] =[
                'items' => \App\Models\TestResult::where('s_id',$id)->where('test_id',$i+1)->orderBy('implimantation', 'desc')->orderBy('subject_id', 'asc')->get(),
                ];
        }
        
        // var_dump($list[0]['items'][1]['score']);
        // var_dump($items);
        return view('test_results',compact('primarys','juniorhighs','highs','specials','max_test_id','list'));
    }
    
    function postdata(Request $request){
        $data =[
            'implimantation' => $request->implimantation,
            's_id' => $request->s_id,
            'test_id' => $request->test_id,
            'test_name' => $request->test_name,
            'subject_id' => $request->subject_id,
            'score' => $request->score,
            ];
        return $data;
    }
    function regist(Request $request){
        $data = $this->postdata($request);
        $now = Carbon::now('Asia/Tokyo');
        $list = [];
        for($i=0;$i<count($data['subject_id']);$i++){
            $list[$i] = [
                'implimantation' =>$data['implimantation'],
                's_id' => $data['s_id'],
                'test_id' =>$data['test_id'],
                'test_name' =>$data['test_name'],
                'subject_id' =>$data['subject_id'][$i],
                'subject_name'=>\App\Models\SubjectData::where('id', $data['subject_id'][$i])->value('subject_name'),
                'score' =>$data['score'][$i],
                'updated_at' => $now,
                'created_at' => $now,
                ];
        }
        DB::table('test_results')->insert($list);
        return redirect()->to('/test_results');
    }
    function test_delete(Request $request){
        $test_id = $request->id;
        $s_id = $request->session()->get('id');
        $delete_ids = \App\Models\TestResult::where('test_id',$test_id)->where('s_id',$s_id)->delete();
        return redirect()->to('/test_results');
    }
}