@include('header',['title' => 'login','title_ja' => 'ログイン'])
  <h2>ログイン</h2>
  <div class="container">
    <div class="loginform">
      @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="error_text">{{ $error }}</div>
        @endforeach
      @endif
      @if(!empty($process_message))
        <p>{{$process_message}}</p>
      @endif
      @if(request()->is('*login*'))
        <form action="/login" method="post">
      @elseif(request()->is('*admin*'))
        @if(request()->method() ==='GET')
          <form method="post" action="/admin">
        @elseif(request()->method() ==='POST')
          <form method="post" action="/admin/mypage">
        @endif
      @else
        <form method="post" action="/login">
      @endif
        @csrf
        <div class="form_container">
          <div class="form_unit">
            <label for="user_id">ユーザーID</label>
            <input name="user_id" type="text" value={{old('user_id',$user_id ?? '')}}>
          </div>
          <div class="form_unit">
            <label for="password">パスワード</label>
            <input name="password" type="password" value={{old('password',$password ?? '')}}>
          </div>
          <input type="submit" value="ログイン">
          <a href="password_reset">パスワードをお忘れの方</a>
        </div>
      </form>
    </div>
    <div class="member_regist">
      <div class="regist_text">
        <p>アカウントをおもちでない方は</p>
        <p>アカウント登録をお済ませください。</p>
      </div>
      <div class="buttons">
        <p>生徒の方</p>
        <button><a href="regist/student">会員登録する</a></button>
        <p>講師の方</p>
        <button><a href="regist/teacher">会員登録する</a></button>
      </div>
    </div>
  </div>
  @include('footer')
</div>
</body>
</html>
