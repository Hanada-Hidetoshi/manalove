@extends('admins.adminlayout')
@section('content')
<div class="container">
<div class="main">
<div class="wrapper">
<div class="frame">
<h1>アカウント情報</h1>
<div class="inner">
  @foreach($items as $item)
  <form action="/admin/users/confirm/{{$item['id']}}" method="post">
    @csrf
    @if($item['user_attribute'] ==0)
      <input type="hidden" name="user_attribute" value=0>
    @elseif($item['user_attribute'] ==1)
      <input type="hidden" name="user_attribute" value=1>
    @endif
    <div class="item">
      <div class="required">
        <label for="name">氏名</label>
        <p>必須</p>
      </div>
      <div class="link_names">
        @if ($errors->has('last_name'))
          @foreach($errors->get('last_name') as $message)
            <p class="error_message">{{ $message }}</p>
          @endforeach
        @endif
        <label for="last_name">苗字：</label>
        <input type="text" placeholder="山田" name="last_name" value="{{ old('last_name',$item['last_name'] ?? '') }}">
      </div>
      <div class="link_names">
        @if ($errors->has('first_name'))
          @foreach($errors->get('first_name') as $message)
            <p class="error_message">{{ $message }}</p>
          @endforeach
        @endif
        <label for="first_name">名前：</label>
        <input type="text" placeholder="太郎" name="first_name" value="{{ old('first_name',$item['first_name'] ?? '') }}">
      </div>
    </div>
    <div class="item">
      <div class="required">
        <label for="name">ふりがな</label>
        <p>必須</p>
      </div>
      <div class="link_names">
        @if ($errors->has('last_name_fri'))
          @foreach($errors->get('last_name_fri') as $message)
            <p class="error_message">{{ $message }}</p>
          @endforeach
        @endif
        <label for="last_name_fri">みょうじ：</label>
        <input type="text" placeholder="やまだ" name="last_name_fri" value="{{ old('last_name_fri',$item['last_name_fri'] ?? '') }}">
      </div>
      <div class="link_names">
        @if ($errors->has('first_name_fri'))
          @foreach($errors->get('first_name_fri') as $message)
          <p class="error_message">{{ $message }}</p>
          @endforeach
        @endif
        <label for="first_name_fri">なまえ：</label>
        <input type="text" placeholder="たろう" name="first_name_fri" value="{{ old('first_name_fri',$item['first_name_fri'] ?? '') }}">
      </div>
    </div>
    <div class="item">
      <div class="required">
        <label for="birth_day">生年月日</label>
        <p>必須</p>
      </div>
      <div class="link_item">
        @if ($errors->has('birth_day'))
          @foreach($errors->get('birth_day') as $message)
            <p class="error_message">{{ $message }}</p>
          @endforeach
        @endif
        <input type="date" name="birth_day" value="{{ old('birth_day',$item['birth_day'] ?? '') }}">
      </div>
    </div>
    <div class="item">
      <div class="required">
        <label for="prefecture">居住都道府県</label>
        <p>必須</p>
      </div>
        <div class="link_item">
          @if ($errors->has('prefecture'))
            @foreach($errors->get('prefecture') as $message)
              <p class="error_message">{{ $message }}</p>
            @endforeach
          @endif
            <input type="text" name="prefecture" value="{{ old('prefecture',$item['prefecture'] ?? '') }}">
          </div>
      </div>
      <div class="item">
        <div class="required">
          <label for="view_name">ニックネーム</label>
          <p>必須</p>
        </div>
        <div class="link_item">
          @if ($errors->has('view_name'))
            @foreach($errors->get('view_name') as $message)
              <p class="error_message">{{ $message }}</p>
            @endforeach
          @endif
          <p class="caution">講師・生徒とマッチングするまではこの名前で表示されます</p>
          <input type="text" placeholder="例）だーやま" name="view_name" value="{{ old('view_name',$item['view_name'] ?? '') }}">
        </div>
      </div>
      <div class="item">
        <div class="required">
          <label for="mail_address">メールアドレス</label>
          <p>必須</p>
        </div>
        <div class="link_item">
          @if ($errors->has('email'))
            @foreach($errors->get('email') as $message)
              <p class="error_message">{{ $message }}</p>
            @endforeach
          @endif
          <input type="email" placeholder="yamada@example.com" name="email" value="{{ old('email',$item['email'] ?? '') }}">
        </div>
      </div>
      <div class="item">
        <div class="required">
          <label for="user_id">ユーザーID</label>
          <p>必須</p>
        </div>
          <div class="link_item">
            @if ($errors->has('user_id'))
              @foreach($errors->get('user_id') as $message)
                <p class="error_message">{{ $message }}</p>
              @endforeach
            @endif
            <input type="text" placeholder="taroyamada" name="user_id" value="{{ old('user_id',$item['user_id'] ?? '') }}">
          </div>
        </div>
        <div class="item">
          <div class="required">
            <label for="password">パスワード</label>
            <p>必須</p>
          </div>
          <div class="link_item">
            @if ($errors->has('password'))
              @foreach($errors->get('password') as $message)
                <p class="error_message">{{ $message }}</p>
              @endforeach
            @endif
          <input name ="password" type="password" placeholder="8文字以上で入力" value="{{ old('password',$item['password'] ?? '') }}">
        </div>
      </div>
      <div class="item">
        <div class="required">
          <label for="password_confirmation">パスワード（確認）</label>
          <p>必須</p>
        </div>
        <div class="link_item">
          <input name="password_confirmation" type="password" placeholder="8文字以上で入力">
        </div>
      </div>
      @if( $item['user_attribute'] ==1)
      <!-- 生徒用 -->
      <div class="item">
        <div class="required">
          <label for="course">学年/コース</label>
          <p>必須</p>
        </div>
        <div class="link_item">
        @if ($errors->has('course'))
          @foreach($errors->get('course') as $message)
            <p class="error_message">{{ $message }}</p>
          @endforeach
        @endif
        <select name="course" value="{{ old('course',$item['course'] ?? '') }}">
          <option value="" hidden>学年を選択してください</option>
          <option value="1">小学1年生</option>
          <option value="2">小学2年生</option>
          <option value="3">小学3年生</option>
          <option value="4">小学4年生</option>
          <option value="5">小学5年生</option>
          <option value="6">小学6年生</option>
          <option value="7">中学1年生</option>
          <option value="8">中学2年生</option>
          <option value="9">中学3年生</option>
          <option value="10">高校1年生</option>
          <option value="11">高校2年生</option>
          <option value="12">高校3年生</option>
          <option value="13">浪人生・一般</option>
        </select>
      </div>
    </div>
      <div class="item">
        <div class="required">
          <label for="matching">マッチング情報</label>
          <p>必須</p>
        </div>
        <div class="link_item">
        @if ($errors->has('matching'))
          @foreach($errors->get('course') as $message)
            <p class="error_message">{{ $message }}</p>
          @endforeach
        @endif
        <input type="text" placeholder="1,2,3,4" name="matching" value="{{ old('matching',$item['matching'] ?? '') }}">
      </div>
    </div>
    @elseif( $item['user_attribute'] ==0)
    <!-- 講師用 -->
    <div class="item">
      <div class="required">
        <label for="university">出身大学</label>
        <p>必須</p>
      </div>
      <div class="link_item">
        @if ($errors->has('university'))
          @foreach($errors->get('university') as $message)
            <p class="error_message">{{ $message }}</p>
          @endforeach
        @endif
        <input type="text" placeholder="◯◯大学" name="university" value="{{ old('university',$item['university'] ?? '') }}">
      </div>
    </div>
    <div class="item">
      <div class="required">
        <label for="faculty">学部</label>
        <p>必須</p>
      </div>
      <div class="link_item">
        @if ($errors->has('faculty'))
          @foreach($errors->get('faculty') as $message)
            <p class="error_message">{{ $message }}</p>
          @endforeach
        @endif
        <input type="text" placeholder="経済学部" name="faculty" value="{{ old('faculty',$item['faculty'] ?? '') }}">
      </div>
    </div>
    <div class="item">
      <div class="option">
        <label for="department">学科</label>
        <p>任意</p>
      </div>
      <div class="link_item">
        @if ($errors->has('course'))
          @foreach($errors->get('course') as $message)
            <p class="error_message">{{ $message }}</p>
          @endforeach
        @endif
        <input type="text" placeholder="経済学科" name="department" value="{{ old('department',$item['department'] ?? '') }}">
      </div>
    </div>
    <div class="item">
      <div class="required">
        <label for="liberal">文理</label>
        <p>必須</p>
      </div>
      <div class="link_item">
        @if ($errors->has('liberal'))
          @foreach($errors->get('liberal') as $message)
            <p class="error_message">{{ $message }}</p>
          @endforeach
        @endif
        <div class="radios">
          <div class="radio">
            <input type="radio" name="liberal" value='0' {{ old('liberal')||$item['liberal'] == 0 ?'checked="checked"' : ''}}>文系
          </div>
          <div class="radio">
            <input type="radio" name="liberal" value='1' {{ old('liberal')||$item['liberal'] == 1 ?'checked="checked"' : ''}}>理系
          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="required">
        <label for="name">受験経験</label>
        <p>必須</p>
      </div>
      <div class="link_items">
        @if ($errors->has('j_h_exam'))
          @foreach($errors->get('j_h_exam') as $message)
            <p class="error_message">{{ $message }}</p>
          @endforeach
        @endif
        <label for="j_h_exam">中学受験</label>
        <div class="radios2">
          <div class="radio">
            <input type="radio" name="j_h_exam" value='0' {{ old('j_h_exam')||$item['j_h_exam'] == 0 ?'checked="checked"' : ''}}>無
          </div>
          <div class="radio">
            <input type="radio" name="j_h_exam" value='1' {{ old('j_h_exam')||$item['j_h_exam'] == 1 ?'checked="checked"' : ''}}>有
          </div>
        </div>
      </div>
      <div class="link_items">
        @if ($errors->has('h_exam'))
          @foreach($errors->get('h_exam') as $message)
            <p class="error_message">{{ $message }}</p>
          @endforeach
        @endif
        <label for="h_exam">高校受験</label>
        <div class="radios2">
          <div class="radio">
            <div class="radio_contet">
              <input type="radio" name="h_exam" value='0' {{ old('h_exam')||$item['h_exam'] == 0 ?'checked="checked"' : ''}}>無
            </div>
          </div>
          <div class="radio">
            <div class="radio_content">
              <input type="radio" name="h_exam" value='1' {{ old('h_exam')||$item['h_exam'] == 1 ?'checked="checked"' : ''}}>有
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="required">
        <label for="subjects">指導可能教科</label>
        <p>必須</p>
      </div>
      <div class="clump">
        <div class="subjects">
          <div class="j_h_subject">
            <p class="subject_title">小・中科目</p>
            <span><input type="checkbox" name="subjects[]" value="0" {{ is_array(old("subjects"))&&in_array("0", old("subjects"), true)? 'checked="checked"' : '' }}>英語</span>
            <span><input type="checkbox" name="subjects[]" value="1" {{ is_array(old("subjects"))&&in_array("1", old("subjects"), true)? 'checked="checked"' : '' }}>算数・数学</span>
            <span><input type="checkbox" name="subjects[]" value="2" {{ is_array(old("subjects"))&&in_array("2", old("subjects"), true)? 'checked="checked"' : '' }}>理科</span>
            <span><input type="checkbox" name="subjects[]" value="3" {{ is_array(old("subjects"))&&in_array("3", old("subjects"), true)? 'checked="checked"' : '' }}>社会</span>
            <span><input type="checkbox" name="subjects[]" value="4" {{ is_array(old("subjects"))&&in_array("4", old("subjects"), true)? 'checked="checked"' : '' }}>国語</span>
            <span><input type="checkbox" name="subjects[]" value="5" {{ is_array(old("subjects"))&&in_array("5", old("subjects"), true)? 'checked="checked"' : '' }}>技術</span>
            <span><input type="checkbox" name="subjects[]" value="6" {{ is_array(old("subjects"))&&in_array("6", old("subjects"), true)? 'checked="checked"' : '' }}>家庭科</span>
            <span><input type="checkbox" name="subjects[]" value="7" {{ is_array(old("subjects"))&&in_array("7", old("subjects"), true)? 'checked="checked"' : '' }}>音楽</span>
            <span><input type="checkbox" name="subjects[]" value="8" {{ is_array(old("subjects"))&&in_array("8", old("subjects"), true)? 'checked="checked"' : '' }}>美術</span>
            <span><input type="checkbox" name="subjects[]" value="9" {{ is_array(old("subjects"))&&in_array("9", old("subjects"), true)? 'checked="checked"' : '' }}>その他科目</span>
          </div>
          <div class="h_subject">
            <p class="subject_title">高校科目</p>
            <span><input type="checkbox" name="subjects[]" value="100" {{ is_array(old("subjects"))&&in_array("100", old("subjects"), true)? 'checked="checked"' : '' }}>英語</span>
            <span><input type="checkbox" name="subjects[]" value="101" {{ is_array(old("subjects"))&&in_array("101", old("subjects"), true)? 'checked="checked"' : '' }}>数学1A・2B</span>
            <span><input type="checkbox" name="subjects[]" value="102" {{ is_array(old("subjects"))&&in_array("102", old("subjects"), true)? 'checked="checked"' : '' }}>数学3</span>
            <span><input type="checkbox" name="subjects[]" value="103" {{ is_array(old("subjects"))&&in_array("103", old("subjects"), true)? 'checked="checked"' : '' }}>現代文</span>
            <span><input type="checkbox" name="subjects[]" value="104" {{ is_array(old("subjects"))&&in_array("104", old("subjects"), true)? 'checked="checked"' : '' }}>古文・漢文</span>
            <span><input type="checkbox" name="subjects[]" value="105" {{ is_array(old("subjects"))&&in_array("105", old("subjects"), true)? 'checked="checked"' : '' }}>生物</span>
            <span><input type="checkbox" name="subjects[]" value="106" {{ is_array(old("subjects"))&&in_array("106", old("subjects"), true)? 'checked="checked"' : '' }}>化学</span>
            <span><input type="checkbox" name="subjects[]" value="107" {{ is_array(old("subjects"))&&in_array("107", old("subjects"), true)? 'checked="checked"' : '' }}>物理</span>
            <span><input type="checkbox" name="subjects[]" value="108" {{ is_array(old("subjects"))&&in_array("108", old("subjects"), true)? 'checked="checked"' : '' }}>地学</span>
            <span><input type="checkbox" name="subjects[]" value="109" {{ is_array(old("subjects"))&&in_array("109", old("subjects"), true)? 'checked="checked"' : '' }}>現代社会</span>
            <span><input type="checkbox" name="subjects[]" value="110" {{ is_array(old("subjects"))&&in_array("110", old("subjects"), true)? 'checked="checked"' : '' }}>日本史</span>
            <span><input type="checkbox" name="subjects[]" value="111" {{ is_array(old("subjects"))&&in_array("111", old("subjects"), true)? 'checked="checked"' : '' }}>世界史</span>
            <span><input type="checkbox" name="subjects[]" value="112" {{ is_array(old("subjects"))&&in_array("112", old("subjects"), true)? 'checked="checked"' : '' }}>地理</span>
            <span><input type="checkbox" name="subjects[]" value="113" {{ is_array(old("subjects"))&&in_array("113", old("subjects"), true)? 'checked="checked"' : '' }}>倫理・政治・経済</span>
            <span><input type="checkbox" name="subjects[]" value="114" {{ is_array(old("subjects"))&&in_array("114", old("subjects"), true)? 'checked="checked"' : '' }}>その他科目</span>
          </div>
          <div class="special_subject">
            <p class="subject_title">専門科目</p>
            <span><input type="checkbox" name="subjects[]" value="200" {{ is_array(old("subjects"))&&in_array("200", old("subjects"), true)? 'checked="checked"' : '' }}>情報</span>
            <span><input type="checkbox" name="subjects[]" value="201" {{ is_array(old("subjects"))&&in_array("201", old("subjects"), true)? 'checked="checked"' : '' }}>商業</span>
            <span><input type="checkbox" name="subjects[]" value="202" {{ is_array(old("subjects"))&&in_array("202", old("subjects"), true)? 'checked="checked"' : '' }}>農業</span>
            <span><input type="checkbox" name="subjects[]" value="203" {{ is_array(old("subjects"))&&in_array("203", old("subjects"), true)? 'checked="checked"' : '' }}>工業</span>
            <span><input type="checkbox" name="subjects[]" value="204" {{ is_array(old("subjects"))&&in_array("204", old("subjects"), true)? 'checked="checked"' : '' }}>水産</span>
            <span><input type="checkbox" name="subjects[]" value="205" {{ is_array(old("subjects"))&&in_array("205", old("subjects"), true)? 'checked="checked"' : '' }}>福祉</span>
            <span><input type="checkbox" name="subjects[]" value="206" {{ is_array(old("subjects"))&&in_array("206", old("subjects"), true)? 'checked="checked"' : '' }}>看護</span>
            <span><input type="checkbox" name="subjects[]" value="207" {{ is_array(old("subjects"))&&in_array("207", old("subjects"), true)? 'checked="checked"' : '' }}>家庭/生活</span>
          </div> 
        </div>
      </div>
    </div>
    @endif
     <div class="item">
      <div class="option">
        <label for="comment">コメント</label>
        <p>任意</p>
      </div>
      <div class="link_item">
        @if ($errors->has('comment'))
          @foreach($errors->get('comment') as $message)
            <p class="error_message">{{ $message }}</p>
          @endforeach
        @endif
        <textarea name="comment" id="" cols="30" rows="10">{{ old('comment',$item['comment'] ?? '') }}</textarea>
      </div>
    </div>
    <input type="submit" value="確認画面へ" class="submit">
  @endforeach
  </form>
</div>
</div>
</div>
</div>
@endsection
