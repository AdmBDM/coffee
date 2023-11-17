<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "brands".
 *
 * @property int $id
 * @property string $brand_name_ru
 * @property string $brand_name_noru
 * @property string|null $file_image
 * @property int $created_at
 * @property int $updated_at
 */
class Brands extends ActiveRecord
{
	/**
	 * @return string
	 */
    public static function tableName(): string
	{
        return 'brands';
    }

	/**
	 * @return array
	 */
    public function rules(): array
	{
        return [
            [['brand_name_ru', 'brand_name_noru', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'default', 'value' => null],
            [['created_at', 'updated_at'], 'integer'],
            [['brand_name_ru', 'brand_name_noru', 'file_image'], 'string', 'max' => 255],
            [['brand_name_noru'], 'unique'],
            [['brand_name_ru'], 'unique'],
        ];
    }

	/**
	 * @return string[]
	 */
    public function attributeLabels(): array
	{
        return [
            'id' => 'ID',
            'brand_name_ru' => 'Brand Name Ru',
            'brand_name_noru' => 'Brand Name Noru',
            'file_image' => 'File Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

	/**
	 * @return BrandsQuery
	 */
    public static function find(): BrandsQuery
	{
        return new BrandsQuery(get_called_class());
    }
}
