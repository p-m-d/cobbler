<?php

namespace Cobbler\Filter;

use MiniAsset\Filter\AssetFilter;
use RuntimeException;

/**
 * @todo create an abstract config parser filter
 */
class PatternMatch extends AssetFilter {

	protected $parserStrings = [];

	public function settings(array $settings = null) {
        if ($settings && isset($settings['parse'])) {
			if (!isset($this->_settings['parse']) || $settings['parse'] != $this->_settings['parse']) {
				$this->parserStrings = $this->readConfig($settings['parse']);
			}
        }
        return parent::settings($settings);
    }

	public function output($target, $content){
		$name = basename($target);
		if (!empty($this->parserStrings[$name])) {
			$content = $this->split($name, $content);
		}
		return $content;
	}

	protected function split($name, $content) {
		$pattern = $this->parserStrings[$name];
		if (!preg_match($pattern['match'], $content, $matched)) {
			$message = 'Pattern match for "%s" in "%s" was not found.';
			throw new RuntimeException(sprintf($message, $pattern['match'], $name));
		}
		return @$matched['match'] ?: end($matched);
	}

	protected function readConfig($filename) {
		if (empty($filename) || !is_string($filename) || !file_exists($filename)) {
			throw new RuntimeException(sprintf('Configuration file "%s" was not found.', $filename));
		}

		if (strrpos($filename, '.php')) {
			return include $filename;
		}
		if (function_exists('parse_ini_file')) {
			return parse_ini_file($filename, true);
		} else {
			return parse_ini_string(file_get_contents($filename), true);
		}
	}
}