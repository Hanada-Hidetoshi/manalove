@extends('admins.adminlayout')
@section('content')
<table>
  <tr>
    <th>ID</th>
    <th>予定日</th>
    <th>実施日</th>
    <th>科目</th>
    <th>先生情報</th>
    <th>生徒情報</th>
    <th>内容</th>
    <th>先生コメント</th>
    <th>生徒コメント</th>
    <th>変更</th>
    <th>削除</th>
  </tr>
  @foreach($items as $item)
    <tr>
      <td>{{$item['id']}}</td>
      <td>{{$item['scheduled']}}</td>
      <td>{{$item['implimantation']}}</td>
      <td>{{$item['subject']}}</td>
      <td><span>ID:{{$item['t_id']}}</span><span>{{$item['t_name']}}</span></td>
      <td><span>ID:{{$item['s_id']}}</span><span>{{$item['s_name']}}</span></td>
      <td>{{$item['content']}}</td>
      <td>{{$item['t_comment']}}</td>
      <td>{{$item['s_comment']}}</td>
      <td class="action"><a href="/">変更</a></td>
      <td class="action"><a href="/">削除</a></td>
    </tr>
    @endforeach
</table>
@endsection