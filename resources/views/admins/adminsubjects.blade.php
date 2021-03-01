@extends('admins.adminlayout')
@section('content')
<table class="regist_form">
  <tr>
    <th style="width:10%">分類ID</th>
    <th style="width:35%">分類名</th>
    <th style="width:35%">科目名</th>
    <th style="width:20%">登録</th>
  </tr>
    <tr>
      <form action="/admin/subjects/regist">
      <td><input name="classfication" type="text"></td>
      <td><input name="classfication_name" type="text"></td>
      <td><input name="subject_name" type="text"></td>
      <td>
        <div class="new_subject">
            <input type="submit" value="新規登録">
        </div>
      </td>
      </form>
    </tr>
</table>
<hr>
<table>
  <tr>
    <th>ID</th>
    <th>分類名</th>
    <th>科目名</th>
    <th>変更</th>
    <th>削除</th>
  </tr>
  @foreach($items as $item)
    <tr>
      <td>{{$item['id']}}</td>
      <td>{{$item['classfication']}}：{{$item['classfication_name']}}</td>
      <td>{{$item['subject_name']}}</td>
      <td class="action"><a href="/admin/subjects/edit/{{$item['id']}}" class="button_edit">変更</a></td>
      <td class="action"><a href="/admin/subjects/delete/{{$item['id']}}" class="delete button_delete">削除</a></td>
    </tr>
  @endforeach
</table>
@endsection