@if(Session::has('id'))
  @if(Session::get('user_attribute')==1)
<aside>
  <div class="account_info">
    <img src="{{secure_asset('images/account.jpeg')}}" alt="{{ Session::get('view_name') }}">
    <p>{{ Session::get('view_name') }}さん</p>
    <p><a href="/profile">プロフィール編集 &#xf044</a></p>
    <p><a href="/">スケジュール編集 &#xf044</a></p>
  </div>
  <div class="menu">
    <div class="label">
      <label>生徒メニュー</label>
    </div>
    <ul>
      <li><a href="/mypage">ホーム<span>&#xf105</span></a></li>
      <li><a href="/matching_data">トークルーム<span>&#xf105</span></a></li>
      <li><a href="/lesson">レッスン予定/実績<span>&#xf105</span></a></li>
      <li><a href="/curriculum">カリキュラム<span>&#xf105</span></a></li>
      <li><a href="/test_results">テスト成績<span>&#xf105</span></a></li>
      <li><a href="/study_logs">学習ログ<span>&#xf105</span></a></li>
      <li><a href="/account_info">アカウント情報<span>&#xf105</span></a></li>
      <li><a href="/contact">お問い合わせ<span>&#xf105</span></a></li>
      <li><a href="/logout">ログアウト<span>&#xf105</span></a></li>
    </ul>
  </div>
</aside>
  @elseif(Session::get('user_attribute')==0)
<aside>
  <div class="account_info">
    <img src="{{secure_asset('images/account.jpeg')}}" alt="{{ Session::get('view_name') }}">
    <p>{{ Session::get('view_name') }}さん</p>
    <p><a href="/profile/change">プロフィール編集 &#xf044</a></p>
    <p><a href="/">スケジュール編集 &#xf044</a></p>
  </div>
  <div class="menu">
    <div class="label">
      <label>講師メニュー</label>
    </div>
    <ul>
      <li><a href="/mypage">ホーム<span>&#xf105</span></a></li>
      <li><a href="/matching_data">トークルーム<span>&#xf105</span></a></li>
      <li><a href="/lesson">レッスン登録/実績<span>&#xf105</span></a></li>
      <li><a href="/account_info">アカウント情報<span>&#xf105</span></a></li>
      <li><a href="/contact">お問い合わせ<span>&#xf105</span></a></li>
      <li><a href="/logout">ログアウト<span>&#xf105</span></a></li>
    </ul>
  </div>
</aside>
  @endif
@else
<aside>
  <div class="account_info"></div>
  <div class="menu">
    <label>おすすめ講師検索</label>
    <hr>
      <label onclick="obj=document.getElementById('open1').style; obj.display=(obj.display=='none')?'block':'none';">小学科目<span>▼</span></label>
      <ul>
        <div class="open" id="open1" style="display:none;clear:both;">
          <li><a href="/">算数<span>&#xf105</span></a></li>
          <li><a href="/">国語<span>&#xf105</span></a></li>
          <li><a href="/">理科<span>&#xf105</span></a></li>
          <li><a href="/">社会<span>&#xf105</span></a></li>
        </div>
      </ul>
      <hr>
      <label onclick="obj=document.getElementById('open2').style; obj.display=(obj.display=='none')?'block':'none';">中学科目<span>▼</span></label>
      <ul>
        <div class="open" id="open2" style="display:none;clear:both;">
          <li><a href="/">算数<span>&#xf105</span></a></li>
          <li><a href="/">国語<span>&#xf105</span></a></li>
          <li><a href="/">理科<span>&#xf105</span></a></li>
          <li><a href="/">社会<span>&#xf105</span></a></li>
        </div>
      </ul>
      <hr>
      <label onclick="obj=document.getElementById('open3').style; obj.display=(obj.display=='none')?'block':'none';">高校科目<span>▼</span></label>
      <ul>
        <div class="open" id="open3" style="display:none;clear:both;">
          <li><a href="/">算数<span>&#xf105</span></a></li>
          <li><a href="/">国語<span>&#xf105</span></a></li>
          <li><a href="/">理科<span>&#xf105</span></a></li>
          <li><a href="/">社会<span>&#xf105</span></a></li>
        </div>
      </ul>
      <hr>
      <label onclick="obj=document.getElementById('open4').style; obj.display=(obj.display=='none')?'block':'none';">専門科目<span>▼</span></label>
      <ul>
        <div class="open" id="open4" style="display:none;clear:both;">
          <li><a href="/">算数<span>&#xf105</span></a></li>
          <li><a href="/">国語<span>&#xf105</span></a></li>
          <li><a href="/">理科<span>&#xf105</span></a></li>
          <li><a href="/">社会<span>&#xf105</span></a></li>
        </div>
      </ul>
  </div>
</aside>
@endif