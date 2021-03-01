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
            <h2>学習ログ</h2>
          </div>
          <div class="weekly_study_log">
            <div class="days">
              <label>きのう-6<span>（月）</span></label>
              <p>英語 10:00-11:00</p>
            </div>
            <div class="days">
              <label>きょう-5<span>（火）</span></label>
              <p>数学1 13:00-14:00</p>
            </div>
            <div class="days">
              <label>きょう-4<span>（水）</span></label>
              <p>古文 10:00-12:00</p>
            </div>
            <div class="days">
              <label>きょう-3<span>（木）</span></label>
              <p>古文 10:00-12:00</p>
              <p>生物 15:00-18:00</p>
            </div>
            <div class="days">
              <label>きょう-2<span>（金）</span></label>
              <!-- <p></p> -->
            </div>
            <div class="days">
              <label>きょう-1<span>（土）</span></label>
              <p>化学 13:00-16:00</p>
            </div>
            <div class="days">
              <label>きょう<span>（日）</span></label>
              <!-- <p></p> -->
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
  @include('footer')
</div>
</body>
</html>
