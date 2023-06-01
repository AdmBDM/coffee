<?php

/** @var yii\web\View $this */
/** @var $blocks */

$this->title = Yii::$app->params['app_title'];
$prefix = Yii::$app->params['prefix_blocks_id'];
?>

<div class="site-index">

	<div class="carousel">
		<img src="/images/slides/img_2.png" alt="">
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
