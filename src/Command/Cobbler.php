<?php

namespace Cobbler\Command;

use MiniAsset\Cli\MiniAsset;
use Cobbler\Command\TurnoutTask;
use League\CLImate\Argument\Manager;

class Cobbler extends MiniAsset {

	/**
	 * TurnoutTask
	 *
	 * @var \Cobbler\Command\TurnoutTask
	 */
	protected $turnout;

	/**
	 * @see \MiniAsset\Cli\MiniAsset::__construct()
	 */
	public function __construct() {
		parent::__construct();
		$this->turnout = new TurnoutTask($this->cli);
	}

	/**
	 * @see \MiniAsset\Cli\MiniAsset::main()
	 */
	public function main($argv) {
		if (empty($argv[0])) {
			return parent::main($argv);
		}
		$this->bootstrapApp($argv);
		switch ($argv[0]) {
			case 'turnout':
				return $this->turnout->main($argv);
			default:
				return parent::main($argv);
		}
	}

	/**
	 * @see \MiniAsset\Cli\MiniAsset::help()
	 */
	public function help() {
		$this->cli->underline('Cobbler Asset CLI Tool');
		$this->cli->out('');
		$this->cli->out('Parse assets for your application');
		$this->cli->out('');
		$this->cli->magenta('Commands');
		$this->cli->out('');
		$this->cli->out('- <green>turnout</green> Build assets.');
		$this->cli->out('');
		return parent::help();
	}

	protected function bootstrapApp(array $argv) {
		$args = new Manager();
		$args->add('shoelace', [
			'prefix' => 's',
			'longPrefix' => 'shoelace',
		]);
		$args->parse($argv);
		if ($args->defined('shoelace')) {
			$bootstrap = $args->get('shoelace');
			$files = explode(',', $bootstrap);
			foreach ($files as $file) {
				require_once $file;
			}
		}

		if (!defined('COBBLER_OUTPUT')) {
			define('COBBLER_OUTPUT',  __DIR__ . '/../../output');
		}
		if (!defined('COBBLER_CONFIG')) {
			define('COBBLER_CONFIG',  __DIR__ . '/../../config');
		}
		if (!defined('TWBS_PATH')) {
			define('TWBS_PATH', __DIR__ . '/../../../../twbs/bootstrap');
		}
	}
}

?>