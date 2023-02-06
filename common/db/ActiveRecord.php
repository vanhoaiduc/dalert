<?php

namespace app\common\db;

/**
 *
 */
class ActiveRecord extends \yii\db\ActiveRecord{

	/**
	 * @inheritDoc
	*/
	public function rules(){
		return [
			[['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
			[['created_at', 'updated_at'], 'default', 'value' => time()],
		];
	}
}