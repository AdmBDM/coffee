<?php

	$brands = [
		'img_0.png',
		'img_1.png',
		'img_2.png',
		'img_3.png',
		'img_4.png',
		'img_5.png',
		'img_6.png',
		'img_7.png',
		'img_8.png',
		'img_9.png',
	];
	$brand_path = Yii::$app->params['brand_path'];
?>

<p>Мы ремонтируем и оказываем сервисное обслуживание кофемашин всех известных брендов. В наличии в нашем сервисе всегда есть оригинальные запчасти (даже на модели кофемашин, которые больше не выпускаются), чтобы оперативно произвести ремонт. В среднем починка занимает от 2 до 5 дней.</p>

<p>ТОП наших «подопечных»</p>

<div class="trade_marks">
	<div class="trade_marks_items">
		<?php foreach ($brands as $brand) { ?>
			<div class="trade_marks_item">
				<img src="<?= $brand_path . $brand; ?>" alt="">
			</div>
		<?php } ?>
	</div>
</div>
