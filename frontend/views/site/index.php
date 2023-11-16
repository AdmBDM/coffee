<?php

/** @var yii\web\View $this */
/** @var $blocks */
/** @var $slides */

	use yii\bootstrap4\Html;

	$this->title = Yii::$app->params['app_title'];
$prefix = Yii::$app->params['prefix_blocks_id'];

if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
	session_start();
}
?>

<div class="site-index">

	<div class="main_head" id="head-itc-slider">
		<div class="text_head-itc-slider">Профессиональный ремонт<br>и<br>обслуживание кофемашин<br>г. СОЧИ</div>

		<div class="block-head_slang-top">
			<div class="slang-row1">Бесплатная диагностика</div>
			<div class="slang-row1">Ремонт и восстановление</div>
			<div class="slang-row2">На дому, в офисе, с выездом мастера</div>
			<div class="slang-row3">Низкие цены</div>
		</div>

		<div class="block-head_slang-bottom">
			<div class="slang-row4">Детейлинг корпуса в подарок!!!</div>
		</div>

		<div class="block-head_btn">
			<button><?= Html::a('вызов мастера', ['site/contact?mode=m']) ?></button>
			<button><?= Html::a('обратный звонок', ['site/contact?mode=c']) ?></button>
			<button><?= Html::a('оставить заявку прямо сейчас', ['site/contact?mode=r']) ?></button>
		</div>

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
				<?php if ($v['on']) { ?>
					<?php $name = $prefix . $k; ?>
					<?php if ($v['label']) { ?>
						<label class="block" id="<?= $name ?>"><?= $v['title_full'] ?></label>
					<?php } ?>
					<?php require $name . '.php'; ?>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
</div>
