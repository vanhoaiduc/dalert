<?php

namespace app\common\db;

/**
 *
 */
class Migration extends \yii\db\Migration{

	/**
	 * @inheritDoc
	 */
	public function createTable($table, $columns, $options = NULL){
		$columns = array_merge(
			['id' => $this->primaryKey()],
			$columns,
			[
				'created_at' => $this->integer(),
				'updated_at' => $this->integer(),
				'created_by' => $this->integer(),
				'updated_by' => $this->integer(),
			]);
		parent::createTable($table, $columns, $options);
	}
}