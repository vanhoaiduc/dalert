<?php

use app\common\symfonymailer\Mailer;

return [
	'mailer' => [
		'class'     => Mailer::class,
		'sender'    => ['admin@admin.com' => 'dAlert'],
		'transport' => [
			'scheme'     => 'smtp',
			'host'       => 'smtp.gmail.com',
			'username'   => '',
			'password'   => '',
			'port'       => 587,
			'encryption' => 'tls'
		],
	],
];