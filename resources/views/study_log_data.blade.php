@include('header',['title' => 'study_log_data','title_ja' => '学習'])
  <div class="container">
      @include('aside')
    <main>
      <section class="first">
        <div class="results_regist">
          <table>
            @if(Session::get('id')!=null)
            <tr>
              <th style="width:10%">日付</th>
              <th style="width:10%">教科</th>
              <th style="width:10%">勉強した時間</th>
              <th style="width:40%">内容・まとめ</th>
              <th style="width:20%">登録</th>
            </tr>
            <form action="/study_logs/regist" method="post">
              @csrf
              <input type="hidden" name="s_id" value="{{Session::get('id')}}">
              <input type="hidden" name="s_name" value="{{Session::get('view_name')}}">
            <tr>
              <th><input type="date" name="implimantation" value="<?php echo date('Y-m-d');?>"></th>
              <th><input type="text" name="subject"></th>
              <th><span><input type="number" name="elapsed_time">分</span></th>
              <th><textarea name="summary"></textarea></th>
              <th><input type="submit" value="学習ログ登録"></th>
            </tr>
            </form>
            @endif
          </table>
          <a href="/study_logs/csv">CSVダウンロード</a>
        </div>
      </section>
      <section class="second">
        <div class="study_summary">
          <div class="section_title">
            <h2>{{Session::get('view_name')}}さんの学習サマリー</h2>
          </div>
          <div class="summarys">
            <div class="study_log_data">
              <table>
                @foreach($items as $item)
                <tr class="data">
                  <td>{{$item['implimantation']}}</td>
                  <td>{{$item['subject']}}</td>
                  <td>{{$item['elapsed_time']}}</td>
                  <td>{{$item['summary']}}</td>
                  <td><a href="/study_logs/edit/{{$item['id']}}">編集</a></td>
                  <td><a href="/study_logs/delete/{{$item['id']}}">削除</a></td>
                </tr>
                @endforeach
              </table>
            </div>
            <div class="summary">
              <p>今週<span>{{$data['w_study']}}分</span></p>
              <p>今月<span>{{$data['m_study']}}分</span></p>
              <p>合計時間<span>{{$data['all_study']}}分</span></p>
              <p>合計登録回数<span>{{$data['count']}}回</span></p>
            </div>
          </div>
        </div>
      </section>
      <section>
      <canvas id="myPieChart"></canvas>
      </section>
    </main>
  </div>
  @include('footer')
</div>
<input type="hidden" id="subject_log" data-subject="{{implode(',', $subject['subject_name']) }}" data-time="[{{implode(",", $subject['time'])}}]">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="https://github.com/nagix/chartjs-plugin-colorschemes/releases/download/v0.2.0/chartjs-plugin-colorschemes.min.js"></script>
<script>
$(function(){
  subject=$('#subject_log').data('subject');
  subject=subject.split(',');
  var ctx = $("#myPieChart");
  var myPieChart = new Chart(ctx, {
    type: 'pie',
    data : {
      labels: subject, //データ項目のラベル
      datasets: [{
        data:$('#subject_log').data('time') //グラフのデータ
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
        text: '学習サマリー'
      }
    }
  });
});
</script>
</body>
</html>
