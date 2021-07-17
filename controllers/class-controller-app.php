<?php
/**
 * The file that defines the functions to handle the import/export cntroller functionality.
 *
 * @link       https://ngideas.com
 * @since      1.0.0
 *
 * @package    NgSurvey
 * @subpackage NgSurvey/extensions
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * The main application class of the app.
 *
 * This is used to define custom message app controller class.
 *
 * @package    NgSurvey
 * @author     NgIdeas <support@ngideas.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://ngideas.com
 * @since      1.0.0
 */
class NgSurvey_Custom_Message_Controller extends NgSurvey_Controller {
    
    /**
     * Initialize plugin
     * 
     * @param array $config the configuration, if any.
     * 
     * @since    1.0.0
     */
    public function __construct( $config = array() ) {
        $config = array_merge( $config, array(
            'name'          => 'custom-message',
            'title'         => __( 'Custom Message', NGS_IMPEXPTM ),
            'template'      => new NgSurvey_Template_Loader(array(
                'plugin_directory' => plugin_dir_path( dirname( __FILE__ ) ),
                'theme_template_directory' => plugin_basename( dirname( __DIR__ ) ),
                'filter_prefix' => 'ngsurvey-extension-custom-message'
            )),
        ) );
        
        parent::__construct( $config );
    }

    /**
     * The handler function to filter the end of survey response message.
     * 
     * @param string $message the filtered message
     * 
     * @return string $message the updated message
     */
    public function show_awesome_message( $message ) {
    	
    	// Create our message modal class instance
    	$model = $this->get_model( 'message', 'NgSurvey_Custom_Message_Model_' );
    	
    	// Fetch the message from the modal
    	$message = $model->getMessage();
    	
    	// Return the final message
    	return $message;
    }
}
