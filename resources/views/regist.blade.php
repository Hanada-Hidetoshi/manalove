@include('header',['title' => 'regist','title_ja' => '登録'])
    <div class="container">
    <div class="main">
      <div class="wrapper">
        <div class="frame">
          <h1>アカウント情報</h1>
          <div class="inner">
            @if(request()->is('*change*'))
              <form method="post" action="/profilchange/confirm">
              @csrf
            @else
              <form action="/regist/confirm" method="post">
              @csrf
              <input type="hidden" name="attribute" value="{{old('attribute',$attribute ?? '')}}">
              @if($attribute ==='student')
                <input type="hidden" name="user_attribute" value=1>
              @elseif($attribute ==='teacher')
                <input type="hidden" name="user_attribute" value=0>
              @endif
            @endif
              <div class="items">
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
                  <input type="text" placeholder="山田" name="last_name" value="{{ old('last_name') }}">
                </div>
                <div class="link_names">
                  @if ($errors->has('first_name'))
                    @foreach($errors->get('first_name') as $message)
                      <p class="error_message">{{ $message }}</p>
                    @endforeach
                  @endif
                  <label for="first_name">名前：</label>
                  <input type="text" placeholder="太郎" name="first_name" value="{{ old('first_name') }}">
                </div>
              </div>
              <div class="items">
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
                  <input type="text" placeholder="やまだ" name="last_name_fri" value="{{ old('last_name_fri') }}">
                </div>
                <div class="link_names">
                  @if ($errors->has('first_name_fri'))
                    @foreach($errors->get('first_name_fri') as $message)
                      <p class="error_message">{{ $message }}</p>
                    @endforeach
                  @endif
                  <label for="first_name_fri">なまえ：</label>
                  <input type="text" placeholder="たろう" name="first_name_fri" value="{{ old('first_name_fri') }}">
                </div>
              </div>
              <div class="items">
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
                  <input type="date" name="birth_day" value="{{ old('birth_day') }}">
                </div>
              </div>
              <div class="items">
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
                    <input type="text" name="prefecture" value="{{ old('prefecture') }}">
                  </div>
              </div>
              <div class="items">
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
                  <input type="text" placeholder="例）だーやま" name="view_name" value="{{ old('view_name') }}">
                </div>
              </div>
              <div class="items">
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
                  <input type="email" placeholder="yamada@example.com" name="email" value="{{ old('email') }}">
                </div>
              </div>
              <div class="items">
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
                    <input type="text" placeholder="taroyamada" name="user_id" value="{{ old('user_id') }}">
                  </div>
              </div>
              <div class="items">
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
                  <input name ="password" type="password" placeholder="8文字以上で入力">
                </div>
              </div>
              <div class="items">
                <div class="required">
                  <label for="password_confirmation">パスワード（確認）</label>
                  <p>必須</p>
                </div>
                <div class="link_item">
                  <input name="password_confirmation" type="password" placeholder="8文字以上で入力">
                </div>
              </div>
              @if( $attribute ==='student')
              <!-- 生徒用 -->
              <div class="items">
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
                  <select name="course" value="{{ old('course') }}">
                    <option value="" hidden selected>学年を選択してください</option>
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
              @elseif( $attribute ==='teacher')
              <!-- 講師用 -->
              <div class="items">
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
                  <input type="text" placeholder="◯◯大学" name="university" value="{{ old('university') }}">
                </div>
              </div>
              <div class="items">
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
                  <input type="text" placeholder="経済学部" name="faculty" value="{{ old('faculty') }}">
                </div>
              </div>
              <div class="items">
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
                  <input type="text" placeholder="経済学科" name="department" value="{{ old('department') }}">
                </div>
              </div>
              <div class="items">
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
                      <input type="radio" name="liberal" value='0' {{ old('liberal') == 0 ?'checked="checked"' : ''}}>文系
                    </div>
                    <div class="radio">
                      <input type="radio" name="liberal" value='1' {{ old('liberal') == 1 ?'checked="checked"' : ''}}>理系
                    </div>
                  </div>
                </div>
              </div>
              <div class="items">
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
                      <input type="radio" name="j_h_exam" value='0' {{ old('j_h_exam') == 0 ?'checked="checked"' : ''}}>無
                    </div>
                    <div class="radio">
                      <input type="radio" name="j_h_exam" value='1' {{ old('j_h_exam') == 1 ?'checked="checked"' : ''}}>有
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
                        <input type="radio" name="h_exam" value='0' {{ old('h_exam') == 0 ?'checked="checked"' : ''}}>無
                      </div>
                    </div>
                    <div class="radio">
                      <div class="radio_content">
                        <input type="radio" name="h_exam" value='1' {{ old('h_exam') == 1 ?'checked="checked"' : ''}}>有
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="items">
                <div class="required">
                  <label for="subjects">指導可能教科</label>
                  <p>必須</p>
                </div>
                <div class="clump">
                  <div class="subjects">
                    <div class="j_h_subject">
                      <p class="subject_title">小学科目</p>
                      @foreach($primarys as $primary)
                        <span><input type="checkbox" name="p_subjects[]" id={{$primary['id']}} value="{{$primary['subject_name']}}" {{ is_array(old("p_subjects"))&&in_array($primary['id'],old("p_subjects"), true)? 'checked="checked"' : '' }}>{{$primary['subject_name']}}</span>
                      @endforeach
                    </div>
                    <div class="j_h_subject">
                      <p class="subject_title">中学科目</p>
                      @foreach($juniorhighs as $juniorhigh)
                        <span><input type="checkbox" name="j_h_subjects[]" id={{$juniorhigh['id']}} value="{{$juniorhigh['subject_name']}}" {{ is_array(old("j_h_subjects"))&&in_array($juniorhigh['id'], old("j_h_subjects"), true)? 'checked="checked"' : '' }}>{{$juniorhigh['subject_name']}}</span>
                      @endforeach
                    </div>
                    <div class="h_subject">
                      <p class="subject_title">高校科目</p>
                      @foreach($highs as $high)
                        <span><input type="checkbox" name="h_subjects[]" id={{$high['id']}} value="{{$high['subject_name']}}" {{ is_array(old("subjects"))&&in_array($high['id'], old("h_subjects"), true)? 'checked="checked"' : '' }}>{{$high['subject_name']}}</span>
                      @endforeach
                    </div>
                    <div class="special_subject">
                     <p class="subject_title">専門科目</p>
                      @foreach($specials as $special)
                        <span><input type="checkbox" name="s_subjects[]" id={{$special['id']}} value="{{$special['subject_name']}}" {{ is_array(old("s_subjects[]"))&&in_array($pecial['id'], old("s_subjects"), true)? 'checked="checked"' : '' }}>{{$special['subject_name']}}</span>
                      @endforeach
                    </div> 
                  </div>
                </div>
              </div>
              @endif
               <div class="items">
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
                  <textarea name="comment" id="" cols="30" rows="10">{{ old('comment') }}</textarea>
                </div>
              </div>
              <input type="submit" value="確認画面へ" class="submit">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('footer')
</div>
</body>
</html>
