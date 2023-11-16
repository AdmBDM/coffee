<?php

use frontend\models\ContactForm;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

/** @var $this	yii\web\View */
/** @var $form	ActiveForm */
/** @var $model	ContactForm */
/** @var $mode */
/** @var $brands */

	$model->body = 'Прошу перезвонить по указанному номеру.';
	$model->email = Yii::$app->params['webEmail'];

	switch ($mode) {
		case 'm':
			$class = 'master';
			$this->title = 'Вызов мастера';
			$model->subject = 'Вызов мастера';
			break;

		case 'r':
			$class = 'request';
			$this->title = 'Оставить заявку прямо сейчас';
			$model->subject = 'Оставить заявку прямо сейчас';
			break;

		default:
			$class = 'contact';
			$this->title = 'Запрос обратного звонка';
			$model->subject = 'Запрос обратного звонка';
	}
?>

<div class="site-<?= $class; ?>">
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin([
				'id' => $class . '-form',
			]); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email')->hiddenInput()->label(false) ?>

                <?= $form->field($model, 'phone') ?>

                <?= $form->field($model, 'brand_id')->dropDownList($brands, ['prompt' => 'Выберите производителя...']) ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6])->hiddenInput()->label(false) ?>

<!--				--><?php //= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
//						'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
//				]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Отправить заявку', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
