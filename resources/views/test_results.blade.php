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
                <input type="text" name="test_name">
              </div>
              <div class="title">
                <label for="implimantation">実施日</label>
                <input type="date" name="implimantation">
              </div>
            </div>
            <input type="hidden" name="test_id" value={{$max_test_id}}>
            <input type="hidden" name="s_id" value={{Session::get('id')}}>
            <hr>
            <div class="test_result">
              <select name="subject_id[]">
                <option hidden>教科名</option>
              @if(Session::get('course')<7)
                @foreach($primarys as $primary)
                  <option name="subject_id[]" value="{{$primary['id']}}">{{$primary['subject_name']}}</option>
                @endforeach
              @elseif(Session::get('course')<10)
                @foreach($juniorhighs as $juniorhigh)
                  <option name="subject_id[]" value="{{$juniorhigh['id']}}">{{$juniorhigh['subject_name']}}</option>
                @endforeach
              @elseif(Session::get('course')<13)
                @foreach($highs as $high)
                  <option name="subject_id[]" value="{{$high['id']}}">{{$high['subject_name']}}</option>
                @endforeach
                @foreach($specials as $special)
                  <option name="subject_id[]" value="{{$special['id']}}">{{$special['subject_name']}}</option>
                @endforeach
              @endif
              </select>
              <input type="number" min=0 name="score[]" placeholder="得点">
              <input type="button" value="＋" class="add">
              <input type="button" value="－" class="del">
            </div>
          </form>
        </div>
      </div>
      @if($list != null)
      @for($i=0;$i<count($list);$i++)
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
          <td>320</td>
          <td><a href="/test_results/edit/{{$list[$i]['items'][0]['test_id']}}">修正</a></td>
          <td><a href="/test_results/delete/{{$list[$i]['items'][0]['test_id']}}" class="delete">削除</a></td>
        </tr>
      </table>
      </div>
      @endfor
      @else
      <p>テスト成績の登録はありません</p>
      @endif
    </main>
  </div>
  @include('footer')
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script>
$(document).on("click", ".add", function() {
    $(this).parent().clone(true).insertAfter($(this).parent());
});
$(document).on("click", ".del", function() {
    var target = $(this).parent();
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

})
</script>
</body>
</html>