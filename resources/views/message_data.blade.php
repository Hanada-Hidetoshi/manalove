@include('header',['title' => 'message_data','title_ja' => 'メッセージ一覧'])
  <div class="container">
      @include('aside')
  		<main>
			<div class="message_datas">
				<div class="tables">
					<h2>マッチング済み講師一覧</h2>
					<table>
						<tr>
							<th style="width:20%">講師名</th>
							<th style="width:30%">最終やりとり日</th>
							<th style="width:40%">担当教科</th>
							<th style="width:10%">詳細確認</th>
						</tr>
						<tr>
							<td>花田</td>
							<td>2021/2/10</td>
							<td>数学１</td>
							<td><a href="message?t=1&s=2">詳細確認</a></td>
						</tr>
					</table>
				</div>
				<div class="tables">
					<h2>メッセージ受信一覧</h2>
					<table>
						<tr>
							<th style="width:33%">講師名</th>
							<th style="width:33%">最終やりとり日</th>
							<th stuyle="width:33%">詳細確認</th>
						</tr>
						<tr>
							<td>山本</td>
							<td>2020/12/30</td>
							<td><a href="message?t=123&s=100">詳細確認</a></td>
						</tr>
					</table>
				</div>
			</div>
		</main>
</div>
	@include('footer')
</body>
</html>