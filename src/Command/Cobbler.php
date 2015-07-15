<?php

namespace Cobbler\Command;

use MiniAsset\Cli\MiniAsset;
use Cobbler\Command\TurnoutTask;

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
}

?>