<?php

use app\common\db\Migration;
use app\models\Due;

/**
 * Class m230207_083738_add_due
 */
class m230207_083738_add_due extends Migration{

	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$this->createTable(Due::tableName(), [
			'name'             => $this->string()->notNull(),
			'type'             => $this->tinyInteger()->notNull(),
			'expired_at'       => $this->integer()->notNull(),
			'setting_email_id' => $this->integer(),
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		$this->dropTable(Due::tableName());

		return TRUE;
	}
}
