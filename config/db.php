<?php

$db_local = require __DIR__ . '/db-local.php';

return array_merge([
	'class'    => 'yii\db\Connection',
	'dsn'      => 'mysql:host=localhost;dbname=localhost',
	'username' => '',
	'password' => '',
	'charset'  => 'utf8',

	// Schema cache options (for production environment)
	//'enableSchemaCache' => true,
	//'schemaCacheDuration' => 60,
	//'schemaCache' => 'cache',
], $db_local);
