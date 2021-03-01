@extends('admins.adminlayout')
@section('content')
<table>
  <tr>
    <th style="width:10%">分類ID</th>
    <th style="width:35%">分類名</th>
    <th style="width:35%">科目名</th>
    <th style="width:20%">登録</th>
  </tr>
    <tr>
      <form action="/admin/subjects/complete">
      @foreach($items as $item)
      <td><input name="classfication" type="text" value="{{$item['classfication']}}"></td>
      <td><input name="classfication_name" type="text" value="{{$item['classfication_name']}}"></td>
      <td><input name="subject_name" type="text" value="{{$item['subject_name']}}"></td>
      <td>
        <div class="new_subject">
            <input type="submit" value="登録情報変更">
        </div>
      </td>
      @endforeach
      </form>
    </tr>
</table>
@endsection