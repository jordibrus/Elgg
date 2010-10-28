<?php
/**
 * Elgg widget save action
 *
 * @package Elgg.Core
 * @subpackage Widgets.Management
 */

$guid = get_input('guid');
$params = $_REQUEST['params'];
$pageurl = get_input('pageurl');
$noforward = get_input('noforward', false);

$result = false;

if (!empty($guid)) {
	$result = save_widget_info($guid, $params);
}

if ($noforward) {
	exit;
}

if ($result) {
	system_message(elgg_echo('widgets:save:success'));
} else {
	register_error(elgg_echo('widgets:save:failure'));
}

forward($_SERVER['HTTP_REFERER']);