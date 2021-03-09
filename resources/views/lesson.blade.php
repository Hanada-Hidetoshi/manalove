@include('header',['title' => 'lesson','title_ja' => 'レッスン/実績'])
  <div class="container">
      @include('aside')
    <main>
      @if(Session::get('user_attribute') ===0)
      <section>
      <div class="results_regist">
        <table>
          <tr>
            <th style="width:10%">予定日時</th>
            <th style="width:10%">生徒名</th>
            <th style="width:10%">教科</th>
            <th style="width:30%">内容</th>
            <th style="width:20%">登録</th>
          </tr>
          <form action="/lesson/regist" method="post">
            @csrf
            <input type="hidden" name="t_id" value="{{Session::get('id')}}">
            <input type="hidden" name="t_name" value="{{Session::get('view_name')}}">
          <tr>
            <th><input type="datetime-local" name="scheduled" value="<?php echo date('Y-m-d');?>"></th>
            <th><select name="s_id">
              <option hidden>生徒名選択</option>
              @foreach($matching_users as $matching_user)
              <option value="{{$matching_user['id']}}">{{$matching_user['view_name']}}さん</option>
              @endforeach
            </select></th>
            <th><input type="text" name="subject"></th>
            <th><textarea name="summary"></textarea></th>
            <th><input type="submit" value="予定登録"></th>
          </tr>
          </form>
        </table>
      </div>
      </section>
      @endif
      <div class="recent_lesson">
        <div class="section_title">
          <h2>次回のレッスン</h2>
        </div>
        <p>◯月◯日（木）15:00〜16:00</p>
        <p>教科：英語　担当講師：▲▲先生</p>
        <p>内容：〜〜〜</p>
        <p>URL：<a href="https://zoom.us/jp-jp/meetings.html">https://zoom.us/jp-jp/meetings.html</a></p>
      </div>
      <div class="performance">
        <div class="section_title">
          <h2>レッスン実績</h2>
        </div>
        <table>
          <tr>
            <th style="width:10%">予定日時</th>
            <th style="width:10%">実施日時</th>
            @if(Session::get('user_attribute')===1)
            <th style="width:10%">講師名</th>
            @elseif(Session::get('user_attribute')===0)
            <th style="width:10%">生徒名</th>
            @endif
            <th style="width:15%">内容</th>
            <th style="width:15%">講師コメント</th>
            <th style="width:15%">生徒コメント</th>
            <th style="width:10%">実績登録</th>
            <th style="width:7.5%">修正<p>(先生のみ)</p></th>
            <th style="width:7.5%">削除<p>(先生のみ)</p></th>
          </tr>
          @foreach($lessons as $lesson)
          <tr>
            <td>{{$lesson['scheduled']}}</td>
            <td>{{$lesson['implimantation']}}</td>
            @if(Session::get('user_attribute')===1)
            <td>{{$lesson['t_name']}}さん</td>
            @elseif(Session::get('user_attribute')===0)
            <td>{{$lesson['s_name']}}さん</td>
            @endif
            <th>{{$lesson['content']}}</th>
            <td>{{$lesson['t_comment']}}</td>
            <td>{{$lesson['s_comment']}}</td>
            <td><a href="lesson/fix/{{$lesson['id']}}">実績登録</a></td>
            @if(Session::get('user_attribute')===0)
            <td><a href="lesson/edit/{{$lesson['id']}}">修正</a></td>
              @if($lesson['s_comment'] ==null)
              <td><a href="/lesson/delete/{{$lesson['id']}}">削除</a></td>
              @else
              <td>削除不可</td>
              @endif
            @else
            <td>編集不可</td>
            <td>削除不可</td>
            @endif
          </tr>
          @endforeach
        </table>
      </div>
    </main>
  </div>
</div>
  @include('footer')
</body>
</html>
