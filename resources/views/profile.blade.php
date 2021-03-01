@include('header',['title' => 'account_info','title_ja' => 'プロフィール'])
  <div class="container">
      @include('aside')
    <main>
      <div class="wrapper">
        <div class="frame">
          <h1>プロフィール</h1>
          <div class="inner">
            <form action="/" mehod="post">
              <div class="items">
                <div class="required">
                  <label for="user_id">ユーザーID</label>
                </div>
                <p>taroyamada</p>
              </div>
              <!-- 生徒用 -->
              <div class="items">
                <div class="required">
                  <label for="course">学年/コース</labe>
                </div>
                <p>高校3年生</p>
              </div>
              <!-- 講師用 -->
              <div class="items">
                <div class="required">
                  <label for="university">出身大学</label>
                </div>
                <p>家庭教大学</p>
              </div>
              <div class="items">
                <div class="required">
                  <label for="faculty">学部</label>
                </div>
                <p>経済学部</p>
              </div>
              <div class="items">
                <div class="option">
                  <label for="department">学科</label>
                </div>
                <p>経済学科</p>
              </div>
              <div class="items">
                <div class="required">
                  <label for="liberal">文理</label>
                </div>
                <p>文系</p>
              </div>
              <div class="items">
                <div class="required">
                  <label for="name">受験経験</label>
                </div>
                <div class="link_items">
                  <label for="j_h_exam">中学受験：</label>
                  <p>無</p>
                </div>
                <div class="link_items">
                  <label for="h_exam">高校受験：</label>
                  <p>有</p>
                </div>
              </div>
              <div class="items">
                <div class="option">
                  <label for="subjects">指導可能教科</label>
                </div>
                <div class="clump">
                  <div class="subjects">
                    <div class="j_h_subject">
                      <p class="subject_title">小・中科目：</p>
                      <p>英語,算数・数学,理科</p>
                    </div>
                    <div class="h_subject">
                      <p class="subject_title">高校科目：</p>
                      <p>英語,数学1A・2B,数学3,化学,物理</p>
                    </div>
                    <div class="special_subject">
                      <p class="subject_title">専門科目：</p>
                      <p>なし</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="items">
                <div class="option">
                  <label for="comment">コメント</label>
                </div>
                <p>がんばります！</p>
              </div>
              <input type="submit" value="連絡する">
            </form>
          </div>
        </div>
      </div>
    </main>
  </div>
  @include('footer')
</div>
</body>
</html>
