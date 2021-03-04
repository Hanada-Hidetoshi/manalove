@include('header',['title' => 'message_data','title_ja' => 'メッセージ一覧'])
  <div class="container">
    @include('aside')
  	<main>
			<div class="message_datas">
			<h2>マッチング済み講師一覧</h2>
				@foreach($items as $item)
				<div class="tables">
					<table>
						<tr>
							<th style="width:20%">ニックネーム</th>
							<th style="width:30%">氏名</th>
							<th style="width:40%">LINEworksID</th>
							<th style="width:10%">詳細確認</th>
						</tr>
						<tr>
							<td>{{$item['view_name']}}</td>
							<td>{{$item['last_name']}}　{{$item['first_name']}}</td>
							<td>あ</td>
						</tr>
					</table>
				</div>
				@endforeach
			</div>
		</main>
</div>
	@include('footer')
</body>
</html>