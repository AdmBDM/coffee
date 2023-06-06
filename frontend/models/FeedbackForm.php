<?php

	namespace frontend\models;

	use yii\base\Model;

	class FeedbackForm extends Model
	{
		public $text;

		/**
		 * @return array[]
		 */
		public function rules(): array
		{
			return [
				[['text'], 'string'],
			];
		}
	}