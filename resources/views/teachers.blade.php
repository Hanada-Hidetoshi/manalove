@include('header',['title' => 'teachers','title_ja' => '先生一覧'])
  <div class="container">
@csrf
    @include('aside')
    <main>
      <h2>検索結果</h2>
      <div class="teachers">
        @foreach($teachers as $teacher)
        <div class="teacher">
          <div class="teacher_container">
            <div class="teacher_image">
              <img src="images/account.jpeg" alt="{{$teacher['view_name']}}">
              <p class="hour_pays">¥{{$teacher['hour_pays']}}〜 <span>/1時間</span></p>
            </div>
            <div class="teacher_information">
              <h3><sapn>{{$teacher['view_name']}}</sapn>先生</h3>
              <p class="subject">小中科目：</p><span>{{$teacher['subjects']}}</span>
              <p class="subject">高校科目：</p><span>{{$teacher['subjects']}}</span>
              <p class="subject">専門科目：</p><span>{{$teacher['subjects']}}</span>
            </div>
          </div>
          <a href="/teachers/profile/{{$teacher['id']}}">この先生に依頼</a>
        </div>
        @endforeach
      </div>
    </main>
  </div>
  @include('footer')
</div>
</body>
</html>