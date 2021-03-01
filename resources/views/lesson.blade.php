@include('header',['title' => 'lesson','title_ja' => 'レッスン/実績'])
  <div class="container">
      @include('aside')
    <main>
      <div class="recent_lesson">
        <div class="section_title">
          <h2>次回のレッスン</h2>
        </div>
        <p>◯月◯日（木）15:00〜16:00</p>
        <p>教科：英語</p>
        <p>内容：〜〜〜</p>
        <p>担当講師：▲▲先生</p>
        <p>URL：<a href="https://zoom.us/jp-jp/meetings.html">https://zoom.us/jp-jp/meetings.html</a></p>
      </div>
      <div class="performance">
        <div class="section_title">
          <h2>レッスン実績</h2>
        </div>
        <table>
          <tr>
            <th style="width:10%">日付</th>
            <th style="width:5%">教科</th>
            <th style="width:10%">担当講師</th>
            <th style="width:35%">講師コメント</th>
            <th style="width:35%">生徒コメント</th>
            <th style="width:5%">詳細</th>
          </tr>
          <tr>
            <td>2月15日</td>
            <td>英語</td>
            <td>山田</td>
            <td>英語の基本的な文法を学べた</td>
            <td>小テストに合格できなかったので、次は合格する</td>
            <td><a href="">詳細</a></td>
          </tr>
          <tr>
            <td>2月13日</td>
            <td>数学1A</td>
            <td>山本</td>
            <td>集合について100%理解。次は論理の部分。</td>
            <td>かなり理解できた。復習で忘れないようにする</td>
            <td><a href="">詳細</a></td>
          </tr>
        </table>
      </div>
    </main>
  </div>
</div>
  @include('footer')
</body>
</html>
