<?php
	$web_mail = Yii::$app->params['webEmail'];
	$web_phone = Yii::$app->params['webPhone'];
?>

<div class="col-lg-5 contact">
	<form id="contact-view">
		<div class="form-row">
			<div class="label">☏</div><a href="tel:<?= $web_phone; ?>"><?= $web_phone; ?></a>
		</div>

		<div class="form-row">
			<div class="label">✉</div><a href="mailto:<?= $web_mail; ?>"><?= $web_mail; ?></a>
		</div>
	</form>
</div>
