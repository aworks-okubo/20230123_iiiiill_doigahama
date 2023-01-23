<?php
	//入力情報
	$post_yourname					= $_POST["yourname"]					? $_POST["yourname"]					: "";
	$post_tel_number				= $_POST["tel_number"]					? $_POST["tel_number"]					: "";
	$post_email						= $_POST["email"]						? $_POST["email"]						: "";
	$post_sentakushi				= $_POST["sentakushi"]					? $_POST["sentakushi"]					: "";
	$post_checkbox					= $_POST["checkbox"]					? $_POST["checkbox"]					: "";
	$post_contents					= $_POST["contents"]					? $_POST["contents"]					: "";

	// チェックボックスの配列を文字列に変換
	$post_checkbox = implode("/", $post_checkbox);

//送信ボタンが押された場合の処理
if (isset($_POST['submitted'])) {

	// 変数とタイムゾーンを初期化
	$header = null;
	$auto_reply_subject = null;
	$auto_reply_body = null;
	$admin_reply_subject = null;
	$admin_reply_body = null;
	date_default_timezone_set('Asia/Tokyo');

	//日本語の使用宣言
	mb_language("ja");
	mb_internal_encoding("UTF-8");

	// ヘッダー情報を設定
	$from_encoded = mb_convert_encoding('TESTTEST', 'ISO-2022-JP', 'AUTO');	// ヘッダーに渡す前にエンコード
	$from_mail = "XXXX@XXXXX.XXXX";											// 送信元メールアドレス（運営のメールアドレス）
	$from_time = date("Y-m-d H:i");

	$header .= "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\n";
	$header .= "Return-Path: " . $from_mail . " \n";
	$header .= "From: " . mb_encode_mimeheader($from_encoded) . "<" . $from_mail . ">\n";
	$header .= "Reply-To: ".$from_mail."\n";

	// 件名を設定
	$auto_reply_subject = '【test】お問い合わせありがとうございます';

// body情報を設定
$auto_reply_body .= "--__BOUNDARY__\n";
$auto_reply_body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n\n";
$auto_reply_body .= <<<EOT

※このメールはシステムからの自動返信です

お問い合わせいただきありがとうございます。
テストテストテストテストテストテストテストテスト
テストテストテストテストテストテストテストテストテスト
テストテストテストテストテストテストテストテストテスト

━━━━━━□■□　お問い合わせ内容　□■□━━━━━━
お名前：{$post_yourname}
電話番号：{$post_tel_number}
メールアドレス：{$post_email}
選択肢：{$post_sentakushi}
チェックボックス：{$post_checkbox}
備考：
{$post_contents}

お問い合わせ受付日時：{$from_time}
━━━━━━━━━━━━━━━━━━━━━━━━━━━━

----------------------------------

テストテスト
TEL：XXX-XXX-XXXX
URL:https://xxx.xx

EOT;
$auto_reply_body .= "--__BOUNDARY__\n";

		// メール送信
		mb_send_mail( $post_email, $auto_reply_subject, $auto_reply_body, $header);

		// 運営側へ送るメールの件名
		$admin_reply_subject = "【お問い合わせ】ホームページから申し込みを受け付けました";

// body情報を設定
$admin_reply_body .= "--__BOUNDARY__\n";
$admin_reply_body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n\n";
$admin_reply_body .= <<<EOT

ホームページからお問い合わせを受け付けました。
テストテストテストテストテストテストテストテストテスト
テストテストテストテストテストテストテストテストテストテスト
テストテストテストテストテストテストテストテストテストテスト

━━━━━━□■□　お問い合わせ内容　□■□━━━━━━
お名前：{$post_yourname}
電話願望：{$post_tel_number}
メールアドレス：{$post_email}
選択肢出力：{$post_sentakushi}
チェックボックス：{$post_checkbox}
備考：
{$post_contents}

お問い合わせ受付日時：{$from_time}
━━━━━━━━━━━━━━━━━━━━━━━━━━━━
----------------------------------

テストテスト
URL:https://xxx.xx

EOT;
$admin_reply_body .= "--__BOUNDARY__\n";

	// 運営側へメール送信
	mb_send_mail( $from_mail, $admin_reply_subject, $admin_reply_body, $header);

	//メール送信の結果判定
		$_POST = array(); //空の配列を代入し、すべてのPOST変数を消去
		//変数の値も初期化
		$post_yourname = '';
		$post_tel_number = '';
		$post_email = '';
		$post_sentakushi = '';
		$post_checkbox = '';
		$post_contents = '';
		$from_time = '';
		$header = '';
		$auto_reply_subject = '';
		$auto_reply_body = '';
		$admin_reply_subject = '';
		$admin_reply_body = '';
		$from_encoded = '';
		$from_mail = '';
		$from_time = '';

		//再読み込みによる二重送信の防止
		$params = '?result='. $result;
		//サーバー変数 $_SERVER['HTTPS'] が取得出来ない環境用
		if(isset($_SERVER['HTTP_X_FORWARDED_PROTO']) and $_SERVER['HTTP_X_FORWARDED_PROTO'] === "https") {
			$_SERVER['HTTPS'] = 'on';
		}
		$url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://').$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']; 
		header('Location:' . $url . $params);
		exit;
}
?>

<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="format-detection" content="telephone=no">
<title>サンクスページ</title>
</head>

<body>
	<div id="wrap">
		<header></header>
		<main id="l-wrapper">
			<section id="contact">
				<div class="contact__inner">
					<div class="contact__contents">
						<div id="contact" class="contact__wrap">
							<div class="done_body">
								<p>お問い合わせを受け付けました。<br>
								担当者が内容を確認させていただきます。<br>
								また、ご入力いただきましたメールアドレスへ、内容確認の自動返信メールを送信しております。</p>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
		<footer></footer>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>