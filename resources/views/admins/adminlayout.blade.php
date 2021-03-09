@if(Session::get('id') ==='superuser')
@include('admins.adminheader',['title' => 'admin','title_ja' => 'マイページ'])
  <div class="container">
      @include('admins.adminaside')
      <main>
        @yield('content')
      </main>
  </div>
  @include('footer')
</body>
</html>
@else
@include('header',['title' => 'admin','title_ja' => 'ログインしてください'])
  <div class="container">
    @include('aside')
  	<main>
    <div class="search_button">
      <a href="/admin">ログインしてください</a>
    </main>
    </div>
  </main>
  @include('footer')
</body>
</html>
@endif
