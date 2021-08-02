<?php
/**
 * Plugin Name: Amalia Student Pre Approval Extension
 * Plugin URI: -
 * Author: P5Cure
 * Author URI: https://p5cure.com
 * Description:
 * Tags:
 *
 * @package Amalia_Student_Pre_Approval_Extension
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'ASPAE_DIR_PATH' ) ) {
	define( 'ASPAE_DIR_PATH', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'ASPAE_DIR_URL' ) ) {
	define( 'ASPAE_DIR_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'ASPAE_VERSION' ) ) {
	define( 'ASPAE_VERSION', '1.0' );
}

if ( ! defined( 'ASPAE_TEXT_DOMAIN' ) ) {
	define( 'ASPAE_TEXT_DOMAIN', 'aspae' );
}

if ( file_exists( ASPAE_DIR_PATH . 'includes/class-aspae-init.php' ) ) {
	$main = require_once ASPAE_DIR_PATH . 'includes/class-aspae-init.php';
	new $main();
}
