<?php

namespace app\models;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "setting".
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class EmailSetting extends Setting{

	/**
	 * @return array|\yii\db\ActiveRecord[]
	 */
	public static function getList()
	: array{
		$query = self::find()->andWhere(['LIKE', 'key', 'email_list%', FALSE]);
		$list  = $query->select(['id', 'value'])->asArray()->all();
		array_unshift($list, ['id' => NULL, 'value' => 'Empty']);

		return ArrayHelper::map($list, 'id', 'value');
	}

}
