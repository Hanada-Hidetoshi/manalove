<?php

namespace App\Http\Controllers;
use App\Models\UserData;
use Illuminate\Http\Request;
use Session;

class MessageController extends Controller
{
    function index2(Request $request){
        $id = $request->session()->get('id');
        $kari = \App\Models\UserData::where('id', $id)->value('kari');
        $matching = \App\Models\UserData::where('id', $id)->value('matching');
        $teacher_ids = explode(',', $matching);
        $child_ids = explode(',', $kari);
        $matchingusers = \App\Models\UserData::wherein('id', $teacher_ids)->get();
        $karis = \App\Models\UserData::wherein('id', $kari_ids)->get();
        return view('message_data',compact('matchingusers','karis'));
    }
    function matching(Request $request){
        $my_id = $request->session()->get('id');
        $opponent_id = $request->id;
        $my_karis = \App\Models\UserData::where('id', $my_id)->value('kari');
        $my_matchings = \App\Models\UserData::where('id', $my_id)->value('matching');
        $op_karis = \App\Models\UserData::where('id', $opponent_id)->value('kari');
        $op_matchings = \App\Models\UserData::where('id', $opponent_id)->value('matching');
        
        /*
        $my_kari_syounin = syounin($my_karis, $opponent_id);
        $op_kanri_syounin = syounin($op_karis, $my_id);
        $my_kari_syounin = syounin($my_karis, $opponent_id);
        $my_kari_syounin = syounin($my_karis, $opponent_id);
        */
        $spl = "";
        $my_kari_syounin = "";
        foreach($my_karis as $my_kari) {
            if ($my_kari != $opponent_id){
                $my_kari_syounin = $my_kari_syounin . $spl . $my_kari;
                $spl = ",";
            }
        }
        $spl = "";
        $my_syounin = "";
        foreach($my_karis as $my_kari) {
            if ($my_kari != $opponent_id){
                $my_kari_syounin = $my_kari_syounin . $spl . $my_kari;
                $spl = ",";
            }
        }
        $op_kanri_syounin = "";
        foreach($op_karis as $my_kari) {
            if ($op_kari != $my_id){
                $my_kari_syounin = $my_kari_syounin . $spl . $my_kari;
                $spl = ",";
            }
        }
        // 更新処理
        DB::table('user_datas')->where('id',$my_id)->update([
                'kari' => $my_kari_syounin,
                'matching' => $my_syounin,
            ]);
        DB::table('user_datas')->where('id',$opponent_id)->update([
                'kari' => $my_kari_syounin,
                'matching' => $my_syounin,
            ]);
        // return redirect()->route('matching');
    }
    
    /*
    // 承認用の関数
    private function syounin($ids, $id){
        $spl = "";
        $syounin = "";
        foreach($ids as $val) {
            if ($val != $id){
                $syounin = $syounin . $spl . $val;
                $spl = ",";
            }
        }
        return $syounin;
    }
    */
}