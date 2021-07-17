<?php
/**
 * The file that defines the custom message model class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://ngideas.com
 * @since      1.0.0
 *
 * @package    NgSurvey
 * @subpackage NgSurvey/includes/models
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * The custom message model class.
 *
 * This is used to define custom message model data.
 *
 * @package    NgSurvey
 * @author     NgIdeas <support@ngideas.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://ngideas.com
 * @since      1.0.0
 */
class NgSurvey_Custom_Message_Model_Message extends NgSurvey_Model {

    /**
     * Define the custom message model functionality of the plugin.
     *
     * @since    1.0.0
     */
    public function __construct($config = array()) {
        parent::__construct($config);
    }
    
    public function getMessage() {
    	$template = new NgSurvey_Template_Loader(array(
    			'plugin_directory' => plugin_dir_path( dirname( __FILE__ ) ),
    			'theme_template_directory' => plugin_basename( dirname( __DIR__ ) ),
    			'filter_prefix' => 'ngsurvey-extension-custom-message'
    	));
    	
    	ob_start();
    	$template->get_template_part( 'awesome_message' );
    	$message = ob_get_clean();
    	
    	return $message;
    }
}
