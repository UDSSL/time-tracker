<?php
if(!defined('ABSPATH') && !defined('WP_INSTALL_PLUGIN'))
	exit();

/**
 * Delete UDSSL Time Tracker Option
 */
delete_option('udssl_tt_option');

/**
 * Delete Tables
 */
include_once 'index.php';
$udssl_tt = new UDSSL_TT();
$udssl_tt->database->delete_tables();
?>
