<?php

/** @var yii\web\View $this */
/** @var ActiveForm $form */
/** @var ContactForm $model */

use frontend\models\ContactForm;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Запрос обратного звонка';
	$model->email = Yii::$app->params['webEmail'];
	$model->subject = 'Запрос обратного звонка';
	$model->body = 'Прошу перезвонить по указанному номеру.';
?>

<div class="site-contact">
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin([
				'id' => 'contact-form',
			]); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email')->hiddenInput()->label(false) ?>

                <?= $form->field($model, 'phone') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6])->hiddenInput() ?>

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
