@include('header',['title' => 'lesson','title_ja' => 'レッスン編集'])
  <div class="container">
      @include('aside')
    <main>
    @if(request()->is('*edit*'))
      @if(Session::get('user_attribute') ===0)
      <section>
      <div class="results_regist">
        <table>
          <tr>
            <th style="width:10%">予定日時</th>
            <th style="width:10%">生徒名</th>
            <th style="width:10%">教科</th>
            <th style="width:30%">内容</th>
            <th style="width:20%">変更</th>
          </tr>
          @foreach($items as $item)
          <form action="/lesson/complete/{{$item['id']}}" method="post">
          @csrf
          <tr>
            <th><input type="datetime-local" name="scheduled" value="{{$item['scheduled']}}"></th>
            <th><select name="s_id">
              <option hidden>生徒名選択</option>
              @foreach($matching_users as $matching_user)
              <option value="{{$matching_user['id']}}" {{$item['s_id'] ===$matching_user['id'] ?'checked="checked"' : ''}}>{{$matching_user['view_name']}}さん</option>
              @endforeach
            </select></th>
            <th><input type="text" name="subject" value="{{$item['subject']}}"></th>
            <th><textarea name="summary">{{$item['summary']}}</textarea></th>
            <th><input type="submit" value="予定変更"></th>
          </tr>
          @endforeach
          </form>
        </table>
      </div>
      </section>
      @endif
    @elseif(request()->is('*fix*'))
      <section>
      <div class="results_regist">
        <table>
          <tr>
            <th style="width:10%">予定日時</th>
            <th style="width:10%">実施日時</th>
            @if(Session::get('user_attribute') ===0)
            <th style="width:7.5%">生徒名</th>
            @elseif(Session::get('user_attribute') ===1)
            <th style="width:7.5%">講師名</th>
            @endif
            <th style="width:20%">生徒コメント</th>
            <th style="width:20%">生徒コメント</th>
            <th style="width:10%">教科</th>
            <th style="width:20%">内容</th>
            <th style="width:10%">登録</th>
          </tr>
          @foreach($items as $item)
          <form action="/lesson/confirm/{{$item['id']}}" method="post">
          @csrf
          <tr>
            <th><p>{{$item['scheduled']}}</p></th>
            @if(Session::get('user_attribute') ===0)
            <th><input type="datetime-local" name="implimantation">{{$item['implimantation']}}</p></th>
            <th><p>{{$item['s_name']}}さん</p></th>
            <th><p>{{$item['s_comment']}}</p></th>
            <th><textarea name="t_comment">{{$item['t_comment']}}</textarea></th>
            @elseif(Session::get('user_attribute') ===1)
            <th><p>{{$item['implimantation']}}</p></th>
            <th><p>{{$item['t_name']}}さん</p></th>
            <th><textarea name="s_comment">{{$item['s_comment']}}</textarea></th>
            <th><p>{{$item['t_comment']}}</p></th>
            @endif
            <th><p>{{$item['subject']}}</p></th>
            <th><p>{{$item['content']}}</p></th>
            <th><input type="submit" value="実績登録"></th>
          </tr>
          </form>
          @endforeach
        </table>
      </div>
      </section>
    @endif
    </main>
</div>
  @include('footer')
</body>
</html>
