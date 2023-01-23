<?php
	// サニタイズ
	if( !empty($_POST) ) {
		foreach( $_POST as $key => $value ) {
			$clean[$key] = htmlspecialchars( $value, ENT_QUOTES);
		}
	}
?>

<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="format-detection" content="telephone=no">
<title>コンタクト</title>
</head>

<body>
	<div id="wrap">
		<header></header>
		<main id="l-wrapper">
			<section id="contact">
				<div class="contact__inner">
					<div class="contact__contents">
						<div id="contact" class="contact__wrap">
							<form id="form" enctype="multipart/form-data" method="post" name="contact_form" action="./php/confirmation.php">
								<div class="form__list-container">
									<div class="form__wrap">
										<dl class="form__list">
											<div class="form__item form__large__item__wrap">
												<dt class="form__item_heading"><label>お名前</label><span class="mandatory">必須</span></dt>
												<dd class="form__item_inputbox">
													<input type="text" name="yourname" placeholder="田中　太郎" value="<?php if( isset($post_yourname) ){ echo $post_yourname; } ?>" required>
												</dd>
											</div>
											<div class="form__item form__large__item__wrap">
												<dt class="form__item_heading"><label>電話番号</label><span class="mandatory">必須</span></dt>
												<dd class="form__item_inputbox">
													<input type="text" name="tel_number" placeholder="0000-000-000" value="<?php if( isset($post_tel_number) ){ echo $post_tel_number; } ?>" required>
												</dd>
											</div>
											<div class="form__item form__large__item__wrap">
												<dt class="form__item_heading"><label>メールアドレス</label><span class="mandatory">必須</span></dt>
												<dd class="form__item_inputbox">
													<input type="text" name="email" placeholder="test@tanaka.com" value="<?php if( isset($post_email) ){ echo $post_email; } ?>" required>
												</dd>
											</div>
											<div class="form__item form__large__item__wrap">
												<dt class="form__item_heading"><label>選択肢出力</label><span class="mandatory">必須</span></dt>
												<dd class="form__item_inputbox">
													<div class="form__item_inputbox__select_wrap">
														<select name="sentakushi">
															<option value=''>選択肢を選択</option>
															<?php
															$sentakushis = array ('選択肢１','選択肢２','選択肢３');
															foreach ($sentakushis as $val) {
																$selected = (isset($post_sentakushi) && $post_sentakushi === $val) ? "selected" : "";
																echo "<option value='{$val}' {$selected}>{$val}</option>";
															}
															?>
														</select>
													</div>
												</dd>
											</div>
											<div class="form__item form__large__item__wrap">
												<dt class="form__item_heading"><label>チェックボックス出力</label><span class="mandatory">必須</span></dt>
												<dd class="form__item_inputbox">
													<div class="form__item_inputbox__checkbox_wrap">
														<?php
														$array_checkbox = [
															['check1', 'チェックボックス1'],
															['check2', 'チェックボックス2'],
															['check3', 'チェックボックス3'],
														];
														foreach ($array_checkbox as $val) {
															$checked = (in_array($val[1], $post_checkbox)) ? "checked" : "";
															echo "<input id='{$val[0]}' type='checkbox' name='checkbox[]' value='{$val[1]}' {$checked}>";
															echo "<label class='checkbox' for='{$val[0]}'>{$val[1]}</label>";
														}
														?>
													</div>
												</dd>
											</div>
											<div class="form__item form__large__item__wrap">
												<dt class="form__item_heading"><label>お問い合わせ内容</label></dt>
												<dd class="form__item_inputbox">
													<textarea type="text" name="contents" rows="8" value="" required><?php if( isset($post_contents) ){ echo $post_contents; } ?></textarea>
												</dd>
											</div>
										</dl>
									</div>
									<div class="submit__container">
										<button name="btn_confirm" type="submit" id="submit" value="submit" class="confirm-btn" readonly="readonly">入力内容を確認する</button>
									</div>
								</div>
								<input type="hidden" name="scroll_top" value="" class="st">
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