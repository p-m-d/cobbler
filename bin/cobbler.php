<?php
$autoloadPaths = [
	__DIR__ . '/../../../autoload.php',
	__DIR__ . '/../../vendor/autoload.php',
	__DIR__ . '/../vendor/autoload.php',

	__DIR__ . '/../../../../../vendor/autoload.php'//@todo - remove this one!
];

foreach ($autoloadPaths as $file) {
	if (file_exists($file)) {
		define('COBBLER_COMPOSER_INSTALL', $file);
		break;
	}
}

unset($file);

if (!defined('COBBLER_COMPOSER_INSTALL')) {
	fwrite(STDERR,
	'You need to set up the project dependencies using the following commands:' . PHP_EOL .
	'wget http://getcomposer.org/composer.phar' . PHP_EOL .
	'php composer.phar install' . PHP_EOL
	);
	die(1);
}

require COBBLER_COMPOSER_INSTALL;

$cli = new Cobbler\Command\Cobbler();

// Remove script name.
array_shift($argv);

exit($cli->main($argv));