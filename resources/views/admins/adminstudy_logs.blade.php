@extends('admins.adminlayout')
@section('content')
<table>
  <tr>
    <th>ID</th>
    <th>生徒id・生徒名</th>
    <th>実施日</th>
    <th>教科</th>
    <th>開始時刻</th>
    <th>終了時刻</th>
    <th>勉強時間</th>
    <th>内容・まとめ</th>
    <th>変更</th>
    <th>削除</th>
  </tr>
  @foreach($items as $item)
    <tr>
      <td>{{$item['id']}}</td>
      <td><span>{{$item['s_id']}}</span><span>{{$item['s_name']}}</span></td>
      <td>{{$item['implimantation']}}</td>
      <td>{{$item['subject']}}</td>
      <td>{{$item['start_time']}}</td>
      <td>{{$item['end_time']}}</td>
      <td>{{$item['elapsed_time']}}</td>
      <td>{{$item['summary']}}</td>
      <td class="action"><a href="/admin/studylogs/edit/{{$item['id']}}" class="button_edit">変更</a></td>
      <td class="action"><a href="/admin/studylogs/delete/{{$item['id']}}" class="delete button_delete">削除</a></td>
    </tr>
    @endforeach
</table>
@endsection