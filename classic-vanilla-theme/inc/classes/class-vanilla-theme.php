<?php
/**
 * Bootstraps the Theme.
 *
 * @package Aquila
 */

namespace VANILLA_THEME\Inc;

use VANILLA_THEME\Inc\Traits\Singleton;

class VANILLA_THEME {
	use Singleton;

	protected function __construct() {

		// load class.
		$this->set_hooks();
	}

	protected function set_hooks() {
		// actions and filters
	}
}
