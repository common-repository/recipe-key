<?php

/*
  Plugin Name: Recipe Key
  Plugin URI: 
  Description: Recipe Key adds icons to your posts by integrating with your categories and tags. Recipe Key provides readers with a quick and simple visual category of your post and a link to similar content the reader may be interested in. 
  Version: 1.1.2
  Author:Recipe Key Plugin
  Author URI: https://recipekeyplugin.com
  Text Domain: recipekey
*/ 	

// ABORT IF PLUGIN IS CALLED DIRECTLY
if ( ! defined( 'WPINC' ) ) {
	 die;
}
/**************************
ACTIVATION PROGRESS
************************/

//REGISTER SETTINGS
function rk_register_settings() {
	// creates our settings in the options table
	register_setting('rk_settings_group', 'rk_settings');
	register_setting('rk_settings_group', 'rk-css-style');
	
	register_setting('rk_settings_group', 'rk-gf-name');
	register_setting('rk_settings_group', 'rk-gf-display');
	register_setting('rk_settings_group', 'rk-gf-colorbk');
	register_setting('rk_settings_group', 'rk-gf-colorbkhv');
	register_setting('rk_settings_group', 'rk-gf-colorfont');
	register_setting('rk_settings_group', 'rk-gf-colorfonthv');
	
	register_setting('rk_settings_group', 'rk-df-name');
	register_setting('rk_settings_group', 'rk-df-display');
	register_setting('rk_settings_group', 'rk-df-colorbk');
	register_setting('rk_settings_group', 'rk-df-colorbkhv');
	register_setting('rk_settings_group', 'rk-df-colorfont');
	register_setting('rk_settings_group', 'rk-df-colorfonthv');
  
	register_setting('rk_settings_group', 'rk-lc-name');
	register_setting('rk_settings_group', 'rk-lc-display');
	register_setting('rk_settings_group', 'rk-lc-colorbk');
	register_setting('rk_settings_group', 'rk-lc-colorbkhv');
	register_setting('rk_settings_group', 'rk-lc-colorfont');
	register_setting('rk_settings_group', 'rk-lc-colorfonthv');
  
	register_setting('rk_settings_group', 'rk-veg-name');
	register_setting('rk_settings_group', 'rk-veg-display');
	register_setting('rk_settings_group', 'rk-veg-colorbk');
	register_setting('rk_settings_group', 'rk-veg-colorbkhv');
	register_setting('rk_settings_group', 'rk-veg-colorfont');
	register_setting('rk_settings_group', 'rk-veg-colorfonthv');
}

add_action('admin_init', 'rk_register_settings');


//ACTIVATE PLUGIN
register_activation_hook( __FILE__, 'rk_set_up_options' );

function rk_set_up_options(){
  add_option('rk-css-style', '1');

  add_option('rk-gf-name', 'Gluten Free');
  add_option('rk-gf-display', 'Gluten Free');
  add_option('rk-gf-colorbk', '#60b9e5');
  add_option('rk-gf-colorbkhv', '#20a3e5');
  add_option('rk-gf-colorfont', '#000');
  add_option('rk-gf-colorfonthv', '#000');
  
  add_option('rk-df-name', 'Dairy Free');
  add_option('rk-df-display', 'Diary Free');
  add_option('rk-df-colorbk', '#c158fb');
  add_option('rk-df-colorbkhv', '#b12af9');
  add_option('rk-df-colorfont', '#000');
  add_option('rk-df-colorfonthv', '#000');
  
  add_option('rk-lc-name', 'Low Carb');
  add_option('rk-lc-display', 'Low Carb');
  add_option('rk-lc-colorbk', '#60b9e5');
  add_option('rk-lc-colorbkhv', '#20a3e5');
  add_option('rk-lc-colorfont', '#000');
  add_option('rk-lc-colorfonthv', '#000');
  
  add_option('rk-veg-name', 'Vegetarian');
  add_option('rk-veg-display', 'Vegetarian');
  add_option('rk-veg-colorbk', '#7064b8');
  add_option('rk-veg-colorbkhv', '#402cb7');
  add_option('rk-veg-colorfont', '#000');
  add_option('rk-veg-colorfonthv', '#000');
}

/*****************************************
 This section initiates the admin page.
*******************************************/

// INCLUDE DEPENDANCIES
foreach ( glob( plugin_dir_path( __FILE__ ) . 'admin/*.php' ) as $file ) {
	include_once $file;
}

add_action( 'plugins_loaded', 'RK_admin_settings' );

//START ADMIN PAGE
function RK_admin_settings() {

	$plugin = new RK_Submenu( new RK_Submenu_Page() );
	$plugin->init();

}

// BUILD TERM ARRAY
		$diets = array();
        $diets[0] = array (
			"primaryName" => 'Gluten Free',
			"valIcon" => 'gluten-free',
			"valName" => 'rk-gf-name',
			"valDisplay" => 'rk-gf-display',
			"valColorBk" => 'rk-gf-colorbk',
			"valColorBkHover" => 'rk-gf-colorbkhv',
			"valColorFont" => 'rk-gf-colorfont',
			"valColorFontHover" => 'rk-gf-colorfonthv',
			//"DefaultBkColor" => '#60b9e5',
			//"DefaultBkColorHv" => '#20a3e5',
			//"DefaultFontColor" => '#000',
			//"DefaultFontColorHv" => '#000',
			"valAbb" => 'GF'
        );
        $diets[1] = array (
			"primaryName" => 'Dairy Free', //for wp_option nulls then fill this value
			"valIcon" => 'dairy-free', // adds value to icon e.g. irk-'dairy-free'
			"valName" => 'rk-df-name', //recipe key tag/cat value
			"valDisplay" => 'rk-df-display', //diet display name
			"valColorBk" => 'rk-df-colorbk', //background color
			"valColorBkHover" => 'rk-df-colorbkhv', //background hover color
			"valColorFont" => 'rk-df-colorfont', //font color
			"valColorFontHover" => 'rk-df-colorfonthv', //font hover color
			//"DefaultBkColor" => '#c158fb', //background color
			//"DefaultBkColorHv" => '#b12af9', //background hover color
			//"DefaultFontColor" => '#000', //font color
			//"DefaultFontColorHv" => '#000', //font hover color
			"valAbb" => 'DF'
        ); 
		$diets[2] = array (
			"primaryName" => 'Low Carb',			
			"valIcon" => 'low-carb',
			"valName" => 'rk-lc-name',
			"valDisplay" => 'rk-lc-display',
			"valColorBk" => 'rk-lc-colorbk',
			"valColorBkHover" => 'rk-lc-colorbkhv',
			"valColorFont" => 'rk-lc-colorfont',
			"valColorFontHover" => 'rk-lc-colorfonthv',
			//"DefaultBkColor" => '#60b9e5',
			//"DefaultBkColorHv" => '#20a3e5',
			//"DefaultFontColor" => '#000',
			//"DefaultFontColorHv" => '#000',
			"valAbb" => 'LC'
        );
		$diets[3] = array (
			"primaryName" => 'Vegetarian',			
			"valIcon" => 'vegetarian',
			"valName" => 'rk-veg-name',
			"valDisplay" => 'rk-veg-display',
			"valColorBk" => 'rk-veg-colorbk',
			"valColorBkHover" => 'rk-veg-colorbkhv',
			"valColorFont" => 'rk-veg-colorfont',
			"valColorFontHover" => 'rk-veg-colorfonthv',
			//"DefaultBkColor" => '#7064b8',
			//"DefaultBkColorHv" => '#402cb7',
			//"DefaultFontColor" => '#000',
			//"DefaultFontColorHv" => '#000',
			"valAbb" => 'VEG'
        );
		
		
/************************************************
 This section creates the sidebar widget.
***************************************************/
class RK_Widget extends WP_Widget {

	 // CREATE WIDGET CONSTRUCT
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'RK_widget',
			'description' => 'sidebar widget for recipe key',
		);
		parent::__construct( 'RK_widget', 'Recipe Key Sidebar', $widget_ops );
	}
	 
	// WIDGET FRONTEND CONSTRUCT
	public function widget( $args, $instance ) {
		
		global $diets;
		
		echo $args['before_widget'];
			if ( ! empty( $instance['title'] ) ) 
			{
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			} 
	
		//SHOW RECPIE KEY LOGO
	//	echo '<div align="center" class="recipe-key-logo" ><img src="'. esc_url( plugins_url( '/images/recipe-key-title.png', __FILE__ ) ) .'" alt="Browse my top categories using Recipe Key" width="120" class="recipe-key-logo-image"></div>';
		
		$rkstyle = esc_attr(get_option('rk-css-style')); 
		//IF NULL
		if (empty($rkstyle)) {
			$recipekeydiet = 'recipe-key-diet';
			$recipekeyicon = 'recipe-key-icon';
			$recipekeywrap = 'recipe-key-post-wrap';
			$recipekeyfont = 'recipe-key';
			$rkstndfontcolor = '#7064b8';
			$rkstndfonthvcolor ='#565656';
			$rkdivspan = 'span';
		}
		
		//STYLE1 CSS STANDARD
		switch ($rkstyle)  { 
			case "1" :
				$rkSidebarStyle = 'rkSidebarStyle1';
				$recipekeydiet = 'recipe-key-diet';
				$recipekeyicon = 'recipe-key-icon';
				$recipekeywrap = 'recipe-key-post-wrap';
				$recipekeyfont = 'recipe-key';
				$rkdivspan = 'span';
			break;
		// STYLE2 CSS SPLIT
			case "2" :
				$rkSidebarStyle = 'rkSidebarStyle2';
				$recipekeyicon = 'recipe-key-icon-style2';
				$recipekeydiet = 'recipe-key-diet-style2';
				$recipekeywrap = 'recipe-key-wrap-style2';
				$recipekeyfont = 'recipe-key-font-style2';
				$rkdivspan = 'div';
			break;
		 // STYLE3 CSS BLOCK
		 	case "3" :
				$rkSidebarStyle = 'rkSidebarStyle3';
				$recipekeyicon = 'recipe-key-icon-style3';
				$recipekeydiet = 'recipe-key-diet-style3';
				$recipekeywrap = 'recipe-key-wrap-style3';
				$recipekeyfont = 'recipe-key-font-style3';
				$rkdivspan = 'span';
			 break;
		  // STYLE4 CSS BLOCK
		  	case "4" :
				$rkSidebarStyle = 'rkSidebarStyle4';
				$recipekeydiet = 'recipe-key-diet-style4';
				$recipekeywrap = 'recipe-key-wrap-style4';
				$recipekeyfont = 'recipe-key-font-style4';
				$rkdivspan = 'span';	
				$rkstyle4name = 'rk-style4-name';
			break;
		}

		//BEGIN RECPIE KEY IF STATEMENT	 	
		$output = '';
		$output .= '<div class="rk-sidebar">';
		$output .= '<ul class="' . $recipekeywrap . ' ' . $rkSidebarStyle . '">';
		foreach ($diets as $diet ) {
					
			if ( is_single() ) {
				// don't apply styles if post/single - styles applied below.
			} else {
				switch ($rkstyle)  { 
				case "4" :
					$output .= '<style>';
					$output .= ".diet-".$diet['valIcon']." { background-color:".get_option($diet['valColorBk']).";}";
					$output .= ".diet-".$diet['valIcon'].":hover { background-color:".get_option($diet['valColorBkHover'])."; opacity:unset;}";
					$output .= ".font-".$diet['valIcon']." { color:".get_option($diet['valColorFont'])."; }";
					$output .= ".font-".$diet['valIcon'].":hover { color:".get_option($diet['valColorFontHover'])."; }";
					$output .= '</style>';
				break;
				case "3" :
					case "2" :
					$output .= '<style>';
					$output .= ".style-".$diet['valIcon']." { background-color:".get_option($diet['valColorBk'])." !important;}";
					$output .= ".style-".$diet['valIcon'].":hover { background-color:".get_option($diet['valColorBkHover'])." !important; opacity:unset;}";
					$output .= ".font-".$diet['valIcon']." { color:".get_option($diet['valColorFont'])."; }";
					$output .= ".font-".$diet['valIcon'].":hover { color:".get_option($diet['valColorFontHover'])."; }";
					$output .= '</style>';
				break;
				case "1" :
					$output .= '<style>';
					$output .= ".font-".$diet['valIcon']." { color:".get_option($diet['valColorFont'])." !important;}";
					$output .= ".font-".$diet['valIcon'].":hover { color:".get_option($diet['valColorFontHover'])." !important; opacity:unset;}";
					$output .= '</style>';
				break;
				
			}
			}
		
			$valName = esc_attr( get_option($diet['valName']) );
			$valDisplay = esc_attr( get_option($diet['valDisplay']) );
			
			if ( term_exists( $valName, 'category' ) )  {
				$rk_diet_id = get_term_by('name', $valName, 'category'); 
				$rk_diet_link = get_category_link( $rk_diet_id );

				$output .=  '<il class="rk-item">';
				$output .= '<a class="' . $recipekeyfont . ' style-'.$diet['valIcon'].'" href="'. esc_url( $rk_diet_link ).'" title="'. ucwords($valName).'" role="button" aria-label="Click to see more '.$valName.' posts">';
				if ($rkstyle === '1' || $rkstyle === '2' || $rkstyle === '3')  {
				$output .= '<span class="irk-'.$diet['valIcon'].' ' . $recipekeyicon .'"></span>';
				}
				
				$output .= '<' . $rkdivspan . ' class="diet-'.$diet['valIcon'].' font-'.$diet['valIcon'].' ' . $recipekeydiet . ' "><span>' .  $valDisplay  . '</span></' . $rkdivspan .'>';
				
				if ($rkstyle === '4') {
				$output .= '<' . $rkdivspan . ' class="'.$rkstyle4name.' font-'.$diet['valIcon'].' sidebar-'.$diet['valIcon'].'">' .  ucwords($valName) . '</' . $rkdivspan .'>';
				}
				$output .=  '</a></il>';
			} else 	if ( term_exists( $valName, 'post_tag' )) {
				$rk_diet_id = get_term_by('name', $valName, 'post_tag');
				$rk_diet_link = get_tag_link($rk_diet_id);
				
					$output .=  '<il class="rk-item">';
					$output .= '<a class="' . $recipekeyfont . ' style-'.$diet['valIcon'].'" href="'. esc_url( $rk_diet_link ).'" title="'. ucwords($valName).'" role="button" aria-label="Click to see more '.$valName.' posts">';
					if ($rkstyle === '1' || $rkstyle === '2' || $rkstyle === '3')  {
					$output .= '<span class="irk-'.$diet['valIcon'].' ' . $recipekeyicon .'"></span>';
					}	
				
					$output .= '<' . $rkdivspan . ' class="diet-'.$diet['valIcon'].' font-'.$diet['valIcon'].' ' . $recipekeydiet . ' "><span>' .  $valDisplay  . '</span></' . $rkdivspan .'>';
					
					if ($rkstyle === '4') {
					$output .= '<' . $rkdivspan . ' class="'.$rkstyle4name.' font-'.$diet['valIcon'].' sidebar-'.$diet['valIcon'].'">' .  ucwords($valName) . '</' . $rkdivspan .'>';
					}
					$output .=  '</a></il>';
			}
			} 
			$output .= '</ul></div>';
			
		echo  $output;
		
echo $args['after_widget'];
	}
	
	// SIDEBAR WIDEGT BACKEND
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'recipekey' );
		?>
		<p>
		<!----- Widget Title  -->
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'recipekey' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		
		
    <?php	
	}
}

// REGISTER RK_Widget
add_action( 'widgets_init', function(){
	register_widget( 'RK_Widget' );
});



/*********************************************
 Main RK post                            					 
*******************************************/
function RK_Main($content)
{
	
	if ( is_home() || is_single() || is_archive() )
    {
		global $diets;
		$rkstyle = esc_attr(get_option('rk-css-style'));
		//IF NULL
		if (empty($rkstyle)) {
			$recipekeydiet = 'recipe-key-diet';
			$recipekeyicon = 'recipe-key-icon';
			$recipekeywrap = 'recipe-key-post-wrap';
			$recipekeyfont = 'recipe-key';
			$rkstndfontcolor = '#7064b8';
			$rkstndfonthvcolor ='#565656';
			$rkdivspan = 'span';
		}
		
		switch ($rkstyle)  { 
			case "1" :
				$recipekeydiet = 'recipe-key-diet';
				$recipekeyicon = 'recipe-key-icon';
				$recipekeywrap = 'recipe-key-post-wrap';
				$recipekeyfont = 'recipe-key';
				$rkdivspan = 'span';
			break;
		// STYLE2 CSS SPLIT
			case "2" :
				$recipekeyicon = 'recipe-key-icon-style2';
				$recipekeydiet = 'recipe-key-diet-style2';
				$recipekeywrap = 'recipe-key-wrap-style2';
				$recipekeyfont = 'recipe-key-font-style2';
				$rkdivspan = 'div';
			break;
		 // STYLE3 CSS BLOCK
		 	case "3" :
				$recipekeyicon = 'recipe-key-icon-style3';
				$recipekeydiet = 'recipe-key-diet-style3';
				$recipekeywrap = 'recipe-key-wrap-style3';
				$recipekeyfont = 'recipe-key-font-style3';
				$rkdivspan = 'span';
			break;
		  // STYLE4 CSS BLOCK
		  	case "4" :
				$recipekeyicon = 'recipe-key-icon-off';
				$recipekeydiet = 'recipe-key-diet-style4';
				$recipekeywrap = 'recipe-key-wrap-style4';
				$recipekeyfont = 'recipe-key-font-style4';
				$rkdivspan = 'span';
			break;
		}

	//output placeholder
	$output = '';
	 
	// START MAIN POST IF STATEMENT - exclude woocommerce
		$output .= '<div class="' . $recipekeywrap . '">';

		foreach ($diets as $diet) {
			$output .= '<style>';
			switch ($rkstyle)  { 
				case "4" :
					$output .= ".diet-".$diet['valIcon']." { background-color:".get_option($diet['valColorBk']).";}";
					$output .= ".diet-".$diet['valIcon'].":hover { background-color:".get_option($diet['valColorBkHover'])."; opacity:unset;}";
					$output .= ".font-".$diet['valIcon']." { color:".get_option($diet['valColorFont'])."; }";
					$output .= ".font-".$diet['valIcon'].":hover { color:".get_option($diet['valColorFontHover'])."; }";
				break;
				case "3" :
				case "2" :
					$output .= ".style-".$diet['valIcon']." { background-color:".get_option($diet['valColorBk'])." !important;}";
					$output .= ".style-".$diet['valIcon'].":hover { background-color:".get_option($diet['valColorBkHover'])." !important; opacity:unset;}";
					$output .= ".font-".$diet['valIcon']." { color:".get_option($diet['valColorFont'])."; }";
					$output .= ".font-".$diet['valIcon'].":hover { color:".get_option($diet['valColorFontHover'])."; }";
				break;
				case "1" :
					$output .= ".font-".$diet['valIcon']." { color:".get_option($diet['valColorFont'])." !important;}";
					$output .= ".font-".$diet['valIcon'].":hover { color:".get_option($diet['valColorFontHover'])." !important; opacity:unset;}";
				break;
				}
				$output .= '</style>';
			
				
					$valName = esc_attr( get_option($diet['valName']) );
					$valDisplay = esc_attr( get_option($diet['valDisplay']) );
					
					if ( in_category( $valName ) )   {
						$rk_diet_id = get_term_by('name', $valName, 'category'); 
						$rk_diet_link = get_category_link( $rk_diet_id );
						$output .=  '<a class="' . $recipekeyfont . ' style-'.$diet['valIcon'].'" href="'. esc_url( $rk_diet_link ).'" aria-label="Click to see more ' .  $valName  . ' posts" role="button" title="'. ucwords($valName).'">';
							if ($rkstyle === '1' || $rkstyle === '2' || $rkstyle === '3')  {
								$output .= '<span class="irk-'.$diet['valIcon'].' ' . $recipekeyicon .'"></span>';
							}
							$output .= '<' . $rkdivspan . ' class="diet-'.$diet['valIcon'].' font-'.$diet['valIcon'].' ' . $recipekeydiet . ' "><span>' .  $valDisplay  . '</span></' . $rkdivspan .'>';
						$output .= '</a>';
					} else if ( has_tag( $valName ) ) {
						$rk_diet_id = get_term_by('name', $valName, 'post_tag');
						$rk_diet_link = get_tag_link($rk_diet_id);
							$output .=  '<a class="' . $recipekeyfont . ' style-'.$diet['valIcon'].'" href="'. esc_url( $rk_diet_link ).'" aria-label="Click to see more ' .  $valName  . ' posts" role="button" title="'. ucwords($valName).'">';
							if ($rkstyle === '1' || $rkstyle === '2' || $rkstyle === '3')  {
									$output .= '<span class="irk-'.$diet['valIcon'].' ' . $recipekeyicon .'"></span>';
								}
								$output .= '<' . $rkdivspan . ' class="diet-'.$diet['valIcon'].' font-'.$diet['valIcon'].' ' . $recipekeydiet . ' "><span>' .  $valDisplay  . '</span></' . $rkdivspan .'>';
							$output .= '</a>';
							
					}
		
					}
					
					$output .= '</div>';
		
		
		return $output .= $content; // return content for standard pages/posts
	} else {
		return $content; // return content if nothing else
	}
	
}
add_filter( 'the_content', 'RK_Main' ); //For all other wordpress themes, hook into before 'the_content'
  

/***************************************************
 add css to plugin
****************************************************/
// ADD STYLE CSS TO RECPE KEYS
function RK_css() {
	$plugin_url = plugin_dir_url( __FILE__ );
	wp_register_style('rk-style', plugins_url('style.min.css', __FILE__));
	wp_enqueue_style('rk-style');
  
}
add_action( 'wp_enqueue_scripts', 'RK_css' );