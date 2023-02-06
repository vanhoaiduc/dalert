<?php

namespace app\models;

use app\common\db\ActiveRecord;

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
class Setting extends ActiveRecord{

	/**
	 * {@inheritdoc}
	 */
	public static function tableName(){
		return 'setting';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules(){
		return array_merge(parent::rules(), [
			[['key', 'value'], 'required'],
			[['key', 'value'], 'string', 'max' => 255],
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels(){
		return [
			'id'         => 'ID',
			'key'        => 'Key',
			'value'      => 'Value',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'created_by' => 'Created By',
			'updated_by' => 'Updated By',
		];
	}
}
