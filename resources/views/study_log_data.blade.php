@include('header',['title' => 'study_log_data','title_ja' => '学習'])
  <div class="container">
      @include('aside')
    <main>
      <section class="first">
        <div class="study_calender">
          <div class="section_title">
            <h2>学習カレンダー</h2>
          </div>
          <p>こんなような図</p>
          <img src="images/githubcalender.png" alt="">
        </div>
      </section>
      <section class="second">
        <div class="study_summary">
          <div class="section_title">
            <h2>学習サマリー</h2>
          </div>
          <div class="summarys">
            <div class="graph">
              <p>ここに侍エンジニアみたいなグラフを描きたい</p>
            </div>
            <div class="summary">
              <p>今週<span>◯時間◯分</span></p>
              <p>今月<span>◯時間◯分</span></p>
              <p>合計時間<span>◯時間◯分</span></p>
              <p>合計登録回数<span>回</span></p>
            </div>
          </div>
        </div>
      </section>
      <section class="third">
        <div class="study_log_data">
          <div class="section_title">
            <h2>学習ログ</h2>
          </div>
          <table>
            <tr>
              <th>日付</th>
              <th>教科</th>
              <th>開始時間</th>
              <th>終了時間</th>
              <th>勉強した時間</th>
              <th style="width:40%">内容・まとめ</th>
              <th style="width:5%">編集</th>
              <th style="width:5%">削除</th>
            </tr>
            <div style="overflow:auto;">
            <tr>
              <td>2020/12/13</td>
              <td>英語</td>
              <td>12:00</td>
              <td>13:00</td>
              <td>60分</td>
              <td>学校の単語練習、問題集</td>
              <td><a href="/study_log/change">編集</a></td>
              <td><a href class="delete">削除</a></td>
            </tr>
            </div>
          </table>
        </div>
      </section>
    </main>
  </div>
  @include('footer')
</div>
</body>
</html>
