@extends('admins.adminlayout')
@section('content')
<div class="administrator">
  <div class="new_account">
    <div class="new_account_data">
      <h2>今日（{{$items['day0_ago']}}）</h2>
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
          @for ($i = 6; $i >= 0; $i--)
          <th><h2>{{$items['day'.$i.'_ago']}}</h2></th>
          @endfor
        </tr>
        <tr>
          <td><p>全体</p></td>
          @for ($i = 7; $i > 0; $i--)
          <td><p>{{$items['day'.$i.'_regist']}}<span>人</span></p></td>
          @endfor
        </tr>
        <tr>
          <td><p>教師</p></td>
          @for ($i = 7; $i > 0; $i--)
          <td><p>{{$items['day'.$i.'_regist_t']}}<span>人</span></p></td>
          @endfor
        </tr>
        <tr>
          <td><p>生徒</p></td>
          @for ($i = 7; $i > 0; $i--)
          <td><p>{{$items['day'.$i.'_regist_s']}}<span>人</span></p></td>
          @endfor
        </tr>
        <tr>
          <td><p>学習ログの登録</p></td>
          @for ($i = 7; $i > 0; $i--)
          <td><p>{{$items['day'.$i.'_studylog']}}<span>件</span></p></td>
          @endfor
        </tr>
        <tr>
          <td><p>授業実績</p></td>
          @for ($i = 7; $i > 0; $i--)
          <td><p>{{$items['day'.$i.'_performance']}}<span>件</span></p></td>
          @endfor
        </tr>
      </table>
    </div>
  </div>
</main>
@endsection