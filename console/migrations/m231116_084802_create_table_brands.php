<?php

use yii\db\Migration;

/**
 * Class m231116_084802_create_table_brands
 */
class m231116_084802_create_table_brands extends Migration
{
	/**
	 * @var string
	 */
	private string $table_name;

	public function __construct()
	{
		$this->table_name = 'brands';
	}

	/**
	 * @return false|mixed|void
	 */
    public function safeUp()
    {
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			// http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable($this->table_name, [
			'id' => $this->primaryKey(),
			'brand_name_ru' => $this->string()->notNull()->unique(),
			'brand_name_noru' => $this->string()->notNull()->unique(),
			'file_image' => $this->string(),
			'created_at' => $this->integer()->notNull(),
			'updated_at' => $this->integer()->notNull(),
		], $tableOptions);
    }

	/**
	 * @return false
	 */
    public function safeDown()
    {
		$this->dropTable($this->table_name);
    }
}
