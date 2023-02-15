<?php

namespace app\models;

use app\common\dictionaries\DueDictionary;
use app\common\dictionaries\SettingDictionary;
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
		$query->orWhere(['AND',
			['>', 'expired_at', Setting::getTimeThreshold(SettingDictionary::EXPIRED_REMAINER_DAY_FIRST)],
			['alerted' => DueDictionary::NOT_ALERT],
		]);

		$query->orWhere(['AND',
			['>', 'expired_at', Setting::getTimeThreshold(SettingDictionary::EXPIRED_REMAINER_DAY_SECOND)],
			['alerted' => DueDictionary::ALERTED_FIRST],
		]);

		$query->orWhere(['AND',
			['>', 'expired_at', Setting::getTimeThreshold(SettingDictionary::EXPIRED_REMAINER_DAY_THIRD)],
			['alerted' => DueDictionary::ALERTED_FIRST | DueDictionary::ALERTED_SECOND],
		]);

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