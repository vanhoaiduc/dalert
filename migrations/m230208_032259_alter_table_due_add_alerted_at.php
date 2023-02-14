<?php

use app\models\Due;
use yii\db\Migration;

/**
 * Class m230208_032259_alter_table_due_add_alerted_at
 */
class m230208_032259_alter_table_due_add_alerted_at extends Migration{

	/**
	 * {@inheritdoc}
	 */
	public function safeUp(){
		$this->addColumn(Due::tableName(), 'alerted', $this->tinyInteger());
		$this->addColumn(Due::tableName(), 'alerted_at', $this->integer());
		$this->addColumn(Due::tableName(), 'alerted_emails', $this->text());

		return TRUE;
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown(){
		$this->dropColumn(Due::tableName(), 'alerted');
		$this->dropColumn(Due::tableName(), 'alerted_at');
		$this->dropColumn(Due::tableName(), 'alerted_emails');

		return TRUE;
	}

	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m230208_032259_alter_table_due_add_alertedat cannot be reverted.\n";

		return false;
	}
	*/
}
