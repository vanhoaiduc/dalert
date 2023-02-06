<?php

use app\common\db\Migration;


/**
 * Handles the creation of table `{{%setting}}`.
 */
class m230206_082554_create_setting_table extends Migration{

	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$this->createTable('{{%setting}}', [
			"key"   => $this->string()->notNull(),
			'value' => $this->string()->notNull(),
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		$this->dropTable('{{%setting}}');
	}
}
