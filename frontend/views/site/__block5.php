<?php

	/** @var yii\web\View $this */
	/** @var ActiveForm $form */
	/** @var ContactForm $model */

	use frontend\models\ContactForm;
	use yii\bootstrap4\Html;
	use yii\bootstrap4\ActiveForm;

	$this->title = 'Contact';

?>


<?php
//	$form = ActiveForm::begin([
//		'id' => 'feedback-form',
//		'action' => 'contact',
//		'options' => [
//			'onSubmit' => 'return checkForm(this)',
//		],
//]); ?>
<!---->
<!--<div class="left">-->
<!--	--><?php //= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
<!---->
<!--	--><?php //= $form->field($model, 'email')->input('email') ?>
<!---->
<!--	--><?php //= $form->field($model, 'phone') ?>
<!--</div>-->
<!---->
<!--<div class="right">-->
<!--	--><?php //= $form->field($model, 'subject') ?>
<!---->
<!--	--><?php //= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
<!---->
<!--	<div class="form-group">-->
<!--		--><?php //= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
<!--	</div>-->
<!--</div>-->
<!---->
<?php //ActiveForm::end(); ?>

<!--<form method="post" action="" onsubmit="return checkForm(this)">-->
<form method="post">
	<div class="left">
		<label for="name">Имя:</label>
		<input maxlength="30" type="text" name="name" />
		<label for="phone">Телефон:</label>
		<input maxlength="30" type="text" name="phone" />
		<label for="email">E-mail:</label>
		<input maxlength="30" type="text" name="email" />
	</div>
	<div class="right">
		<label for="message">Сообщение:</label>
		<textarea rows="7" cols="50" name="message"></textarea>
		<input type="submit" value="Отправить" />
	</div>
</form>


<script>
	function checkForm(form) {
		let regName = /^[A-Za-zА-Яа-я ]*[A-Za-zА-Яа-я ]+$/;
		let regPhone = /^[0-9+][0-9- ]*[0-9- ]+$/;
		let regEmail = /^[A-Za-z0-9][A-Za-z0-9\._-]*[A-Za-z0-9_]*@([A-Za-z0-9]+([A-Za-z0-9-]*[A-Za-z0-9]+)*\.)+[A-Za-z]+$/;

		let name = form.name.value;
		let n = name.match(regName);
		if (!n) {
			alert("Имя введено неверно, пожалуйста исправьте ошибку");
			return false;
		}

		let phone = form.phone.value;
		let p = phone.match(regPhone);
		if (!p) {
			alert("Телефон введен неверно");
			return false;
		}

		let mail = form.email.value;
		let m = mail.match(regEmail);
		if (!m) {
			alert("E-mail введен неверно, пожалуйста исправьте ошибку");
			return false;
		}
		return true;
	}
</script>
