@include('header',['title' => 'account_info','title_ja' => 'プロフィール'])
  <div class="container">
      @include('aside')
    <main>
      <div class="wrapper">
        <div class="frame">
          <h1>プロフィール</h1>
          <div class="inner">
            @foreach($items as $item)
            <form action="/profile/change" method="post">
              @csrf
              @if(Session::get('id')==$item['id'])
              <div class="items">
                <div class="required">
                  <label for="name">氏名</label>
                </div>
                <div class="link_items">
                  <label for="last_name">苗字：</label>
                  <p>{{$item['last_name']}}</p>
                </div>
                <div class="link_items">
                  <label for="first_name">名前：</label>
                  <p>{{$item['firest_name']}}</p>
                </div>
              </div>
              <div class="items">
                <div class="required">
                  <label for="name">ふりがな</label>
                </div>
                <div class="link_items">
                  <label for="last_name_fri">みょうじ：</label>
                  <p>{{$item['last_name_fri']}}</p>
                </div>
                <div class="link_items">
                  <label for="first_name_fri">なまえ：</label>
                  <p>{{$item['first_name_fri']}}</p>
                </div>
              </div>
              <div class="items">
                <div class="required">
                  <label for="birth_day">生年月日</label>
                </div>
                <p>{{$item['birth_day']}}</p>
              </div>
              <div class="items">
                <div class="required">
                  <label for="prefecture">居住都道府県</label>
                </div>
                <p>{{$item['prefecture']}}</p>
              </div>
              @endif
              <div class="items">
                <div class="required">
                  <label for="view_name">ニックネーム</label>
                </div>
                <p>{{$item['view_name']}}</p>
              </div>
              @if(Session::get('id')==$item['id'])
              <div class="items">
                <div class="required">
                  <label for="email">メールアドレス</label>
                </div>
                <p>{{$item['email']}}</p>
              </div>
              <div class="items">
                <div class="required">
                  <label for="user_id">ユーザーID</label>
                </div>
                <p>{{$item['user_id']}}</p>
              </div>
              <div class="items">
                <div class="required">
                  <label for="password_confirm">パスワード</label>
                </div>
                <p>{{$item['password']}}</p>
              </div>
              @endif
              @if($item['user_attribute']==1)
              <!-- 生徒用 -->
              <div class="items">
                <div class="required">
                  <label for="course">学年/コース</labe>
                </div>
                @if($item['course']<=6)
                  <p>小学{{$item['course']}}年生</p>
                @elseif($item['course']<=9)
                  <p>中学{{$item['course']-6}}年生</p>
                @elseif($item['course']<=12)
                  <p>高校{{$item['course']-9}}年生</p>
                @else
                  <p>浪人生・一般</p>
                @endif
              </div>
              @elseif($item['user_attribute']==0)
              <!-- 講師用 -->
              <div class="items">
                <div class="required">
                  <label for="university">出身大学</label>
                </div>
                <p>{{$item['university']}}</p>
              </div>
              <div class="items">
                <div class="required">
                  <label for="faculty">学部</label>
                </div>
                <p>{{$item['faculty']}}</p>
              </div>
              <div class="items">
                <div class="option">
                  <label for="department">学科</label>
                </div>
                <p>{{$item['department']}}</p>
              </div>
              <div class="items">
                <div class="required">
                  <label for="liberal">文理</label>
                </div>
                @if($item['liberal']==0)
                  <p>文系</p>
                @elseif($item['liberal']==1)
                  <p>理系</p>
                @endif
              </div>
              <div class="items">
                <div class="required">
                  <label for="name">受験経験</label>
                </div>
                <div class="link_items">
                  <label for="j_h_exam">中学受験：</label>
                @if($item['j_h_exam']==0)
                  <p>無</p>
                @elseif($item['j_h_exam']==1)
                  <p>有</p>
                @endif
                </div>
                <div class="link_items">
                  <label for="h_exam">高校受験：</label>
                @if($item['h_exam']==0)
                  <p>無</p>
                @elseif($item['h_exam']==1)
                  <p>有</p>
                @endif
                </div>
              </div>
              <div class="items">
                <div class="option">
                  <label for="subjects">指導可能教科</label>
                </div>
                <div class="clump">
                  <div class="subjects">
                    <div class="j_h_subject">
                      <p class="subject_title">小学科目：</p>
                      <p>{{ $item['p_subject'] != null ? $item['p_subject'] : '対応不可' }}</p>
                    </div>
                    <div class="j_h_subject">
                      <p class="subject_title">中学科目：</p>
                      <p>{{ $item['j_h_subject'] != null ? $item['j_h_subject'] : '対応不可' }}</p>
                    </div>
                    <div class="h_subject">
                      <p class="subject_title">高校科目：</p>
                      <p>{{ $item['h_subject'] != null ? $item['h_subject'] : '対応不可' }}</p>
                    </div>
                    <div class="special_subject">
                      <p class="subject_title">専門科目：</p>
                      <p>{{ $item['s_subject'] != null ? $item['s_subject'] : '対応不可' }}</p>
                    </div>
                  </div>
                </div>
              </div>
              @endif
              <div class="items">
                <div class="option">
                  <label for="comment">コメント</label>
                </div>
                <p>{{$item['comment']}}</p>
              </div>
              @if(Session::get('id')==$item['id'])
                <input type="submit" value="編集する">
              @elseif(Session::get('user_attribute')!=$item['user_attribute'])
                @if(Session::get('user_attribute')==0)
                  <div class="waiting_button"><a href="/waiting/{{$item['id']}}">この生徒に依頼する</a></div>
                @elseif(Session::get('user_attribute')==1)
                  <div class="waiting_button"><a href="/waiting/{{$item['id']}}">この先生に依頼する</a></div>
                @endif
              @endif
            </form>
            @endforeach
          </div>
        </div>
      </div>
    </main>
  </div>
  @include('footer')
</div>
</body>
</html>
