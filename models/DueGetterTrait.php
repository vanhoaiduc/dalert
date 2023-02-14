<?php

namespace app\models;

use app\common\dictionaries\DueDictionary;
use app\common\helpers\DateHelper;
use app\common\helpers\StringHelper;
use yii\db\ActiveQuery;

/**
 * @property-read \app\models\Setting $settingEmail
 */
trait DueGetterTrait{

	/**
	 * @return \yii\db\ActiveQuery
	 * @throws \yii\base\InvalidConfigException
	 */
	public static function findExpired()
	: ActiveQuery{
		$query = self::find();
		$query->andWhere(['>', 'expired_at', Setting::getDueExpiredThreshold()]);
		$query->andWhere(['alerted' => DueDictionary::NOT_ALERT]);

		return $query;
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getSettingEmail(){
		return $this->hasOne(Setting::class, ['id' => 'setting_email_id']);
	}

	public function getAlertedEmails()
	: array{
		return StringHelper::explode($this->alerted_emails);
	}

	/**
	 * @return string
	 */
	public function getTypeName()
	: string{
		return DueDictionary::getTypeName($this->type);
	}

	/**
	 * @return string|null
	 * @throws \yii\base\InvalidConfigException
	 */
	public function getExpiredDate()
	: ?string{
		return DateHelper::asDate($this->expired_at);
	}

	/**
	 * @return string
	 * @throws \yii\base\InvalidConfigException
	 */
	public function getEmailSubject()
	: string{
		return "{$this->getTypeName()} - $this->name will expired at {$this->getExpiredDate()}";
	}

	/**
	 * @return string
	 */
	public function getEmailView()
	: string{
		return 'due_expired';
	}
}