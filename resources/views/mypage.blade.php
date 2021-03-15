@include('header',['title' => 'mypage','title_ja' => 'マイページ'])
@csrf
  <div class="container">
      @include('aside')
    <main>
      <section class="first">
        <div class="next_lesson">
          <div class="section_title">
            <h2>次回のレッスン</h2>
          </div>
          <p>◯月◯日（木）15:00〜16:00</p>
          <p>教科：英語</p>
          <p>内容：〜〜〜</p>
          <p>担当講師：▲▲先生</p>
        </div>
        <div class="information">
          <div class="section_title">
            <h2>お知らせ</h2>
          </div>
          <table>
            <tr>
              <th style="width:15%">日付</th>
              <th style="width:15%">教科</th>
              <th style="width:65%">内容</th>
              <th style="width:15%">詳細</th>
            </tr>
            <tr>
              <td>2月13日</td>
              <td>英語</td>
              <td>授業日が近づきました</td>
              <td><a href="">詳細</a></td>
            </tr>
            <tr>
              <td>2月15日</td>
              <td>数学1A</td>
              <td>授業日が近づきました</td>
              <td><a href="">詳細</a></td>
            </tr>
          </table>
        </div>
      </section>
      <section class="second">
        <div class="study_log">
          <div class="section_title">
            <h2><a href="/study_logs">学習ログ</a></h2>
          </div>
          <div class="weekly_study_log">
            @for($i=6;$i>=0;$i--)
            <div class="days">
              <label>{{$items['day'.$i.'_ago']}}</label>
              @foreach(${'day'.$i.'s'} as ${'day'.$i})
              <p>{{${'day'.$i}['subject']}} {{${'day'.$i}['elapsed_time']}}分</p>
              @endforeach
            </div>
            @endfor
          </div>
        </div>
      </section>
    </main>
  </div>
  @include('footer')
</div>
</body>
</html>
