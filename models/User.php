<?php

namespace app\models;

use app\common\App;
use yii\base\BaseObject;
use yii\web\IdentityInterface;

/**
 *
 */
class User extends BaseObject implements IdentityInterface{

	public $id;
	public $username;
	public $password;
	public $authKey;
	public $accessToken;

	private static $users = [];

	/**
	 * {@inheritdoc}
	 */
	public static function findIdentity($id){
		return self::getUsers($id) !== NULL ? new static(self::getUsers($id)) : NULL;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function findIdentityByAccessToken($token, $type = NULL){
		foreach (self::getUsers() as $user){
			if ($user['accessToken'] === $token){
				return new static($user);
			}
		}

		return NULL;
	}

	/**
	 * Finds user by username
	 *
	 * @param string $username
	 *
	 * @return static|null
	 */
	public static function findByUsername($username){
		foreach (self::getUsers() as $user){
			if (strcasecmp($user['username'], $username) === 0){
				return new static($user);
			}
		}

		return NULL;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getId(){
		return $this->id;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getAuthKey(){
		return $this->authKey;
	}

	/**
	 * {@inheritdoc}
	 */
	public function validateAuthKey($authKey){
		return $this->authKey === $authKey;
	}

	/**
	 * Validates password
	 *
	 * @param string $password password to validate
	 *
	 * @return bool if password provided is valid for current user
	 */
	public function validatePassword($password){
		return $this->password === $password;
	}

	private static function getUsers($id = NULL){
		if (!self::$users){
			self::$users = App::getParams('users');
		}
		if ($id === NULL){
			return self::$users;
		}

		return self::$users[$id];
	}
}
