<?php
/**
 * Defines the main class to initialize and handle the plugin operations
 *
 * @link       https://ngideas.com
 * @since      1.0.0
 *
 * @package    NgSurvey
 * @subpackage NgSurvey/includes
 */
if (! defined('ABSPATH')) {
    exit();
}

/**
 * Defines the main class to initialize and handle the plugin operations
 *
 * @package NgSurvey
 * @since 1.0.0
 */

class NgSurvey_Custom_Message {
    
    private $version = '1.0.0';
    
    private $pluginFile = null;
    
    private $slug = null;
    
    /**
     * Construct the plugin.
     */
    public function __construct( $plugin_file ) {
        $this->pluginFile = $plugin_file;
        $this->slug = basename( $plugin_file, '.php' );
        
        // Initialize the plugin events
        add_action( 'plugins_loaded', array( $this, 'init' ) );
        add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
    }
    
    /**
     * Initialize the plugin.
     */
    public function init() {
    	// First make sure NgSurvey is installed, or else we do not add our hooks.
    	if( ! defined( 'NGSURVEY_PATH' ) ) {
    		add_action( 'admin_notices', array ( $this, 'need_ngsurvey' ) );
    		return;
    	}
    	
    	// Now load all classes
    	include_once trailingslashit( plugin_dir_path( dirname( __FILE__ ) ) ) . 'controllers/class-controller-app.php';
    	
    	// Define our controller to perform the task
    	$controller = new NgSurvey_Custom_Message_Controller();
    	
    	// Add hidden menu item so that we can display the invitations page there
    	add_action( 'ngsurvey_end_of_survey_message', array( $controller, 'show_awesome_message' ), 10, 3 );
    }
    
    /**
     * A notice to show when the plugin is loaded without NgSurvey loaded.
     *
     * @return string Fallack notice.
     */
    
    public function need_ngsurvey() {
        $error = sprintf( 
       		esc_html__( 'NgSurvey Custom Message requires %sNgSurvey%s to be installed & activated!' , 'ngsurvey-extension-custom-message' ), 
       		'<a href="http://wordpress.org/extend/plugins/ngsurvey/">', '</a>' 
        );
        $message = '<div class="error"><p>' . $error . '</p></div>';
        
        echo $message;
    }
    
    /**
     * Load the plugin text domain for translation.
     *
     * @since    1.0.0
     */
    public function load_plugin_textdomain() {
        load_plugin_textdomain( 'ngsurvey-extension-custom-message', false, trailingslashit( plugin_dir_path( dirname( __FILE__ ) ) ) . '/languages/' );
    }
}
