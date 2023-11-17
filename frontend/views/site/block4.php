<?php

	use common\models\Brands;
	use yii\helpers\ArrayHelper;

	$brandsAll = Brands::find()
			->where('flag_top')
			->orderBy('id')
			->all();
	$brandsItems = ArrayHelper::map($brandsAll,'id', 'file_image');

	$brand_path = Yii::$app->params['brand_path'];
?>

<p>Мы ремонтируем и оказываем сервисное обслуживание кофемашин всех известных брендов. В наличии в нашем сервисе всегда есть оригинальные запчасти (даже на модели кофемашин, которые больше не выпускаются), чтобы оперативно произвести ремонт. В среднем починка занимает от 2 до 5 дней.</p>

<p>ТОП наших «подопечных»</p>

<div class="trade_marks">
	<div class="trade_marks_items">
		<?php foreach ($brandsItems as $k => $v) { ?>
			<div class="trade_marks_item">
				<img src="<?= $brand_path . $v; ?>" alt="">
			</div>
		<?php } ?>
	</div>
</div>
