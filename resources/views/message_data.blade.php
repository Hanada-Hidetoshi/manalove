@include('header',['title' => 'message_data','title_ja' => 'メッセージ一覧'])
  <div class="container">
    @include('aside')
  	<main>
			<div class="message_datas">
			<h2>マッチング済ユーザー一覧</h2>
				@if($matching_users->isEmpty())	
				<p>マッチング済みのユーザーはいません</p>
				@else
				<div class="tables">
					<table>
						<tr>
							<th style="width:20%">ニックネーム</th>
							<th style="width:30%">氏名</th>
							@if(Session::get('user_attribute')==1)
							<th style="width:40%">LINEworksID</th>
							@endif
							<th style="width:10%">詳細確認</th>
						</tr>
						@foreach($matching_users as $matching_user)
						<tr>
							<td>{{$matching_user['view_name']}}さん</td>
							<td>{{$matching_user['last_name']}}　{{$matching_user['first_name']}}さん</td>
							@if(Session::get('user_attribute')==1)
							<td>{{$matching_user['line_works']}}</td>
							<td><a href="/teachers/profile/{{$matching_user['id']}}">詳細</a></td>
							@elseif(Session::get('user_attribute')==0)
							<td><a href="/students/profile/{{$matching_user['id']}}">詳細</a></td>
							@endif
						</tr>
						@endforeach
					</table>
				</div>
				@endif
			</div>
			<div class="message_datas">
			<h2>承認待ちユーザー一覧</h2>
				@if($waiting_users->isEmpty())	
				<p>承認待ちのユーザーはいません</p>
				@else
				<div class="tables">
					<table>
						<tr>
							<th style="width:40%">ニックネーム</th>
							<th style="width:25%">承認</th>
							<th style="width:25%">非承認</th>
							<th style="width:10%">詳細確認</th>
						</tr>
						@foreach($waiting_users as $waiting_user)
						<tr>
							<td>{{$waiting_user['view_name']}}さん</td>
							<td><a href="/matching/{{$waiting_user['id']}}">承認</a></td>
							<td><a href="/reject/{{$waiting_user['id']}}">非承認</a></td>
							@if(Session::get('user_attribute')==1)
							<td><a href="/teachers/profile/{{$waiting_user['id']}}">詳細</a></td>
							@elseif(Session::get('user_attribute')==0)
							<td><a href="/students/profile/{{$waiting_user['id']}}">詳細</a></td>
							@endif
						</tr>
						@endforeach
					</table>
				</div>
				@endif
			</div>
			<div class="message_datas">
			<h2>{{ Session::get('view_name') }}さんから申請したユーザー一覧</h2>
				@if($from_myself_users->isEmpty())		
				<p>{{ Session::get('view_name') }}さんから申請したユーザーはいません</p>
				@else
				<div class="tables">
					<table>
						<tr>
							<th style="width:40%">ニックネーム</th>
							<th style="width:25%">承認取り下げ</th>
							<th style="width:10%">詳細確認</th>
						</tr>
						@foreach($from_myself_users as $from_myself_user)
						<tr>
							<td>{{$from_myself_user['view_name']}}さん</td>
							<td><a href="/withdraw/{{$from_myself_user['id']}}">申請取り下げ</a></td>
							@if(Session::get('user_attribute')==1)
							<td><a href="/teachers/profile/{{$from_myself_user['id']}}">詳細</a></td>
							@elseif(Session::get('user_attribute')==0)
							<td><a href="/students/profile/{{$from_myself_user['id']}}">詳細</a></td>
							@endif
						</tr>
						@endforeach
					</table>
				</div>
				@endif
			</div>
		</main>
</div>
	@include('footer')
</body>
</html>