<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/top.css">
  <link rel="shortcut icon" href="images/favicon.ico">
  <!-- <link rel="stylesheet" href="css/mobilestyle.css" media="(max-width:480px)">
  <link rel="stylesheet" href="css/pcstyle.css" media="(min-width:481px)"> -->
  <link rel="stylesheet" href="css/pcstyle.css">
  <title>Manalove|リモート家庭教師システム</title>
</head>
<body>
<div class="footerFixed">
  <header>
    <div class="header">
      <h1><a href="/"><img src="images/logo.png" alt="Manalove"></a></h1>
      <div class="search">
        <div class="keyword_search">
          <form method="get" action="/" class="keyword_search_form">
          @csrf
            <input type="text" placeholder="キーワードで探す">
            <input type="submit" onclick="location.href='/'" value="&#xf002">
          </form>
        </div>
        <div class="conditional_search">
          <form method="get" action="/teachers" class="conditional_search_form">
            @csrf
            <select name="" id="">
              <option value="" hidden>条件から探す</option>
              <option value="">人気の先生</option>
              <option value="">授業料単価</option>
              <optgroup label="担当教科（小・中）">
                <option value="">英語</option>
                <option value="">数学・算数</option>
                <option value="">理科</option>
                <option value="">社会</option>
                <option value="">国語</option>
                <option value="">技術</option>
                <option value="">家庭科</option>
                <option value="">音楽</option>
                <option value="">美術</option>
              </optgroup>
              <optgroup label="担当教科（高校）">
                <option value="">英語</option>
                <option value="">数学1A・2B</option>
                <option value="">数学3</option>
                <option value="">現代文</option>
                <option value="">漢文・古文</option>
                <option value="">生物</option>
                <option value="">化学</option>
                <option value="">物理</option>
                <option value="">地学</option>
                <option value="">理科全般</option>
                <option value="">日本史</option>
                <option value="">世界史</option>
                <option value="">地理</option>
                <option value="">倫理・政治・経済</option>
              </optgroup>
            </select>
            <input type="submit" onclick="location.href='#'" value="&#xf002">
          </form>
        </div>
      </div>
    </div>
    <nav>
      <ul>
        <li><a href="/regist/teacher">講師として登録</a></li>
        <li><a href="/regist/student">生徒として登録</a></li>
        <li><a href="/">ご利用について</a></li>
        <li><a href="/">授業について</a></li>
        <li><a href="/login">ログイン</a></li>
      </ul>
    </nav>
  </header>
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
          <form action="/teachers" method="post">
            @csrf
            <div class="subjects">
              <div class="j_h_subject">
                <h4 class="subject_title">小学科目</h4>
                @foreach($p_subjects as $p_subject)
                <span><input type="checkbox" id={{$p_subject['id']}} value="{{$p_subject['id']}}"><label for="{{$p_subject['id']}}">{{$p_subject['subject_name']}}</label></span>
                @endforeach
              </div>
              <div class="j_h_subject">
                <h4 class="subject_title">中学科目</h4>
                @foreach($j_h_subjects as $j_h_subject)
                <span><input type="checkbox" id={{$j_h_subject['id']}} value="{{$j_h_subject['id']}}"><label for="{{$j_h_subject['id']}}">{{$j_h_subject['subject_name']}}</label></span>
                @endforeach
              </div>
              <div class="h_subject">
                <h4 class="subject_title">高校科目</h4>
                @foreach($h_subjects as $h_subject)
                <span><input type="checkbox" id={{$h_subject['id']}} value="{{$h_subject['id']}}"><label for="{{$h_subject['id']}}">{{$h_subject['subject_name']}}</label></span>
                @endforeach
              </div>
              <div class="special_subject">
                <h4 class="subject_title">専門科目</h4>
                @foreach($s_subjects as $s_subject)
                <span><input type="checkbox" id={{$s_subject['id']}} value="{{$s_subject['id']}}"><label for="{{$s_subject['id']}}">{{$s_subject['subject_name']}}</label></span>
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
        <div class="teacher">
          <div class="teacher_container">
            <div class="teacher_image">
              <img src="images/account.jpeg" alt="{{$update['view_name']}}">
              <p class="hour_pays">¥{{$update['hour_pays']}} <span>/1時間</span></p>
            </div>
            <div class="teacher_information">
              <h3><sapn>{{$update['view_name']}}</sapn>先生</h3>
              <p class="subject">小中科目：</p><span>{{$update['subjects']}}</span>
              <p class="subject">高校科目：</p><span>{{$update['subjects']}}</span>
            </div>
          </div>
            <hr/>
          <div class="request">
            <a href="/teachers/profile/{{$update['id']}}">この先生に依頼</a>
          </div>
        </div>
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
        <div class="teacher">
          <div class="teacher_container">
            <div class="teacher_image">
              <img src="images/account.jpeg" alt="{{$create['view_name']}}">
              <p class="hour_pays">¥{{$create['hour_pays']}} <span>/1時間</span></p>
            </div>
            <div class="teacher_information">
              <h3><sapn>{{$create['view_name']}}</sapn>先生</h3>
              <p class="subject">小中科目：</p><span>{{$create['subjects']}}</span>
              <p class="subject">高校科目：</p><span>{{$create['subjects']}}</span>
            </div>
          </div>
            <hr/>
          <div class="request">
            <a href="/teachers/profile/{{$create['id']}}">この先生に依頼</a>
          </div>
        </div>
        @endforeach
      </div>
    </section>
    <section class="between">
      <hr class="between_section">
    </section>
    <section id="special_subject">
      <h2>専門科目が見れる先生</h2>
      <div class="teachers">
        <div class="teacher">
          <div class="teacher_container">
            <div class="teacher_image">
              <img src="images/account.jpeg" alt="◯◯先生">
              <p class="hour_pays">¥1,500 <span>/1時間</span></p>
            </div>
            <div class="teacher_information">
              <h3>◯◯先生</h3>
              <p class="subject">小中科目：</p><span>英語,数学・算数,理科</span>
              <p class="subject">高校科目：</p><span>英語,数学・算数,理科</span>
            </div>
          </div>
            <hr/>
          <div class="request">
            <a href="">この先生に依頼</a>
          </div>
        </div>
        <div class="teacher">
          <div class="teacher_container">
            <div class="teacher_image">
              <img src="images/account.jpeg" alt="◯◯先生">
              <p class="hour_pays">¥1,500 <span>/1時間</span></p>
            </div>
            <div class="teacher_information">
              <h3>◯◯先生</h3>
              <p class="subject">小中科目：</p><span>英語,数学・算数,理科</span>
              <p class="subject">高校科目：</p><span>英語,数学・算数,理科</span>
            </div>
          </div>
            <hr/>
          <div class="request">
            <a href="">この先生に依頼</a>
          </div>
        </div>
        <div class="teacher">
          <div class="teacher_container">
            <div class="teacher_image">
              <img src="images/account.jpeg" alt="◯◯先生">
              <p class="hour_pays">¥1,500 <span>/1時間</span></p>
            </div>
            <div class="teacher_information">
              <h3>◯◯先生</h3>
              <p class="subject">小中科目：</p><span>英語,数学・算数,理科</span>
              <p class="subject">高校科目：</p><span>英語,数学・算数,理科</span>
            </div>
          </div>
            <hr/>
          <div class="request">
            <a href="">この先生に依頼</a>
          </div>
        </div>
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
