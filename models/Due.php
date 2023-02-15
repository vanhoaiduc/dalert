<?php

namespace app\models;

use app\common\db\ActiveRecord;
use app\common\dictionaries\DueDictionary;
use app\models\behaviors\DueUpdateExpiredAtBehavior;
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
 * @property int|null $alerted
 * @property int|null $alerted_at
 * @property string|null $alerted_emails
 */
class Due extends ActiveRecord{

	use DueGetterTrait;
	use DueAlertedStatusTrait;

	/**
	 * {@inheritdoc}
	 */
	public static function tableName(){
		return 'due';
	}

	/** @inheritDoc */
	public function behaviors(){
		$behaviors = [
			'attrBeforeSave' => [
				'class'      => AttributeBehavior::class,
				'attributes' => [
					BaseActiveRecord::EVENT_BEFORE_INSERT => 'expired_at',
					BaseActiveRecord::EVENT_BEFORE_UPDATE => 'expired_at',
				],
				'value'      => function ($event){
					return Yii::$app->getFormatter()->asTimestamp($this->expired_at);
				},
			],
		];

		DueUpdateExpiredAtBehavior::register($behaviors);

		return $behaviors;
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules(){
		return array_merge([
			[['name', 'type', 'expired_at'], 'required'],
			[['type', 'setting_email_id'], 'integer'],
			[['name'], 'string', 'max' => 255],
			[['type'], 'in', 'range' => DueDictionary::getTypeListIds()],
		], parent::rules());
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels(){
		return [
			'id'                 => 'ID',
			'name'               => 'Name',
			'type'               => 'Type',
			'typeName'           => 'Type',
			'expired_at'         => 'Expired At',
			'setting_email_id'   => 'Setting Email',
			'settingEmail.value' => 'Setting Email',
			'created_at'         => 'Created At',
			'updated_at'         => 'Updated At',
			'created_by'         => 'Created By',
			'updated_by'         => 'Updated By',
		];
	}
}
