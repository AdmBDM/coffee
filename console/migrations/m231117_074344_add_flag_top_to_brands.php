<?php

use yii\db\Migration;

/**
 * Class m231117_074344_add_flag_top_to_brands
 */
class m231117_074344_add_flag_top_to_brands extends Migration
{
	/**
	 * @return false|mixed|void
	 */
    public function safeUp()
    {
		$this->addColumn('brands', 'flag_top', $this->boolean()->defaultValue(true));
    }

	/**
	 * @return false|mixed|void
	 */
    public function safeDown()
    {
		$this->dropColumn('brands', 'flag_top');
    }
}
