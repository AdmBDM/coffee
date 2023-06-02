<?php

/** @var yii\web\View $this */
/** @var $blocks */
/** @var $slides */

$this->title = Yii::$app->params['app_title'];
$prefix = Yii::$app->params['prefix_blocks_id'];
?>

<div class="site-index">

	<div class="main_head" id="head-itc-slider">
		<div class="text_head-itc-slider">Профессиональный ремонт<br>и<br>обслуживание кофемашин</div>

		<div class="itc-slider" data-slider="itc-slider">
			<div class="itc-slider-wrapper">
				<div class="itc-slider-items">
					<?php foreach ($slides as $slide) { ?>
						<div class="itc-slider-item">
							<img src="<?= $slide ?>">" alt="">
						</div>
					<?php } ?>
				</div>
			</div>
		<!-- Кнопки для перехода к предыдущему и следующему слайду -->
<!--			<button class="itc-slider-btn itc-slider-btn-prev"></button>-->
<!--			<button class="itc-slider-btn itc-slider-btn-next"></button>-->
		</div>
	</div>

	<?php foreach ($blocks as $k => $v) { ?>
		<div class="row">
			<div class="body-content">
				<?php $name = $prefix . $k; ?>
				<h2 class="npp-block" id="<?= $name ?>"><span><?= $k ?></span><?= $v ?></h2>
				<?php require $name . '.php'; ?>
			</div>
		</div>
	<?php } ?>
</div>
