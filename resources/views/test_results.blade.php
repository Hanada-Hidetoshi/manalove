@include('header',['title' => 'test_results','title_ja' => 'テスト結果'])
  <div class="container">
      @include('aside')
      <main>
      <div class="results_regist">
        <button id="btn_action">テスト結果登録</button>
        <div id="mydialog" title="テスト結果の登録">
          <form action="/test_results/regist" method="post">
            @csrf
            <div class="titles">
              <div class="title">
                <label for="test_title">単元名</label>
                <input type="text" name="test_name" id="test_name">
              </div>
              <div class="title">
                <label for="implimantation">実施日</label>
                <input type="date" name="implimantation" id="implimantation">
              </div>
            </div>
            <input type="hidden" id="test_id" name="test_id" value={{$max_test_id}}>
            <input type="hidden" id="s_id" name="s_id" value={{Session::get('id')}}>
            <hr>
            <div class="test_result" id="test_result">
              <select name="subject_id[]" id="subject">
                <option hidden>教科名</option>
              @if(Session::get('course')<7)
                @foreach($primarys as $primary)
                  <option name="subject_id[]" id="subjects" value="{{$primary['id']}}">{{$primary['subject_name']}}</option>
                @endforeach
              @elseif(Session::get('course')<10)
                @foreach($juniorhighs as $juniorhigh)
                  <option name="subject_id[]" id="subjects" value="{{$juniorhigh['id']}}">{{$juniorhigh['subject_name']}}</option>
                @endforeach
              @elseif(Session::get('course')<13)
                @foreach($highs as $high)
                  <option name="subject_id[]" id="subjects" value="{{$high['id']}}">{{$high['subject_name']}}</option>
                @endforeach
                @foreach($specials as $special)
                  <option name="subject_id[]" id="subjects" value="{{$special['id']}}">{{$special['subject_name']}}</option>
                @endforeach
              @endif
              </select>
              <input type="number" min=0 name="score[]" placeholder="得点" id="score">
              <input type="button" value="＋" class="add">
              <input type="button" value="－" class="del">
            </div>
          </form>
        </div>
      </div>
      @for($i=0;$i<count($list);$i++)
      @if($list[$i]!=null)
      <div class="scores">
      <table>
        <tr>
          <th style="width:10%">テスト単元</th>
          <th style="width:10%">試験日</th>
          @foreach($list[$i]['items'] as $item)
          <th style="width:auto">{{$item['subject_name']}}</th>
          @endforeach
          <th style="width:10%">合計</th>
          <th style="width:5%">修正</th>
          <th style="width:5%">削除</th>
        </tr>
        <tr>
          <th>{{$list[$i]['items'][0]['test_name']}}</th>
          <th>{{$list[$i]['items'][0]['implimantation']}}</th>
          @foreach($list[$i]['items'] as $item)
          <th>{{$item['score']}}</th>
          @endforeach
          <td id="sum_{{$list[$i]['items'][0]['test_id']}}" data-score="{{$list[$i]['items']}}"></td>
          <td><a href="javascript:editClick({{$list[$i]['items']}});">修正</a></td>
          <td><a href="/test_results/delete/{{$list[$i]['items'][0]['test_id']}}" class="delete">削除</a></td>
        </tr>
      </table>
      </div>
      @endif
      @endfor
    <canvas id="lineChart"></canvas>
    </main>
  </div>
  @include('footer')
</div>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="https://github.com/nagix/chartjs-plugin-colorschemes/releases/download/v0.2.0/chartjs-plugin-colorschemes.min.js"></script>
<script>
$(document).on("click", ".add", function() {
    $("#test_result").clone(true).insertAfter($(this).parent());
});
$(document).on("click", ".del", function() {
    var target = $("#test_result");
    if (target.parent().children().length > 1) {
        target.remove();
    }
});
$(function(){
  // ダイアログの初期設定
  $("#mydialog").dialog({
    autoOpen: false,  // 自動的に開かないように設定
    width: 500,       // 横幅のサイズを設定
    modal: true,      // モーダルダイアログにする
    buttons: [        // ボタン名 : 処理 を設定
      {
        text: '登録',
        click: function(){
          $('form').submit();
        }
      },
      {
        text: 'キャンセル',
        click: function(){
          // ダイアログを閉じる
          $(this).dialog("close");
        }
      }
    ]
  });
  $("#btn_action").click(function(){
      // ダイアログの呼び出し処理
      $("#mydialog").dialog("open");
  });
});
function editClick(test_arr){
  // console.log(test_arr);
    // test_idを利用して情報を表示
    $("#test_id").val(test_arr[0]["test_id"]);
    $("#test_name").val(test_arr[0]["test_name"]);
    $("#implimantation").val(test_arr[0]["implimantation"]);
    $("#s_id").val(test_arr[0]["s_id"]);
    for (var i=0; i < test_arr.length; i++) {
      if(i>0){
        $("#score").last().val(test_arr[i]["score"]);
        $("#subject").last().val(test_arr[i]["subject_id"]);
        $("#test_result").first().clone(true).insertAfter("#test_result");
      }
        $("#score").last().val(test_arr[i]["score"]);
        $("#subject").last().val(test_arr[i]["subject_id"]);
        console.log(test_arr[i]["subject_id"]);
        console.log(test_arr[i]["score"]);
    }
    // ダイアログの呼び出し処理
    $("#mydialog").dialog("open");
};
$(function(){
  datas=[];
  total=[];
  scores=[];
  maxTestId=$('#test_id').val();
  for(i=0;i<maxTestId;i++){
    if($('#sum_'+i).length){
      datas.push($('#sum_'+i).data('score'));
    }
    for(j=0;j<datas.length;j++){
      for(k=0;k<datas[j].length;k++){
        scores.push(datas[j][k]['score'])
      }
      total[j]=scores.reduce((sum, element) => sum + element, 0);
      scores=[];
    $('#sum_'+i).text(total[j]);
    }
  }
});
$(function(){
  testLavel=[];
  numbers=[];
  scores=[];
  score=[];
  datas=[];
  dataSets=[];
  subjectName=[];
  testUnitScore=[];
  subjectScores=[];
  //numbers配列に、test_idに紐づく情報を配列として入れる
  for(i=0;i<maxTestId;i++){
    if($('#sum_'+i).length){
      numbers.push($('#sum_'+i).data('score'));
    }
  }
  //testLavel配列に、numbers配列に入っているtest_nameの情報を配列として入れる
  //テストの回数分ループ
  for(j=0;j<numbers.length;j++){
    testLavel.push(numbers[j][0]['test_name']);
    //テストの科目分ループ　教科名を全て取得する
    for(i=0;i<numbers[j].length;i++){
      if(!subjectName.includes(numbers[j][i]['subject_name'])){
        subjectName.push(numbers[j][i]['subject_name']);
      }
    }
  }
  
  //テストごとに点数を取得
  for(j=0;j<numbers.length;j++){
    for(i=0;i<numbers[j].length;i++){
      testUnitScore.push(numbers[j][i]['score']);
    }
    score.push(testUnitScore);
    testUnitScore=[];
  }
  for(j=0;j<subjectName.length;j++){
    for(i=0;i<score.length;i++){
      subjectScores.push(score[i][j]);
    }
    scores.push(subjectScores);
    subjectScores=[];
  }
  for(i=0;i<scores.length;i++){
    dataSets.push({label:subjectName[i],data:scores[i]})
  }

//  console.log(subjectName);
//  console.log(score);
//  console.log(scores);
//  subjectName = ['英語','数学'];
//  datas[subjectName[0]]=[30,20];
//  datas[subjectName[1]]=[40,50];
//    //datasetsの設定
//    for(var subjectName in datas){
//      dataSets.push({label:subjectName,data:datas[subjectName]});
//    }
//  console.log(dataSets);
//↓からグラフの記述
  var ctx = $("#lineChart");
  var lineChart = new Chart(ctx, {
    type: 'line',
    data : {
      labels: testLavel, //データ項目のラベル
      lineTension: 0,
      datasets:dataSets
    },
    options: {
      plugins: {
        colorschemes: {
          scheme: 'brewer.Spectral11'
        }
      },
      title: {
        display: true,
        text: 'テスト成績の推移'
      },
      scales: {
        yAxes: [{
          ticks: {
            suggestedMin: 0,
            suggestedMax: 100
          }
        }]
      }
    }
  });
});
</script>
</body>
</html>