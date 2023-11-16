<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $body;
    public $verifyCode;
    public $brand_id;


	/**
	 * @return array
	 */
    public function rules(): array
	{
        return [
            // name, email, subject and body are required
            [['name', 'email', 'phone', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
//            ['verifyCode', 'captcha'],
        ];
    }

	/**
	 * @return string[]
	 */
    public function attributeLabels(): array
	{
        return [
            'name' => 'Ф.И.О.',
            'email' => 'E-mail',
            'phone' => 'Номер, куда перезвонить',
            'subject' => 'Тема',
            'body' => 'Сообщение',
            'verifyCode' => 'Verification Code',
            'captcha' => 'Капча',
            'brand_id' => 'Фирма-производитель',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     *
     * @return bool whether the email was sent
     */
    public function sendEmail(string $email): bool
	{
		$this->body = 'Меня зовут ' . $this->name . chr(10) . chr(13);
		$this->body .= 'Прошу перезвонить по указанному номеру - ' . $this->phone;

        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setReplyTo([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }
}
