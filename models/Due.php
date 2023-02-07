<?php

namespace app\models;

use app\common\db\ActiveRecord;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\BaseActiveRecord;

/**
 * This is the model class for table "due".
 *
 * @property int $id
 * @property string $name
 * @property int $type
 * @property int $expired_at
 * @property int|null $setting_email_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Due extends ActiveRecord{

	/**
	 * {@inheritdoc}
	 */
	public static function tableName(){
		return 'due';
	}

	/** @inheritDoc */
	public function behaviors(){
		return [
			[
				'class'      => AttributeBehavior::class,
				'attributes' => [
					BaseActiveRecord::EVENT_BEFORE_INSERT => 'expired_at',
					BaseActiveRecord::EVENT_BEFORE_UPDATE => 'expired_at',
				],
				'value'      => function ($event){
					return Yii::$app->getFormatter()->asTimestamp($this->expired_at);
				},
			],
			[
				'class'      => AttributeBehavior::class,
				'attributes' => [
					BaseActiveRecord::EVENT_AFTER_FIND => 'expired_at',
				],
				'value'      => function ($event){
					return Yii::$app->getFormatter()->asDate($this->expired_at);
				},
			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules(){
		return array_merge([
			[['name', 'type', 'expired_at'], 'required'],
			[['type', 'setting_email_id'], 'integer'],
			[['name'], 'string', 'max' => 255],
		], parent::rules());
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels(){
		return [
			'id'               => 'ID',
			'name'             => 'Name',
			'type'             => 'Type',
			'expired_at'       => 'Expired At',
			'setting_email_id' => 'Setting Email',
			'created_at'       => 'Created At',
			'updated_at'       => 'Updated At',
			'created_by'       => 'Created By',
			'updated_by'       => 'Updated By',
		];
	}

}
