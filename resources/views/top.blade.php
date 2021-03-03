@include('header',['title' => 'top','title_ja' => '家庭教師マッチングシステム'])
  <div class="container">
    <div class="main_view">
      <img src="images/topimage.jpg" alt="">
      <div class="main_view_text">
        <div class="main_view_content">
          <p><span style="color:#bbe2f1">学ぶ</span>　を</p>
          <p>いつでも、</p>
          <p>どこでも。</p>
          <div class="main_view_sub">
            <p>自宅でも受講できる家庭教師システム。</p>
            <p>時間と場所に関係なく授業を受けられるから</p>
            <p>効率的な勉強ができる</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <article class="search">
    <section>
      <h2>条件を絞って探す</h2>
      <div class="tables">
        <div class="search_contents">
          <h3>担当科目から探す</h3>
          <div class="search_box">
          <form action="/teachers" method="get">
            @csrf
            <div class="subjects">
              <div class="j_h_subject">
                <h4 class="subject_title">小学科目</h4>
                @foreach($p_subjects as $p_subject)
                <span><input type="checkbox" id={{$p_subject['id']}} value="{{$p_subject['subject_name']}}"><label for="{{$p_subject['id']}}">{{$p_subject['subject_name']}}</label></span>
                @endforeach
              </div>
              <div class="j_h_subject">
                <h4 class="subject_title">中学科目</h4>
                @foreach($j_h_subjects as $j_h_subject)
                <span><input type="checkbox" id={{$j_h_subject['id']}} value="{{$j_h_subject['subject_name']}}"><label for="{{$j_h_subject['id']}}">{{$j_h_subject['subject_name']}}</label></span>
                @endforeach
              </div>
              <div class="h_subject">
                <h4 class="subject_title">高校科目</h4>
                @foreach($h_subjects as $h_subject)
                <span><input type="checkbox" id={{$h_subject['id']}} value="{{$h_subject['subject_name']}}"><label for="{{$h_subject['id']}}">{{$h_subject['subject_name']}}</label></span>
                @endforeach
              </div>
              <div class="special_subject">
                <h4 class="subject_title">専門科目</h4>
                @foreach($s_subjects as $s_subject)
                <span><input type="checkbox" id={{$s_subject['id']}} value="{{$s_subject['subject_name']}}"><label for="{{$s_subject['id']}}">{{$s_subject['subject_name']}}</label></span>
                @endforeach
              </div>
            </div>
            <div class="submit_button">
              <input type="submit" value="検索する">
            </div>
            <div class="search_button" onclick="obj=document.getElementById('open5').style; obj.display=(obj.display=='none')?'block':'none';">
              <a style="cursor:pointer;">さらに詳しく検索する</a>
            </div>
            <div class="open2" id="open5" style="display:none;clear:both;">
            <p>あいうえお</p>
            <div class="submit_button">
              <input type="submit" value="検索する">
            </div>
          </div>
        </form>
        </div>
      </div>
    </section>
  </article>
  <article class="guideline">
    <section id="guideline">
      <div class="guideline_contents">
        <a href="" class="guideline">
          <div class="icon">&#xf19d</div>
          <label>Manaloveとは</label>
          <p>Manaloveの利用方法</p>
          <p>対象年齢・サービスについて</p>
        </a>
        <a href="" class="guideline">
          <div class="icon">&#xf0d6</div>
          <label>料金について</label>
          <p>料金例</p>
          <p>低価格で提供できる理由</p>
        </a>
        <a href="" class="guideline">
          <div class="icon">&#xf05a</div>
          <label>ご利用ガイドライン</label>
          <p>生徒・講師の探し方</p>
        </a>
        <a href="" class="guideline">
          <div class="icon">&#xf059</div>
          <label>よくあるご質問</label>
          <p>よくお問い合わせいただく質問についてまとめました</p>
        </a>
      </div>
    </section>
  </article>
  <article class="trouble">
    <section id="trouble">
      <h2>お子様の学習に関するこんな課題に</h2>
      <div class="tables">
        <div class="table" onclick="obj=document.getElementById('open1').style; obj.display=(obj.display=='none')?'block':'none';">
          <a style="cursor:pointer;">▼</a>
          <label>❶</label>
          <div class="table_contents">
            <p>新型コロナウイルスも流行っているので</p>
            <p class="emphasis">人が集まるところでの学習が不安</p>
          </div>
        </div>
        <div class="open" id="open1" style="display:none;clear:both;">
          <div class="opened_contents">
            <img class="lazyload" src="images/fullremote.jpg">
            <div class="opnened_text">
              <p>当システムは、完全にリモートです。</p>
              <p>そのため、外に出る必要もなく授業を受けることが可能です。</p>
            </div>
          </div>
        </div>
        <hr/>
        <div class="table" onclick="obj=document.getElementById('open2').style; obj.display=(obj.display=='none')?'block':'none';">
          <a style="cursor:pointer;">▼</a>
          <label>❷</label>
          <div class="table_contents">
            <p>学校から帰ってきても遊んでばかり・・・</p>
            <p class="emphasis">とにかく自分で学習する習慣をつけて欲しい！</p>
          </div>
        </div>
        <div class="open" id="open2" style="display:none;clear:both;">
          <div class="opened_contents">
            <img class="lazyload" src="images/fullremote.jpg">
            <div class="opnened_text">
              <p>当システムは、完全個別指導なので</p>
              <p>生徒様それぞれに合ったカリキュラムを立てることが可能です。</p>
              <p>毎回の授業時、学習状況のチェックを行います。</p>
              <p>詳しくは<a href="/course">コース詳細</a>をご確認ください。</p>
            </div>
          </div>
        </div>
        <hr />
        <div class="table" onclick="obj=document.getElementById('open3').style; obj.display=(obj.display=='none')?'block':'none';">
          <a style="cursor:pointer;">▼</a>
          <label>❸</label>
          <div class="table_contents">
            <p>映像授業や通信教育をしているけれど</p>
            <p class="emphasis">わからないところを質問できる環境が欲しい</p>
          </div>
        </div>
        <div class="open" id="open3" style="display:none;clear:both;">
          <div class="opened_contents">
            <img class="lazyload" src="images/fullremote.jpg">
            <div class="opnened_text">
              <p>映像授業は、いつでも繰り返し見ることができる一方で、</p>
              <p>説明自体は一方通行であるため、つまづいたところが質問できません。</p>
              <p>その点、家庭教師は生徒様それぞれにあわせた指導であるため、いつでも質問が可能です。</p>
              <p>他サービスの映像授業と組み合わせて当システムをご利用いただくのもおすすめです。</p>
            </div>
          </div>
        </div>
        <hr />
        <div class="table" onclick="obj=document.getElementById('open4').style; obj.display=(obj.display=='none')?'block':'none';">
          <a style="cursor:pointer;">▼</a>
          <label>❹</label>
          <div class="table_contents">
            <p>集団より個別で教えて欲しいけれど</p>
            <p class="emphasis">個別指導塾も高い。家庭教師はもっと高い</p>
          </div>
        </div>
        <div class="open" id="open4" style="display:none;clear:both;">
          <div class="opened_contents">
            <img class="lazyload" src="images/fullremote.jpg">
            <div class="opnened_text">
              <p>一般の家庭教師は1時間あたり3000円〜。</p>
              <p>家庭教師センターなどを利用すると1時間で5000円を超えることも少なくありません。</p>
              <p>当システムは先生と生徒それぞれが相手を探すシステムを採用しており</p>
              <p>1時間1500円〜の授業が可能です。</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </article>
  <article class="teacher_info">
    <section id="popular">
      <h2>人気の先生</h2>
      <div class="teachers">
        @foreach($updates as $update)
        <a class="teacher" href="/teachers/profile/{{$update['id']}}">
          <div class="teacher_container">
            <div class="teacher_image">
              <img src="images/account.jpeg" alt="{{$update['view_name']}}">
              <p class="hour_pays">¥{{$update['hour_pays']}}〜 <span>/1時間</span></p>
            </div>
            <div class="teacher_information">
                <h3><sapn>{{$update['view_name']}}</sapn>先生</h3>
              <p class="subject">小学科目：</p><span>{{$update['p_subject']}}</span>
              <p class="subject">中学科目：</p><span>{{$update['j_h_subject']}}</span>
              <p class="subject">高校科目：</p><span>{{$update['h_subject']}}</span>
            </div>
          </div>
        </a>
        @endforeach
      </div>
    </section>
    <section class="between">
      <hr class="between_section">
    </section>
    <section id="recent_sign_up">
      <h2>最近登録した先生</h2>
      <div class="teachers">
        @foreach($creates as $create)
        <a class="teacher" href="/teachers/profile/{{$create['id']}}">
          <div class="teacher_container">
            <div class="teacher_image">
              <img src="images/account.jpeg" alt="{{$create['view_name']}}">
              <p class="hour_pays">¥{{$create['hour_pays']}}〜 <span>/1時間</span></p>
            </div>
            <div class="teacher_information">
              <h3><sapn>{{$create['view_name']}}</sapn>先生</h3>
              <p class="subject">小学科目：</p><span>{{$create['p_subject']}}</span>
              <p class="subject">中学科目：</p><span>{{$create['j_h_subject']}}</span>
              <p class="subject">高校科目：</p><span>{{$create['h_subject']}}</span>
            </div>
          </div>
        </a>
        @endforeach
      </div>
    </section>
    <section class="between">
      <hr class="between_section">
    </section>
    <section id="special_subject">
      <h2>専門科目が見れる先生</h2>
      <div class="teachers">
        @foreach($specials as $special)
        <a class="teacher" href="/teachers/profile/{{$special['id']}}">
          <div class="teacher_container">
            <div class="teacher_image">
              <img src="images/account.jpeg" alt="{{$special['view_name']}}">
              <p class="hour_pays">¥{{$special['hour_pays']}}〜 <span>/1時間</span></p>
            </div>
            <div class="teacher_information">
              <h3>{{$special['view_name']}}先生</h3>
              <p class="subject">専門科目：</p><span>{{$special['s_subject']}}</span>
            </div>
          </div>
        </a>
        @endforeach
      </div>
    </section>
  </article>
</div>
@include('footer')
    <script src="http://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.min.js"></script>
  <script>
    lazyload();
  </script>
</body>
</html>
