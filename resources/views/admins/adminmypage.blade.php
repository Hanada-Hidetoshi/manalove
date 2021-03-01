@extends('admins.adminlayout')
@section('content')
<div class="administrator">
  <div class="new_account">
    <div class="new_account_data">
      <h2>今日（{{$items['today']}}）</h2>
      <p>{{$items['day1_regist']}}<span>人</span></p>
    </div>
    <div class="new_account_data">
      <h2>今週</h2>
      <p>{{$items['week_regist']}}<span>人</span></p>
    </div>
    <div class="new_account_data">
      <h2>今月</h2>
      <p>{{$items['month_regist']}}<span>人</span></p>
    </div>
    <div class="new_account_data">
      <h2>今年</h2>
      <p>{{$items['year_regist']}}<span>人</span></p>
    </div>
    <div class="new_account_data">
      <h2>全て</h2>
      <p>{{$items['all_regist']}}<span>人</span></p>
    </div>
  </div>
  <table>
    <div class="weekly_summary">
      <div class="day">
        今週の登録者数
        <tr>
          <th><h2>集計項目</h2></th>
          <th><h2>{{$items['sixdays_ago']}}</h2></th>
          <th><h2>{{$items['fivedays_ago']}}</h2></th>
          <th><h2>{{$items['fourdays_ago']}}</h2></th>
          <th><h2>{{$items['threedays_ago']}}</h2></th>
          <th><h2>{{$items['twodays_ago']}}</h2></th>
          <th><h2>{{$items['yesterday']}}</h2></th>
          <th><h2>{{$items['today']}}</h2></th>
        </tr>
        <tr>
          <td><p>全体</p></td>
          <td><p>{{$items['day7_regist']}}<span>人</span></p></td>
          <td><p>{{$items['day6_regist']}}<span>人</span></p></td>
          <td><p>{{$items['day5_regist']}}<span>人</span></p></td>
          <td><p>{{$items['day4_regist']}}<span>人</span></p></td>
          <td><p>{{$items['day3_regist']}}<span>人</span></p></td>
          <td><p>{{$items['day2_regist']}}<span>人</span></p></td>
          <td><p>{{$items['day1_regist']}}<span>人</span></p></td>
        </tr>
        <tr>
          <td><p>教師</p></td>
          <td><p>{{$items['day7_regist_t']}}<span>人</span></p></td>
          <td><p>{{$items['day6_regist_t']}}<span>人</span></p></td>
          <td><p>{{$items['day5_regist_t']}}<span>人</span></p></td>
          <td><p>{{$items['day4_regist_t']}}<span>人</span></p></td>
          <td><p>{{$items['day3_regist_t']}}<span>人</span></p></td>
          <td><p>{{$items['day2_regist_t']}}<span>人</span></p></td>
          <td><p>{{$items['day1_regist_t']}}<span>人</span></p></td>
        </tr>
        <tr>
          <td><p>生徒</p></td>
          <td><p>{{$items['day7_regist_s']}}<span>人</span></p></td>
          <td><p>{{$items['day6_regist_s']}}<span>人</span></p></td>
          <td><p>{{$items['day5_regist_s']}}<span>人</span></p></td>
          <td><p>{{$items['day4_regist_s']}}<span>人</span></p></td>
          <td><p>{{$items['day3_regist_s']}}<span>人</span></p></td>
          <td><p>{{$items['day2_regist_s']}}<span>人</span></p></td>
          <td><p>{{$items['day1_regist_s']}}<span>人</span></p></td>
        </tr>
        <tr>
          <td><p>学習ログの登録</p></td>
          <td><p>{{$items['day7_studylog']}}<span>件</span></p></td>
          <td><p>{{$items['day6_studylog']}}<span>件</span></p></td>
          <td><p>{{$items['day5_studylog']}}<span>件</span></p></td>
          <td><p>{{$items['day4_studylog']}}<span>件</span></p></td>
          <td><p>{{$items['day3_studylog']}}<span>件</span></p></td>
          <td><p>{{$items['day2_studylog']}}<span>件</span></p></td>
          <td><p>{{$items['day1_studylog']}}<span>件</span></p></td>
        </tr>
        <tr>
          <td><p>授業実績</p></td>
          <td><p>{{$items['day7_performance']}}<span>件</span></p></td>
          <td><p>{{$items['day6_performance']}}<span>件</span></p></td>
          <td><p>{{$items['day5_performance']}}<span>件</span></p></td>
          <td><p>{{$items['day4_performance']}}<span>件</span></p></td>
          <td><p>{{$items['day3_performance']}}<span>件</span></p></td>
          <td><p>{{$items['day2_performance']}}<span>件</span></p></td>
          <td><p>{{$items['day1_performance']}}<span>件</span></p></td>
        </tr>
      </table>
    </div>
  </div>
</main>
@endsection