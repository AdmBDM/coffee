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

<label class="block">Как нас найти:</label>

<div class="map-yandex" style="position:relative;overflow:hidden;">
	<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A74b028f13b784da6fcd4c036c1384a6ed0b55e4769e053027578a93adf7b2531&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
</div>

