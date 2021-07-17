<?php
/**
 * This is the bootstrap file which instructs the WordPress to load the plugin.
 *
 * @link              https://ngideas.com
 * @since             1.0.0
 * @package           NgSurvey
 *
 * @wordpress-plugin
 * Plugin Name:       NgSurvey Custom Message
 * Plugin URI:        https://ngideas.com/product/ngsurvey-import-export/
 * Description:       Shows Custom Message at the end of the survey response.
 * Version:           1.0.0
 * Author:            NgIdeas
 * Author URI:        https://ngideas.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ngsurvey
 * Domain Path:       /languages
 * NgSurvey Type:     Extension
 * NgSurvey ID:       ngsurvey-extension-custom-message
 * Update Server:     NgIdeas
 */
defined( 'ABSPATH' ) || exit;

require_once 'includes/class-ngsurvey-custom-message.php';

$NgSurvey_Custom_Message = new NgSurvey_Custom_Message( __FILE__ );
