<aside>
  <div class="account_info">
    <img src="{{secure_asset('images/favicon.jpeg')}}" alt="管理者">
    <p>ニックネーム({{ Session::get('view_name') }})</p>
    <p><a href="/profile/change">プロフィール編集 &#xf044</a></p>
    <p><a href="/">スケジュール編集 &#xf044</a></p>
  </div>
  <div class="menu">
    <div class="label">
      <label>管理者</label>
    </div>
    <ul>
      <li><a href="/admin/mypage">ホーム<span>&#xf105</span></a></li>
      <li><a href="/admin/students">生徒一覧<span>&#xf105</span></a></li>
      <li><a href="/admin/teachers">先生一覧<span>&#xf105</span></a></li>
      <li><a href="/admin/subjects">教科一覧<span>&#xf105</span></a></li>
      <li><a href="/admin/performances">実績一覧<span>&#xf105</span></a></li>
      <li><a href="/admin/study_logs">学習ログ一覧<span>&#xf105</span></a></li>
      <li><a href="/admin/account_info">アカウント情報<span>&#xf105</span></a></li>
      <li><a href="/admin">ログアウト<span>&#xf105</span></a></li>
    </ul>
  </div>
</aside>