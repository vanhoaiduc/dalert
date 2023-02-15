<?php

namespace app\common\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

/**
 *
 */
class WebController extends Controller{

	public function behaviors(){
		return [
			'access' => [
				'class' => AccessControl::class,
				'rules' => [
					[
						'allow' => TRUE,
						'roles' => ['@'],
					],
				],
			],
		];
	}
}