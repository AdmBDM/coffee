<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the ActiveQuery class for [[Brands]].
 *
 * @see Brands
 */
class BrandsQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

	/**
	 * @param $db
	 *
	 * @return array|ActiveRecord[]
	 */
    public function all($db = null) { return parent::all($db); }

	/**
	 * @param $db
	 *
	 * @return array|ActiveRecord|null
	 */
    public function one($db = null) { return parent::one($db); }
}
