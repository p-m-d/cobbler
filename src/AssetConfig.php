<?php

namespace Cobbler;

class AssetConfig extends \MiniAsset\AssetConfig {

	public function load($path, $prefix = '') {
		parent::$_extensionTypes = array_merge(parent::$_extensionTypes, $this->extensions());
		return parent::load($path, $prefix);
	}

	public function extensions() {
		return ['css', 'js', 'eot', 'svg', 'ttf', 'woff', 'woff2'];
	}
}