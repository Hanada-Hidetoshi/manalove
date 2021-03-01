@include('header',['title' => 'test_results','title_ja' => 'テスト結果'])
  <div class="container">
      @include('aside')
      <main>
      <div class="test_results_regist">
        <button><a href="/test_results_regist">テスト結果登録</a></button>
      </div>
      <table>
        <tr>
          <th style="width:10%">テスト単元</th>
          <th style="width:10%">試験日</th>
          <th>英語</th>
          <th>数学</th>
          <th>理科</th>
          <th>社会</th>
          <th>国語</th>
          <th>合計</th>
          <th style="width:5%">修正</th>
          <th style="width:5%">削除</th>
        </tr>
        <tr>
          <td>1学期中間</td>
          <td>2020/5/25</td>
          <td>55</td>
          <td>70</td>
          <td>75</td>
          <td>60</td>
          <td>60</td>
          <td>320</td>
          <td><a href="">修正</a></td>
          <td><a href class="delete">削除</a></td>
        </tr>
      </table>
    </main>
  </div>
  @include('footer')
</div>
</body>
</html>