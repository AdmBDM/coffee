<?php

namespace frontend\controllers;

use common\models\Brands;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;
use Yii\web\Response;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends CoffeeMainController
{
	/**
	 * @return array[]
	 */
	public function behaviors(): array
	{
		return [
			'access' => [
				'class' => AccessControl::class,
				'only' => ['logout', 'signup'],
				'rules' => [
					[
						'actions' => ['signup'],
						'allow' => true,
						'roles' => ['?'],
					],
					[
						'actions' => ['logout'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::class,
				'actions' => [
					'logout' => ['post'],
				],
			],
		];
	}

	/**
	 * @return array
	 */
	public function actions(): array
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

	/**
	 * Displays homepage.
	 *
	 * @return mixed
	 */
	public function actionIndex()
	{
		return $this->render('index', [
			'blocks' => Yii::$app->params['blocks'],
			'slides' => Yii::$app->params['slides'],
		]);
	}

	/**
	 * Logs in a user.
	 *
	 * @return mixed
	 */
	public function actionLogin()
	{
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}

		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->goBack();
		}

		$model->password = '';

		return $this->render('login', [
			'model' => $model,
		]);
	}

	/**
	 * Logs out the current user.
	 *
	 * @return mixed
	 */
	public function actionLogout()
	{
		Yii::$app->user->logout();

		return $this->goHome();
	}

	/**
	 * Displays contact page.
	 *
	 * @return mixed
	 */
	public function actionContact($mode = 'c')
	{
		$brandsAll = Brands::find()
				->orderBy('brand_name_noru')
				->all();
		$brandsItems = ArrayHelper::map($brandsAll,'id', 'brand_name_noru');

		$model = new ContactForm();

		if (Yii::$app->request->method === 'POST') {
			if ($model->load(Yii::$app->request->post()) && $model->validate()) {
				if ($model->sendEmail(Yii::$app->params['webEmail'])) {
					Yii::$app->session->setFlash('success', 'Запрос отправлен. Вам ответят в самое ближайшее время.');
					return $this->goHome();
				} else {
					Yii::$app->session->setFlash('error', 'Ошибка отправки сообщения.');
					return $this->refresh();
				}
			}
		}

		return $this->render(($mode ? 'recall' : 'contact'), [
			'model' => $model,
			'mode' => $mode,
			'brands' => $brandsItems,
		]);
	}

	/**
	 * Displays about page.
	 *
	 * @return mixed
	 */
	public function actionAbout()
	{
		return $this->render('about');
	}

	/**
	 * Signs user up.
	 *
	 * @return mixed
	 */
	public function actionSignup()
	{
		$model = new SignupForm();
		if ($model->load(Yii::$app->request->post()) && $model->signup()) {
			Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
			return $this->goHome();
		}

		return $this->render('signup', [
			'model' => $model,
		]);
	}

	/**
	 * Requests password reset.
	 *
	 * @return mixed
	 */
	public function actionRequestPasswordReset()
	{
		$model = new PasswordResetRequestForm();
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			if ($model->sendEmail()) {
				Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

				return $this->goHome();
			}

			Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
		}

		return $this->render('requestPasswordResetToken', [
			'model' => $model,
		]);
	}

	/**
	 * Resets password.
	 *
	 * @param string $token
	 *
	 * @return mixed
	 * @throws BadRequestHttpException
	 */
	public function actionResetPassword(string $token)
	{
		try {
			$model = new ResetPasswordForm($token);
		} catch (InvalidArgumentException $e) {
			throw new BadRequestHttpException($e->getMessage());
		}

		if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
			Yii::$app->session->setFlash('success', 'New password saved.');

			return $this->goHome();
		}

		return $this->render('resetPassword', [
			'model' => $model,
		]);
	}

	/**
	 * Verify email address
	 *
	 * @param string $token
	 *
	 * @return Response
	 *@throws BadRequestHttpException
	 */
	public function actionVerifyEmail(string $token): Response
	{
		try {
			$model = new VerifyEmailForm($token);
		} catch (InvalidArgumentException $e) {
			throw new BadRequestHttpException($e->getMessage());
		}
		if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
			Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
			return $this->goHome();
		}

		Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
		return $this->goHome();
	}

	/**
	 * Resend verification email
	 *
	 * @return mixed
	 */
	public function actionResendVerificationEmail()
	{
		$model = new ResendVerificationEmailForm();
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			if ($model->sendEmail()) {
				Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
				return $this->goHome();
			}
			Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
		}

		return $this->render('resendVerificationEmail', [
			'model' => $model
		]);
	}

}
