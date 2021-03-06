<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/'.$title.'.css')}}">
  <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
  <!-- <link rel="stylesheet" href="css/mobilestyle.css" media="(max-width:480px)">
  <link rel="stylesheet" href="css/pcstyle.css" media="(min-width:481px)"> -->
  <link rel="stylesheet" href="{{asset('css/pcstyle.css')}}">
  <title>Manalove|{{$title_ja}}</title>
</head>
<body>
<div class="footerFixed">
  <header>
    <div class="header">
      <h1><a href="/"><img src="{{asset('images/logo.png')}}" alt="Manalove"></a></h1>
      <div class="search">
        <div class="keyword_search">
          <form method="get" action="/" class="keyword_search_form">
            <input type="text" placeholder="キーワード">
            <input type="submit" action="/" value="&#xf002">
          </form>
        </div>
        <div class="conditional_search">
          <form method="get" action="/" class="conditional_search_form">
            <select name="" id="">
              <option value="" hidden>条件から探す</option>
              <option value="">人気の先生</option>
              <option value="">授業料単価</option>
              <optgroup label="担当教科（小・中）">
                <option value="">英語</option>
                <option value="">算数・数学</option>
                <option value="">理科</option>
                <option value="">社会</option>
                <option value="">国語</option>
                <option value="">技術</option>
                <option value="">家庭科</option>
                <option value="">音楽</option>
                <option value="">美術</option>
                <option value="">その他科目</option>
                </option>
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
                <option value="">現代社会</option>
                <option value="">日本史</option>
                <option value="">世界史</option>
                <option value="">地理</option>
                <option value="">倫理・政治・経済</option>
                <option value="">その他科目</option>
              </optgroup>
              <optgroup label="担当教科（専科）">
                <option value="">情報</option>
                <option value="">商業</option>
                <option value="">農業</option>
                <option value="">工業</option>
                <option value="">水産</option>
                <option value="">福祉</option>
                <option value="">看護</option>
                <option value="">家庭/生活</option>
              </optgroup>
            </select>
            <input type="submit" action="/" value="&#xf002">
          </form>
        </div>
      </div>
      <div class="account">
        <ul>
          <li><a href="/account_info">{{ Session::get('view_name') }}さん</a></li>
          <li><a href="/information">&#xf0f3</a></li>
          <li><a href="/message_data">&#xf003</a></li>
          <li><a href="/help">&#xf128</a></li>
        </ul>
      </div>
    </div>
    <nav>
      <ul>
        <li><a href="/admin/mypage">マイページ</a></li>
        <li><a href="/studentsearch">生徒検索</a></li>
        <li><a href="/teachersearch">先生検索</a></li>
        <li><a href="/lessoninfo">授業について</a></li>
        <li><a href="/admin">ログアウト</a></li>
      </ul>
    </nav>
  </header>