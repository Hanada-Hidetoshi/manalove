@include('header',['title' => 'teachers','title_ja' => '先生一覧'])
  <div class="container">
@csrf
    @include('aside')
    <main>
      <h2>検索結果</h2>
      <div class="teachers">
        @foreach($teachers as $teacher)
        <a class="teacher" href="/teachers/profile/{{$teacher['id']}}">
          <div class="teacher_container">
            <div class="teacher_image">
              <img src="images/account.jpeg" alt="{{$teacher['view_name']}}">
              <p class="hour_pays">¥{{$teacher['hour_pays']}}〜 <span>/1時間</span></p>
            </div>
            <div class="teacher_information">
              <h3><sapn>{{$teacher['view_name']}}</sapn>先生</h3>
              <p class="subject">小学科目：<span>{{$teacher['p_subject']}}</span></p>
              <p class="subject">中学科目：<span>{{$teacher['j_h_subject']}}</span></p>
              <p class="subject">高校科目：<span>{{$teacher['h_subject']}}</span></p>
              <p class="subject">専門科目：<span>{{$teacher['s_subject']}}</span></p>
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