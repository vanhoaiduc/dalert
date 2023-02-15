<?php
$db_local = require __DIR__ . '/params-local.php';

return array_merge([
	'adminEmail'  => 'admin@example.com',
	'senderEmail' => 'noreply@example.com',
	'senderName'  => 'Example.com mailer',
	'bsVersion'   => '5.x',
], $db_local);
