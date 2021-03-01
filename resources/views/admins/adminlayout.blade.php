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
