<?php
	//入力情報
	$post_yourname					= $_POST["yourname"]					? $_POST["yourname"]					: "";
	$post_tel_number				= $_POST["tel_number"]					? $_POST["tel_number"]					: "";
	$post_email						= $_POST["email"]						? $_POST["email"]						: "";
	$post_sentakushi				= $_POST["sentakushi"]					? $_POST["sentakushi"]					: "";
	$post_checkbox					= $_POST["checkbox"]					? $_POST["checkbox"]					: "";
	$post_contents					= $_POST["contents"]					? $_POST["contents"]					: "";
?>

<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="format-detection" content="telephone=no">
<title>確認ページ</title>
</head>

<body>
	<div id="wrap">
		<header></header>
		<main id="l-wrapper">
			<section id="contact">
				<div class="contact__inner">
					<div class="contact__contents">
						<div id="contact" class="contact__wrap">
							<form id="form" enctype="multipart/form-data" method="post" name="contact_form" action="thanks.php">
								<div class="form__list__container confirmation">
									<div class="form__wrap">
										<dl class="form__list">
											<div class="form__item">
												<dt class="form__item_heading"><label>お名前</label></dt>
												<dd class="form__item_inputbox">
													<p class="confirmation__txt"><?php echo $post_yourname; ?></p>
												</dd>
											</div>
											<div class="form__item">
												<dt class="form__item_heading"><label>電話番号</label></dt>
												<dd class="form__item_inputbox">
													<p class="confirmation__txt"><?php echo $post_tel_number; ?></p>
												</dd>
											</div>
											<div class="form__item">
												<dt class="form__item_heading"><label>メールアドレス</label></dt>
												<dd class="form__item_inputbox">
													<p class="confirmation__txt"><?php echo $post_email; ?></p>
												</dd>
											</div>
											<div class="form__item">
												<dt class="form__item_heading"><label>選択肢出力</label></dt>
												<dd class="form__item_inputbox">
													<p class="confirmation__txt"><?php echo $post_sentakushi; ?></p>
												</dd>
											</div>
											<div class="form__item">
												<dt class="form__item_heading"><label>選択肢出力</label></dt>
												<dd class="form__item_inputbox">
													<p class="confirmation__txt"><?php
														if (empty($post_checkbox)) {
															echo '無回答';
														} else {
															echo implode("/", $post_checkbox);
														}
													?></p>
												</dd>
											</div>

											<div class="form__item">
												<dt class="form__item_heading"><label>お問い合わせ内容</label></dt>
												<dd class="form__item_inputbox">
													<p class="confirmation__txt"><?php echo nl2br($post_contents); ?></p>
												</dd>
											</div>
										</dl>
									</div>
									<div class="submit__container">
										<input type="button" value="内容を修正する" onclick="history.back(-1)">
										<button name="submitted" type="submit">送信する</button>
									</div>
								</div>

							<!-- 値 -->
								<!-- //ご注文者さまの情報 -->
								<input type="hidden" name="scroll_top" value="" class="st">
								<input type="hidden" name="yourname" value="<?php echo $post_yourname; ?>">
								<input type="hidden" name="tel_number" value="<?php echo $post_tel_number; ?>">
								<input type="hidden" name="email" value="<?php echo $post_email; ?>">
								<input type="hidden" name="sentakushi" value="<?php echo $post_sentakushi; ?>">
								<?php
								foreach ($post_checkbox as $value) {
									echo '<input type="hidden" name="checkbox[]" value="' . $value . '">';
								}
								unset($value);
								?>
								<input type="hidden" name="contents" value="<?php echo $post_contents; ?>">

							<!-- //値 -->
							</form>
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