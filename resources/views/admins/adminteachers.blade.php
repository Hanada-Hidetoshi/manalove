@extends('admins.adminlayout')
@section('content')
<table>
  <tr>
    <th>ID</th>
    <th>登録日</th>
    <th>名前</th>
    <th>誕生日</th>
    <th>都道府県</th>
    <th>表示名</th>
    <th>メールアドレス</th>
    <th>ユーザーID</th>
    <th>パスワード</th>
    <th>大学情報</th>
    <th>時給</th>
    <th>変更</th>
    <th>削除</th>
  </tr>
  @foreach($items as $item)
    <tr>
      <td>{{$item['id']}}</td>
      <td>{{$item['regist_day']}}</td>
      <td><span>{{$item['last_name']}}</span><span>{{$item['first_name']}}</span></td>
      <td>{{$item['birth_day']}}</td>
      <td>{{$item['prefecture']}}</td>
      <td>{{$item['view_name']}}</td>
      <td>{{$item['email']}}</td>
      <td>{{$item['user_id']}}</td>
      <td>{{$item['password']}}</td>
      <td><span>{{$item['university']}}</span><span>{{$item['faculty']}}</span><span>{{$item['department']}}</span></td>
      <td>{{$item['hour_pays']}}</td>
      <td class="action"><a href="/admin/users/edit/{{$item['id']}}" class="button_edit">変更</a></td>
      <td class="action"><a href="/admin/users/delete/{{$item['id']}}" class="delete button_delete">削除</a></td>
    </tr>
    @endforeach
</table>
@endsection