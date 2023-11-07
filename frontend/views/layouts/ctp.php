<?php

/** @var View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\web\View;

//	if (!empty(Yii::$app->params['keywords'])) {
//	$keywords = !empty(Yii::$app->params['keywords']) ? Yii::$app->params['keywords'] : '';
//	}
	$keywords ='coffee-tech, coffee ремонт кофемашин,адрес ремонта кофемашины,вызвать мастера +по ремонту кофемашин,мастер +по ремонту кофемашин,неисправности кофемашины делонги +и ремонт +своими силами,неисправности кофемашины делонги +и ремонт,неисправности кофемашины ремонт +своими силами,ремонт +и неисправности кофемашин,ремонт +и обслуживание кофемашин,ремонт капсульных кофемашин неспрессо,ремонт капсульных кофемашин,ремонт кофемашин +на выезде,ремонт кофемашин +на дому,ремонт кофемашин +своими руками,ремонт кофемашин +сочи,ремонт кофемашин bosch,ремонт кофемашин jura,ремонт кофемашин nespresso,ремонт кофемашин saeco,ремонт кофемашин делонги,ремонт кофемашин крупс,ремонт кофемашин неспрессо,ремонт кофемашин области,ремонт кофемашин отзывы,ремонт кофемашин поларис,ремонт кофемашин филипс,ремонт кофемашин цены,ремонт кофемашин,ремонт кофемашины +своими силами,ремонт кофемашины delonghi,ремонт кофемашины krups,ремонт кофемашины philips,ремонт кофемашины бош,ремонт кофемашины видео,ремонт кофемашины дольче густо,ремонт кофемашины саеко,ремонт кофемашины сервисный,сервисный центр +по ремонту кофемашин,телефон ремонта кофемашины,центр ремонта кофемашин';
	AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="<?= $keywords ?>">
	<meta name="description" content="<?= $keywords ?>">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
	<script src="https://use.fontawesome.com/fadba6afe8.js"></script>
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript" >
		(function(m,e,t,r,i,k,a){m[i]=m[i]function(){(m[i].a=m[i].a[]).push(arguments)};
			m[i].l=1*new Date();
			for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
			k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
		(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

		ym(95482161, "init", {
			clickmap:true,
			trackLinks:true,
			accurateTrackBounce:true,
			webvisor:true
		});
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/95482161" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $menuItems = [];
	foreach (Yii::$app->params['blocks'] as $k => $v) {
		if ($v['on'] & $v['nav_menu']) {
			$menuItems = array_merge($menuItems,
				[['label' => $v['title_short'], 'url' => ['#' . Yii::$app->params['prefix_blocks_id'] . $k]]]);
		}
	}
	$menuItems = array_merge($menuItems,
			[['label' => 'Контакты', 'url' => ['/site/contact']]]);

    if (Yii::$app->user->isGuest) {
//        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
	<div class="container">
        <?= Breadcrumbs::widget([
            'links' => $this->params['breadcrumbs'] ?? [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
<script>
	$('body').append('<div class="btn-up"></div>');
	$(window).scroll(function() {
		if ($(this).scrollTop() > 100) {
			$('.btn-up').css({
				transform: 'scale(1)'
			});
		} else {
			$('.btn-up').css({
				transform: 'scale(0)'
			});
		}
	});
	$('.btn-up').on('click',function() {
		$('html, body').animate({
			scrollTop: 0
		}, 500);
		return false;
	});
</script>
</body>
</html>
<?php $this->endPage();
