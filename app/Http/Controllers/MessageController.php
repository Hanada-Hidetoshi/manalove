<?php

namespace App\Http\Controllers;
use App\Models\UserData;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MessageController extends Controller
{
    function index(Request $request){
        $id = $request->session()->get('id');
        $waiting = \App\Models\UserData::where('id', $id)->value('waiting');
        $matching = \App\Models\UserData::where('id', $id)->value('matching');
        $from_myself = \App\Models\UserData::where('id', $id)->value('from_myself');
        $matching_ids = explode(',', $matching);
        $waiting_ids = explode(',', $waiting);
        $from_myself_ids = explode(',', $from_myself);
        $matching_users = \App\Models\UserData::wherein('id', $matching_ids)->get();
        $waiting_users = \App\Models\UserData::wherein('id', $waiting_ids)->get();
        $from_myself_users = \App\Models\UserData::wherein('id', $from_myself_ids)->get();
        return view('message_data',compact('matching_users','waiting_users','from_myself_users'));
    }
    function matching(Request $request){
        // 自分のidを取得
        $my_id = $request->session()->get('id');
        // 相手のidを取得
        $opponent_id = $request->id;
        // 自分の待機列情報を取得
        $my_waitings = \App\Models\UserData::where('id', $my_id)->value('waiting');
        // 自分のマッチング情報を取得
        $my_matchings = \App\Models\UserData::where('id', $my_id)->value('matching');
        // 相手の自分から申請情報を取得
        $op_from_myselfs = \App\Models\UserData::where('id', $opponent_id)->value('from_myself');
        // 相手のマッチング情報を取得
        $op_matchings = \App\Models\UserData::where('id', $opponent_id)->value('matching');
        
        // 自分の待機id列から相手のidを消す
        $my_waiting_approval = $this->idDelete($my_waitings, $opponent_id);
        // 自分のマッチングid列に相手のidを追加する
        $my_matching_approval = $this->idUpdate($my_matchings, $opponent_id);
        // 相手の自分から申請したid列から自分のidを消す
        $op_from_myself_approval = $this->idDelete($op_from_myselfs, $my_id);
        // 相手のマッチングid列に自分のidを追加する
        $op_matching_approval = $this->idUpdate($op_matchings, $my_id);
        // 更新処理
        // 自分の待機id列とマッチングid列を更新
        DB::table('user_datas')->where('id',$my_id)->update([
                'waiting' => $my_waiting_approval,
                'matching' => $my_matching_approval,
            ]);
        // 相手の自分から申請id列とマッチング列を更新
        DB::table('user_datas')->where('id',$opponent_id)->update([
                'from_myself' => $op_from_myself_approval,
                'matching' => $op_matching_approval,
            ]);
        return redirect()->route('matching');
    }
    function reject(Request $request){
        // 自分のidを取得
        $my_id = $request->session()->get('id');
        // 相手のidを取得
        $opponent_id = $request->id;
        // 自分の待機情報を取得
        $my_waitings = \App\Models\UserData::where('id', $my_id)->value('waiting');
        // 相手の自分から申請情報を取得
        $op_from_myselfs = \App\Models\UserData::where('id', $opponent_id)->value('from_myself');
        // 自分の待機id列から相手のidを消す
        $my_waiting_approval = $this->idDelete($my_waitings, $opponent_id);
        // 相手の自分から申請したid列から自分のidを消す
        $op_from_myself_approval = $this->idDelete($op_from_myselfs, $my_id);
        // 自分の待機id列を更新
        DB::table('user_datas')->where('id',$my_id)->update([
                'waiting' => $my_waiting_approval,
            ]);
        // 相手の自分から申請id列を更新
        DB::table('user_datas')->where('id',$opponent_id)->update([
                'from_myself' => $op_from_myself_approval,
            ]);
        return redirect()->route('matching');
    }
    function waiting(Request $request){
        // 自分のidを取得
        $my_id = $request->session()->get('id');
        // 相手のidを取得
        $opponent_id = $request->id;
        // 自分の自分から申請情報を取得
        $my_from_myselfs = \App\Models\UserData::where('id', $my_id)->value('from_myself');
        // 相手の待機情報を取得
        $op_waitings = \App\Models\UserData::where('id', $opponent_id)->value('waiting');
        
        // 相手の待機id列に自分のidを追加する
        $op_waiting_approval = $this->idUpdate($op_waitings, $my_id);
        // 自分の自分から申請列に相手のidを追加する
        $my_from_myself_approval = $this->idUpdate($my_from_myselfs, $opponent_id);
        // 相手の待機id列を更新
        DB::table('user_datas')->where('id',$opponent_id)->update([
                'waiting' => $op_waiting_approval,
            ]);
        // 自分の自分から申請id列を更新
        DB::table('user_datas')->where('id',$my_id)->update([
                'from_myself' => $my_from_myself_approval,
            ]);
        return redirect()->route('matching');
    }
    function withdraw(Request $request){
        // 自分のidを取得
        $my_id = $request->session()->get('id');
        // 相手のidを取得
        $opponent_id = $request->id;
        // 自分の自分から申請情報を取得
        $my_from_myselfs = \App\Models\UserData::where('id', $my_id)->value('from_myself');
        // 相手の待機情報を取得
        $op_waitings = \App\Models\UserData::where('id', $opponent_id)->value('waiting');
        
        // 相手の待機id列から自分のidを削除する
        $op_waiting_approval = $this->idDelete($op_waitings, $my_id);
        // 自分の自分から申請列から相手のidを削除する
        $my_from_myself_approval = $this->idDelete($my_from_myselfs, $opponent_id);
        // 相手の待機id列を更新
        DB::table('user_datas')->where('id',$opponent_id)->update([
                'waiting' => $op_waiting_approval,
            ]);
        // 自分の自分から申請id列を更新
        DB::table('user_datas')->where('id',$my_id)->update([
                'from_myself' => $my_from_myself_approval,
            ]);
        return redirect()->route('matching');
    }
    
    // 承認用の関数
    // 第一引数id列の中から、第二引数idの値を探し、一致したらそのidを消す。それ以外はid列に残す
    private function idDelete($ids, $id){
        $spl = "";
        $result = "";
        $ids = explode(',', $ids);
        if(is_array($ids)){
            foreach($ids as $val) {
                if ($val != $id){
                    $result = $result . $spl . $val;
                    $spl = ",";
                }
            }
        }else{ 
            if ($ids == $id){
                $result =  "";
            }
        }
        return $result;
    }
    // 第一引数id列に、第二引数idの値を追加する
    private function idUpdate($ids, $id){
        $result = "";
        if($ids != null){
            $result = $ids . ',' . $id;
        }else{
            $result = $id;
        }
        return $result;
    }
    
}