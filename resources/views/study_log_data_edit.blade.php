@include('header',['title' => 'study_log_data','title_ja' => '学習'])
  <div class="container">
      @include('aside')
    <main>
      <section class="first">
        <div class="results_regist">
          <table>
            <tr>
              <th style="width:10%">日付</th>
              <th style="width:10%">教科</th>
              <th style="width:10%">勉強した時間</th>
              <th style="width:40%">内容・まとめ</th>
              <th style="width:20%">登録</th>
            </tr>
              @foreach($items as $item)
            <form action="/study_logs/complete/{{$item['id']}}" method="post">
              @csrf
            <tr>
              <th><input type="date" name="implimantation" value="{{$item['implimantation']}}"></th>
              <th><input type="text" name="subject" value="{{$item['subject']}}"></th>
              <th><span><input type="number" name="elapsed_time" value="{{$item['elapsed_time']}}">分</span></th>
              <th><textarea name="summary">{{$item['summary']}}</textarea></th>
              <th><input type="submit" value="学習ログ変更"></th>
              @endforeach
            </tr>
            </form>
          </table>
        </div>
      </section>
    </main>
  </div>
  @include('footer')
</div>
</body>
</html>
