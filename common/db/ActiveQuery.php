<?php

namespace app\common\db;

use app\common\App;

/**
 * Custom ActiveQuery
 */
class ActiveQuery extends \yii\db\ActiveQuery{

	/**
	 * @inheritDoc
	 */
	public function each($batchSize = 100, $db = NULL){
		if ($db === NULL){
			$db = App::getDb();
		}

		return parent::each($batchSize, $db);
	}
}