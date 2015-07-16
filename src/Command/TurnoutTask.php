<?php

namespace Cobbler\Command;

use MiniAsset\Cli\BuildTask;
use MiniAsset\Factory;
use Cobbler\AssetConfig;

class TurnoutTask extends BuildTask {

	public function execute() {
		if ($this->cli->arguments->defined('bootstrap')) {
			parent::bootstrapApp();
		}
		if ($this->cli->arguments->defined('list')) {
			return $this->turnoutList();
		}
		return $this->turnout();
	}

	protected function turnout() {
		$config = $this->config();
		$factory = new Factory($config);
		foreach ($factory->assetCollection() as $target) {
			if (!is_dir($target->outputDir())) {
				if (!mkdir($target->outputDir(), 0777, true)) {
					$name = $target->name();
					$verbose = '<red>Skip building ' . $name . ' output path could not be created.</red>';
					$this->verbose($verbose, '<red>E<red>');
					continue;
				}
			}
			$this->_buildTarget($factory, $target);
		}
		$this->cli->green('Complete');
		return 0;
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
}