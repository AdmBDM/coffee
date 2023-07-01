<?php
	$web_mail = Yii::$app->params['webEmail'];
	$web_phone = Yii::$app->params['webPhone'];
	$geo_link = Yii::$app->params['geoLink'];
	$post_address = Yii::$app->params['postAddress'];
?>

<div class="for-link">
	<div class="for-link-caption">
<!--		<h2>Coffee-Tech сервисный центр.</h2>-->
		<h2>Ремонт кофемашин и кофеварок в Сочи.</h2>
	</div>

	<div class="for-link-items">
		<div class="for-link-item">
			<div class="form-row">
				<div class="label"><i class="fa fa-phone-square" aria-hidden="true"></i></div>
				<a href="tel:<?= $web_phone; ?>"><?= $web_phone; ?></a>
			</div>
			<div class="form-row">
				<div class="label"><i class="fa fa-envelope" aria-hidden="true"></i></div>
				<a href="mailto:<?= $web_mail; ?>"><?= $web_mail; ?></a>
			</div>
			<div class="form-row">
				<div class="label"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
				<a target="_blank" href="<?= $geo_link; ?>"><?= $post_address; ?></a>
			</div>

		</div>
		<div class="for-link-item">
			<ul>Работаем во всех районах:
				<li>Красная поляна</li>
				<li>Адлер</li>
				<li>Сочи</li>
				<li>Мамайка</li>
				<li>Дагомыс</li>
			</ul>
		</div>
<!--		<div class="for-link-item">-->
<!--			Мы в соцсетях:-->
<!--			<div class="form-row">-->
<!--				<div class="label"><i class="fa fa-vk" aria-hidden="true"></i></div>-->
<!--				<a target="_blank" href=""></a>-->
<!--			</div>-->
<!--		</div>-->
	</div>
</div>

<label class="block">Как нас найти:</label>

<div class="location">
	<div class="location-img">
		<img src="/images/location.jpg" alt="location">
	</div>

	<div class="map-yandex" style="position:relative;overflow:hidden;">
		<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A74b028f13b784da6fcd4c036c1384a6ed0b55e4769e053027578a93adf7b2531&amp;source=constructor"
				width="100%" height="400" frameborder="0"></iframe>
	</div>
</div>

