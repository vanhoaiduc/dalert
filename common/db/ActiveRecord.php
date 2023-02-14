<?php

namespace app\common\db;

use Yii;

/**
 * Custom ActiveRecord
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

	/**
	 * Override ActiveQuery class
	 * {@inheritdoc}
	 *
	 * @return ActiveQuery the newly created [[ActiveQuery]] instance.
	 * @throws \yii\base\InvalidConfigException
	 */
	public static function find(){
		return Yii::createObject(ActiveQuery::class, [static::class]);
	}
}