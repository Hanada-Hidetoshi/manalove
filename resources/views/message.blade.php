<?php
// メッセージを保存するファイルのパス設定
define('FILENAME','messages/text.php');
// タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');
// 変数の初期化
$now_date = null;
$data = null;
$file_handle = null;
$split_data = null;
$message = array();
$message_array = array();
$success_message = null;
$error_message = array();
$clean = array();
if(!empty($_POST['btn_submit'])){
	// 表示名の入力チェック
	if(empty($_POST['view_name'])){
		$error_message[] = '表示名を入力してください。';
	}else{
		$clean['view_name'] = htmlspecialchars( $_POST['view_name'], ENT_QUOTES);
		$clean['view_name'] = preg_replace( '/\\r\\n|\\n|\\r/', '', $clean['view_name']);
	}
	// メッセージの入力チェック
	if(empty($_POST['post_message'])){
		$error_message[] ='メッセージを入力してください。';
	}else{
		$clean['post_message'] = htmlspecialchars( $_POST['post_message'], ENT_QUOTES);
		$clean['post_message'] = preg_replace( '/\\r\\n|\\n|\\r/', '<br>', $clean['post_message']);
	}
	if(empty($error_message)){
		if( $file_handle = fopen(FILENAME,"a")){
			// 書き込み日時を取得
			$now_date = date("Y-m-d H:i:s");
			// 書き込むデータを作成
			$data = "'".$clean['view_name']."','".$clean['post_message']."','".$now_date."'\n";
			// 書き込み
			fwrite($file_handle, $data);
			// ファイルを閉じる
			fclose($file_handle);
			$success_message = 'メッセージを書き込みました';
		}
	}
}
if($file_handle = fopen(FILENAME,'r')){
	while($data = fgets($file_handle)){
		$split_data = preg_split( '/\'/', $data);
		$message = array(
			'view_name' => $split_data[1],
			'message' => $split_data[3],
			'post_date' => $split_data[5]);
		array_unshift( $message_array, $message);
	}
	// ファイルを閉じる
	fclose($file_handle);
}
?>
@include('header',['title' => 'message','title_ja' => 'メッセージ'])
  <div class="container">
      @include('aside')
    <main>
			<?php if( !empty($success_message) ): ?>
				<p class="success_message"><?php echo $success_message; ?></p>
			<?php endif; ?>
			<?php if( !empty($error_message) ): ?>
				<ul class="error_message">
					<?php foreach( $error_message as $value ): ?>
						<li>・<?php echo $value; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
      <form method="post">
        <div class="message_form">
          <h2><label for="view_name">表示名</label></h2>
          <input id="view_name" type="text" name="view_name" value="">
          <h2><label for="post_message">メッセージ</label></h2>
          <textarea id="post_message" name="post_message"></textarea>
        </div>
        <div class="message_post">
          <input type="submit" name="btn_submit" value="書き込む">
        </div>
				<hr>
      </form>
			<div class="message_title">
				<p>※メッセージは最新のものが一番上に表示されます。</p>
				<p class="oppnent_name">会話相手：◯◯先生</p>
			</div>
			<?php if( !empty($message_array) ): ?>
			<?php foreach( $message_array as $value ): ?>
			<div class="message_info">
				<div class="post_message_info <?php if($value['view_name'] === '花田'){ echo 'left';}else{ echo 'right';}?>">
					<?php if($value['view_name'] !== '花田'){ echo '<time>'.date('m月d日 H:i', strtotime($value['post_date'])).'</time>'; } ?>
          <div class="speech_bubble <?php if($value['view_name'] === '花田'){ echo 'left';}else{ echo 'right';}?>">
            <p><?php echo $value['message']; ?></p>
          </div>
          <?php if($value['view_name'] === '花田'){ echo '<time>'.date('m月d日 H:i', strtotime($value['post_date'])).'</time>'; } ?>
        </div>
			<?php endforeach; ?>
			<?php endif; ?>
		</main>
		@include('footer')
</div>
</body>
</html>
