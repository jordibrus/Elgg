<?php
/**
 * Elgg upgrade script.
 *
 * This script triggers any upgrades necessary, ensuring that
 * upgrades are triggered deliberately by a single user.
 *
 * @package Elgg.Core
 * @subpackage Upgrade
 */

// Include elgg engine
define('UPGRADING', 'upgrading');
require_once(dirname(__FILE__) . "/engine/start.php");

if (get_input('upgrade') == 'upgrade') {
	if (version_upgrade_check()) {
		version_upgrade();
	}
	elgg_view_regenerate_simplecache();
	elgg_filepath_cache_reset();
} else {
	global $CONFIG;
	echo elgg_view('settings/upgrading');
	exit;
}

forward();