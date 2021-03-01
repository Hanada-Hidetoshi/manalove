@extends('admins.adminlayout')
@section('content')
<div class="main">
<div class="wrapper">
<div class="frame">
  <h1>アカウント変更</h1>
  @if(!empty($process_message))
    <p>{{$process_message}}</p>
  @endif
  <div class="inner">
    <form action="/admin/users/complete" method="post">
      @csrf
      <input type="hidden" name="user_attribute" value="{{$data['user_attribute']}}">
      <div class="item">
        <div class="required">
          <label for="name">氏名</label>
        </div>
        <div class="link_items2">
          <label for="last_name">苗字：</label>
          <input type="hidden" name="last_name" value="{{$data['last_name']}}">
          <p>{{$data['last_name']}}</p>
        </div>
        <div class="link_items2">
          <label for="first_name">名前：</label>
          <input type="hidden" name="first_name" value="{{$data['first_name']}}">
          <p>{{$data['first_name']}}</p>
        </div>
      </div>
      <div class="item">
        <div class="required">
          <label for="name">ふりがな</label>
        </div>
        <div class="link_items2">
          <label for="last_name_fri">みょうじ：</label>
          <input type="hidden" name="last_name_fri" value="{{$data['last_name_fri']}}">
          <p>{{$data['last_name_fri']}}</p>
        </div>
        <div class="link_items2">
          <label for="first_name_fri">なまえ：</label>
          <input type="hidden" name="first_name_fri" value="{{$data['first_name_fri']}}">
          <p>{{$data['first_name_fri']}}</p>
        </div>
      </div>
      <div class="item">
        <div class="required">
          <label for="birth_day">生年月日</label>
        </div>
        <input type="hidden" name="birth_day" value="{{$data['birth_day']}}">
        <p>{{$data['birth_day']}}</p>
      </div>
      <div class="item">
        <div class="required">
          <label for="prefecture">居住都道府県</label>
        </div>
        <input type="hidden" name="prefecture" value="{{$data['prefecture']}}">
        <p>{{$data['prefecture']}}</p>
      </div>
      <div class="item">
        <div class="required">
          <label for="view_name">ニックネーム</label>
        </div>
        <input type="hidden" name="view_name" value="{{$data['view_name']}}">
        <p>{{$data['view_name']}}</p>
      </div>
      <div class="item">
        <div class="required">
          <label for="mail_address">メールアドレス</label>
        </div>
        <input type="hidden" name="email" value="{{$data['email']}}">
        <p>{{$data['email']}}</p>
      </div>
      <div class="item">
        <div class="required">
          <label for="user_id">ユーザーID</label>
        </div>
        <input type="hidden" name="user_id" value="{{$data['user_id']}}">
        <p>{{$data['user_id']}}</p>
      </div>
      <div class="item">
        <div class="required">
          <label for="password">パスワード</label>
        </div>
        <input type="hidden" name="password" value="{{$data['password']}}">
        <p>{{$data['password']}}</p>
      </div>
      @if( $data['user_attribute'] ==1)
       <!--生徒用 -->
      <div class="item">
        <div class="required">
          <label for="course">学年/コース</labe>
        </div>
        <input type="hidden" name="course" value="{{$data['course']}}">
        @if($data['course']<=6)
          <p>小学{{$data['course']}}年生</p>
        @elseif($data['course']<=9)
          <p>中学{{$data['course']-6}}年生</p>
        @elseif($data['course']<=12)
          <p>高校{{$data['course']-9}}年生</p>
        @else
          <p>浪人生・一般</p>
        @endif
      </div>
      @elseif( $data['user_attribute'] ==0)
       <!--講師用 -->
      <div class="item">
        <div class="required">
          <label for="university">出身大学</label>
        </div>
        <input type="hidden" name="university" value="{{$data['university']}}">
        <p>{{$data['university']}}</p>
      </div>
      <div class="item">
        <div class="required">
          <label for="faculty">学部</label>
        </div>
        <input type="hidden" name="faculty" value="{{$data['faculty']}}">
        <p>{{$data['faculty']}}</p>
      </div>
      <div class="item">
        <div class="option">
          <label for="department">学科</label>
        </div>
        <input type="hidden" name="department" value="{{$data['department']}}">
        <p>{{$data['department']}}</p>
      </div>
      <div class="item">
        <div class="required">
          <label for="liberal">文理</label>
        </div>
        <input type="hidden" name="liberal" value="{{$data['liberal']}}">
        @if($data['liberal'] ==='0')
          <p>文系</p>
        @elseif($data['liberal'] ==='1')
          <p>理系</p>
        @endif
      </div>
      <div class="item">
        <div class="required">
          <label for="name">受験経験</label>
        </div>
        <div class="link_items2">
          <label for="j_h_exam">中学受験：</label>
          <input type="hidden" name="j_h_exam" value="{{$data['j_h_exam']}}">
          @if($data['j_h_exam'] ==='0')
            <p>無</p>
          @elseif($data['j_h_exam'] ==='1')
            <p>有</p>
          @endif
        </div>
        <div class="link_items2">
          <label for="hexam">高校受験：</label>
          <input type="hidden" name="h_exam" value="{{$data['h_exam']}}">
          @if($data['h_exam'] ==='0')
            <p>無</p>
          @elseif($data['h_exam'] ==='1')
            <p>有</p>
          @endif
        </div>
      </div>
      <div class="item">
        <div class="option">
          <label for="subjects">指導可能教科</label>
        </div>
        <div class="clump">
          <div class="subjects">
            <div class="j_h_subject">
              <p class="subject_title">小・中科目：</p>
              <p>{{$data['subjects']}}</p>
            </div>
            <div class="h_subject">
              <p class="subject_title">高校科目：</p>
              <p>{{$data['subjects']}}</p>
            </div>
            <div class="special_subject">
              <p class="subject_title">専門科目：</p>
              <p>{{$data['subjects']}}</p>
            </div>
          </div>
        </div>
      </div>
      @endif
      <div class="item">
        <div class="option">
          <label for="comment">コメント</label>
        </div>
        <input type="hidden" name="comment" value="{{$data['comment']}}">
        <p>{{$data['comment']}}</p>
      </div>
      <input type="submit" value="変更する">
    </form>
  </div>
</div>
</div>
</div>
@endsection
