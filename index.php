<?php
/**
* Plugin Name: Easily Integrate Google Analytics
* Plugin URI: http://amkapps.com
* Description: GEasily Integrate Google Analytics plugin by AMKapps
* Version: 1.0
* Author: Madhu Kiran
* Author URI: http://amkapps.com
* License: GPL12
*/
/* 
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */

define( 'MY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
require MY_PLUGIN_PATH .'/options.php';