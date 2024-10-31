<?php
/*************************************************************************
 Admin Menu
 **************************************************************************/
class RK_Submenu {

	private $RK_submenu_page;

	
	 // Initializes all of the partial classes.

	public function __construct( $RK_submenu_page ) {
		$this->RK_submenu_page = $RK_submenu_page;
	}

	 // Adds a submenu for this plugin to the 'Tools' menu.
	public function init() {
		 add_action( 'admin_menu', array( $this, 'add_options_page' ) );
	}


	 // Create the submenu item and calls on the Submenu Page object
	public function add_options_page() {

		add_options_page(
			'Recipe Key Admin Page',
			'Recipe Key',
			'manage_options',
			'rk-admin-page',
			array( $this->RK_submenu_page, 'render' )
		);
	}
}

// ADD STYLE CSS TO RECPE KEYS
function RK_admin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );
	wp_register_style('rk_admin_css', plugins_url('css/rk-admin-style.min.css', __FILE__));
	wp_enqueue_style('rk_admin_css');

	wp_register_script('rk_admin_script', plugins_url('js/admin.min.js', __FILE__), array('jquery'),'1.1', true);
	wp_enqueue_script('rk_admin_script');
 
}
if ( isset($_GET['page']) ) {
    global $pagenow;
    if( in_array( $pagenow, array('options-general.php') ) && ( $_GET['page'] == 'rk-admin-page' ) ) {
add_action( 'admin_enqueue_scripts', 'RK_admin_css' );
	}
	}
