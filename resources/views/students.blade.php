@include('header',['title' => 'users','title_ja' => '先生一覧'])
  <div class="container">
  @csrf
    @include('aside')
    <main>
      <h2>検索結果</h2>
      <div class="users">
        @foreach($students as $student)
        <a class="user" href="/students/profile/{{$student['id']}}">
          <div class="user_container">
            <div class="user_information">
              <h3><sapn>{{$student['view_name']}}</sapn>さん</h3>
                @if($student['course']<=6)
                  <p>小学{{$student['course']}}年生</p>
                @elseif($student['course']<=9)
                  <p>中学{{$student['course']-6}}年生</p>
                @elseif($student['course']<=12)
                  <p>高校{{$student['course']-9}}年生</p>
                @else
                  <p>浪人生・一般</p>
                @endif
              <p class="subject">コメント:<span>{{$student['comment']}}</span></p>
            </div>
          </div>
        </a>
        @endforeach
      </div>
    </main>
  </div>
  @include('footer')
</div>
</body>
</html>