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
	];
	$brand_path = Yii::$app->params['brand_path'];
?>

<div class="trade_marks">
	<div class="trade_marks_items">
		<?php foreach ($brands as $brand) { ?>
			<div class="trade_marks_item">
				<img src="<?= $brand_path . $brand; ?>" alt="">
			</div>
		<?php } ?>
	</div>
</div>
