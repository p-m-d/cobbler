<?php

namespace Cobbler\Command;

use MiniAsset\Cli\BuildTask;
use MiniAsset\Factory;
use Cobbler\AssetConfig;

class TurnoutTask extends BuildTask {

	public function execute() {
		$this->bootstrapApp();
		if ($this->cli->arguments->defined('list')) {
			return $this->turnoutList();
		}
		return $this->turnout();
	}

	protected function turnout() {
		$config = $this->config();
		$factory = new Factory($config);
		foreach ($factory->assetCollection() as $target) {
			$this->_buildTarget($factory, $target);
		}
	}

	protected function turnoutList() {
		$paths = glob(COBBLER_CONFIG . '/*', GLOB_ONLYDIR);
		$this->cli->underline('Cobbler Turnout Asset Configs');
		$this->cli->br();
		$this->cli->cyan('Config Path: ' . COBBLER_CONFIG);
		$this->cli->br();
		foreach ($paths as $path) {
			$this->cli->magenta(' - ' . basename($path));
		}
		$this->cli->br();
	}

	public function config() {
		if (!$this->config) {
			$config = $this->cli->arguments->get('config');
			$configFile = $config . '.ini';
			if (!file_exists($configFile)) {
				$configPath = COBBLER_CONFIG . '/%s/source.ini';
				$configFile = sprintf($configPath, $config);
			}
			$this->config = new AssetConfig();
			$this->config->load($configFile);
		}
		return $this->config;
	}

	protected function addArguments() {
		parent::addArguments();
		$this->cli->arguments->add([
			'list' => [
				'prefix' => 'l',
				'longPrefix' => 'list',
				'description' => 'List Cobbler\'s own asset package configs available for turnout',
				'noValue' => true
			]
		]);
	}

	protected function bootstrapApp() {
		if ($this->cli->arguments->defined('bootstrap')) {
			parent::bootstrapApp();
		}
		if (!defined('COBBLER_OUTPUT')) {
			define('COBBLER_OUTPUT',  __DIR__ . '/../../cache');
		}
		if (!defined('COBBLER_CONFIG')) {
			define('COBBLER_CONFIG',  __DIR__ . '/../../config');
		}
		if (!defined('TWBS_PATH')) {
			// 			define('TWBS_PATH', __DIR__ . '/../../../../vendor/twbs/bootstrap');
			////@todo - remove this one!
			define('TWBS_PATH', __DIR__ . '/../../../../../../vendor/twbs/bootstrap');
		}
	}
}