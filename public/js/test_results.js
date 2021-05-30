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
          $("#test_result").first().clone(true).insertAfter("#test_result");
      }
      /*console.log(test_arr[i]["subject_id"]);*/
        $("#score").last().val(test_arr[i]["score"]);
        $("#subject").last().val(test_arr[i]["subject_id"]);
    }
    // ダイアログの呼び出し処理
    $("#mydialog").dialog("open");
};
for(j=0;j<3;j++){
  $(function(){
    numbers = $('#sum_'+j).data('score');
    sum = 0;
    for(i=0;i<numbers.length;i++){
      sum = sum + numbers[i]['score'];
    };
    $('#sum_'+j).text(sum);
  });
};
$(function(){
  testLavel=[];
  numbers1 = $('#sum_2').data('score');
  numbers2 = $('#sum_3').data('score');
  testLavel = [numbers1[0]['test_name'],numbers2[0]['test_name']];
  for(i=0;i<4;i++){
    if($('#sum_'+i)!=null){
      numbers1 = $('#sum_'+i).data('score');
      console.log(numbers+i);
      testLavel.push(numbers[0]['test_name']);
      numbers=[];
    };
  };
  subjectNames= ['英語','数学','理科'];
  var ctx = $("#lineChart");
  var lineChart = new Chart(ctx, {
    type: 'line',
    data : {
      labels: testLavel, //データ項目のラベル
      datasets: [{
        lineTension: 0,
        label: subjectNames[0],
        data: [70, 40],
      },{
        lineTension: 0,
        label: subjectNames[1],
        data: [80, 70],
      }]
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
  //selectタグ内で表示されている教科名を全て取得する
//  var subjectNames= $('select#subject option').map(function(){
//    return $(this).text();
//  }).get();
  
  //scoresの設定
//  var cnt = 0;
//  console.log(numbers);
//  for(k=0;k<maxTestId;k++){
//    if($('#sum_'+k).length){
//      for(j=0;j<numbers[cnt].length;j++){
        // datas.push({numbers[cnt][j]['subject_name']:{cnt:numbers[cnt][j]['score']}});
        // datas[numbers[cnt][j]['subject_name']][cnt] = numbers[cnt][j]['score'];
        // scores.push(numbers[cnt][j]['score']); //174行目と同じなので後で移動
//      }
//      datas.push(scores);
//      scores = [];
//      cnt++;
//    }
//  }
//  
//  score_arr=[];
//  for(var i=0;i<datas.length;i++){
//    for(var j=0;j<datas[i].length;j++){
//      score_arr[subjectNames[j+1]][] = datas[i][j];
//    }
//  }
  