<?php

namespace App\Http\Controllers;
use App\Models\UserData;
use Illuminate\Http\Request;
use App\Models\StudyLog;
use Carbon\Carbon;
use Session;

class MypageController extends Controller
{
    function index(Request $request){
        $id = $request->session()->get('id');
        $daydata = Carbon::today();
        $thismonth = $daydata->format("Y-m-1");
        $thisyear = $daydata->format("Y-1-1");
        $daydata1 = $daydata->format("Y-m-d");
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
            ];
        $day0s = $this->query($daydata1,$id);
        $day1s = $this->query($daydata2,$id);
        $day2s = $this->query($daydata3,$id);
        $day3s = $this->query($daydata4,$id);
        $day4s = $this->query($daydata5,$id);
        $day5s = $this->query($daydata6,$id);
        $day6s = $this->query($daydata7,$id);
        return view('mypage',compact('items','day0s','day1s','day2s','day3s','day4s','day5s','day6s'));
    }
    private function query($days,$id){
        $result ='';
        $result =\App\Models\StudyLog::where('s_id',$id)->where('implimantation',$days)->get();
        return $result;
    }
}