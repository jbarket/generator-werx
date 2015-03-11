<?php

# Database connection options. Uncomment the version you want to use and modify it for your environment.

## Option 1: Simple PEAR-style DSN DSN string for MySQL:
#return ['default' => 'mysql://username:password@host/database'];

## Option 2: Using array of keys for MySQL:

# Keys needed:
/*
$settings = [
	'driver'	=> 'mysql',
	'host'		=> 'localhost',
	'database'	=> 'mysql',
	'username'	=> 'root',
	'password'	=> null,
	'charset'	=> 'utf8',
	'collation'	=> 'utf8_unicode_ci',
	'prefix'	=> null
];

return ['default' => $settings];
*/


# Option 3: Array of keys for SQLite connection.
/*
return [
	'default' => [
		'driver' => 'sqlite',
		'database' => dirname(__DIR__) . '/storage/example.sqlite'
	]
];
*/