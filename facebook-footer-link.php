<?php
	/**
	* Plugin Name: Facebook Footer Link
	* Description: A custom plugin that adds Facebook profile link at the end of every post
	* Version: 0.1 beta
	* Author: Mher from iodev
	**/


	// Exit if is accessing directly
	if (!defined('ABSPATH')) {
		exit();
	}

	// Global options variable
	$ffl_options = get_option('ffl_settings');

	// Load scripts
	require_once(plugin_dir_path(__FILE__).'/includes/facebook-footer-link-scripts.php');
	require_once(plugin_dir_path(__FILE__).'/includes/facebook-footer-link-content.php');
	if(is_admin()){
		require_once(plugin_dir_path(__FILE__).'/includes/facebook-footer-link-settings.php');
	}