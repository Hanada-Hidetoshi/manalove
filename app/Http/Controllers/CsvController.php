<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\StudyLog;
use Carbon\Carbon;
use Session;

class CsvController extends Controller
{
  function getData(Request $request){
    $userdata=[];
    $s_id = $request->session()->get('id');
    $userdata = \App\Models\StudyLog::where('s_id',$s_id)->orderBy('implimantation', 'desc')->get()->toArray();
    /*$maxId = \App\Models\StudyLog::where('s_id',$s_id)->max('id');
    for($i=0;$i<$maxId;$i++){
      if(\App\Models\StudyLog::where('s_id',$s_id)->where('id',$i)->exists()){
        array_push($userdata,\App\Models\StudyLog::where('s_id',$s_id)->where('id',$i)->get()->toArray());
      }
    }*/
    return $userdata;
  }
  function putCsv(Request $request) {
    $userdata = $this->getData($request);
    try {
      //CSV形式で情報をファイルに出力のための準備
      $csvFileName = "csv/" . time() . rand() . '.csv';
      $fileName = time() . rand() . '.csv';
      $res = fopen($csvFileName, 'w');
      if ($res === FALSE) {
        throw new Exception('ファイルの書き込みに失敗しました。');
      }else {
        fwrite($res, pack('C*',0xEF,0xBB,0xBF)); // BOM をつける
      }
      // 項目名先に出力
      $header = ["id", "implimantation", "subject", "elapsed_time","summary"];
      fputcsv($res, $header);
      // ループしながら出力
      foreach($userdata as $dataInfo) {
        // 文字コード変換。エクセルで開けるようにする
        mb_convert_variables('SJIS', 'UTF-8', $dataInfo);
        // ファイルに書き出しをする
        fputcsv($res, $dataInfo);
      }
        // ファイルを閉じる
      fclose($res);
      // ダウンロード開始
      // ファイルタイプ（csv）
      header('Content-Type: application/octet-stream');
      // ファイル名
      header('Content-Disposition: attachment; filename=' . $fileName); 
      // ファイルのサイズ　ダウンロードの進捗状況が表示
      header('Content-Length: ' . filesize($csvFileName)); 
      header('Content-Transfer-Encoding: binary');
      // ファイルを出力する
      readfile($csvFileName);
      
    } catch(Exception $e) {
      // 例外処理をここに書きます
      echo $e->getMessage();
    }
  }
}
