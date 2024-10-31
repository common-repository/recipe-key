<?php
/*
  Plugin Name: Recipe Key Admin Page
  Author: Recipe Key Plugin
  Author URI: https://recipekeyplugin.com
  Text Domain: recipe-key
  Copyright © 2020
*/

/****************************************************************************
  Backend Admin Page
*******************************************************************************/
$rk_options = get_option('rk_settings');

class RK_Submenu_Page {

	public function render() {

		
		$admindiets = array (
		
			array (
				"primaryName" => 'Nut Free',
				"valIcon" => 'nut-free',
				"valAbb" => 'nf'
			),
			array (
			"primaryName" => 'Egg Free',
			   "valIcon" => 'egg-free',
			   "valAbb" => 'ef'
			),
			 array (
				"primaryName" => 'Sugar Free',
				"valIcon" => 'sugar-free',
				"valAbb" => 'sf'
			),
			array (
				"primaryName" => 'High Protein',			
				"valIcon" => 'high-protein',
				"valAbb" => 'hp'
			),
			 array (
				"primaryName" => 'Vegan',			
				"valIcon" => 'vegan',
				"valAbb" => 've'
			),
			array (
				"primaryName" => 'Whole30',			
				"valIcon" => 'whole30',
				"valAbb" => '30'
			),
			array (
				"primaryName" => 'Paleo',			
				"valIcon" => 'paleo',
				"valAbb" => 'pal'
			),
			array (
				"primaryName" => 'Keto',			
				"valIcon" => 'keto',
				"valAbb" => 'ket'
			),
			array (
				"primaryName" => 'Quick',			
				"valIcon" => 'quick',
				"valAbb" => 'qm'
			),
			array (
				"primaryName" => 'Organic',			
				"valIcon" => 'organic',
				"valAbb" => 'org'
			),
			array (
				"primaryName" => 'Soy Free',			
				"valIcon" => 'soyfree',
				"valAbb" => 'soy'
			),
			array (
				"primaryName" => 'Corn Free',			
				"valIcon" => 'cornfree',
				"valAbb" => 'corn'
			),
			array (
				"primaryName" => 'Pescetarian',			
				"valIcon" => 'Pescetarian',
				"valAbb" => 'pescetarian'
			),
			array (
				"primaryName" => 'Low Fat',			
				"valIcon" => 'lowfat',
				"valAbb" => 'lf'
			),
			array (
				"primaryName" => 'Mediterranean',			
				"valIcon" => 'mediterranean',
				"valAbb" => 'mediterranean'
			)
		);	


		// global diets
		global $diets;
		
		//global admin options
		global $rk_options;
		
		// CHECK CURRENT WORDPRESS THEME
		//$theme = wp_get_theme();
		
		$recipekeyicon = 'recipe-key-icon';

		add_settings_section("rkp_settings_section", __('Settings', 'recipekey'), false, "rk-admin-page-2");
		add_settings_field("rkp_field_group1", __('More Settings', 'recipekey'), "RecipeKey_Admin_Settings", "rk-admin-page-2", "rkp_settings_section");
		register_setting('rkp_field_group1', 'rkp_settings');
		
		function RecipeKey_Admin_Settings() 
		{
			?>
			<div class="recipe-key-addon">
			<h3><?php _e('Blog Posts & Archive Settings','recipekey'); ?></h3>
		<p> <?php _e('Use these settings to further configure Recipe Key in your posts and archive pages.','recipekey'); ?> </p>
			
			<table id="rk_settings_table">
            <tr>
			<input type="hidden" name="" value="0" />
				<th><label for="rkTop"><?php _e('Force On Top', 'recipekey'); ?></label></th>
                <td><input disabled id="rkTop" type="checkbox" name="rkTop" value="1"> 
				<?php _e('Sometimes social plugins and jump to recipe buttons will force Recipe Key icons under them. 
				By checking this box you will force Recipe Key icons on top of other plugins. Us this to force Recipe Key on top of other plugins showing on posts.','recipekey'); ?>
				</td>
            </tr>
            <tr>
                <th><label class="description" ><?php _e('Location', 'recipekey'); ?></label></th>
                <td>
				<select disabled id="rkp_settings[rk_select]" name="rkp_settings[rk_select]" onchange="change()">
					<option value="above"> <?php _e('Below Post Title','recipekey'); ?></option>
					<option value="below"> <?php _e('Below Post Content', 'recipekey'); ?></option>
					<option value="both"> <?php _e('Both Below Title and Content', 'recipekey'); ?></option>
					<option value="none"> <?php _e('Disable/Do Not Show', 'recipekey'); ?></option>
				</select>
				<?php _e('Use the dropdown menu to select where you would like recipe key to display on your posts.', 'recipekey'); ?>
				</td>
            </tr>
			<tr>
			<input disabled type="hidden" name="" value="0" />
                <th><label class="rk-description" for="rkMain_dietname"><?php _e('Remove Name', 'recipekey'); ?></label></th>
				<td><input disabled id="rkMain_dietname" type="checkbox" name="rkMain_dietname" value="1"> 
				<?php _e('For styles Standard, Split and Block check this box if you\'d like to remove the display name keeping only the dietary icon. 
				Note this option is not available for styles that do not have a dietary icon. (Default: Off)', 'recipekey'); ?>
				</td>
            </tr>
			<tr>
			<input disabled type="hidden" name="" value="0" />
                <th><label class="rk-description" for="rkMain_dieticon"><?php _e('Remove Icon', 'recipekey'); ?></label></th>
				<td><input disabled id="rkMain_dieticon" type="checkbox" name="rkMain_dieticon" value="1"> 
				<?php _e('For styles Standard, Split and Block check this box if you\'d like to remove the dietary icon keeping only the display name. 
				Note this option is not available for styles that do not have a dietary icon. (Default: Off)', 'recipekey'); ?>
				</td>
            </tr>	
			<tr>
			<input type="hidden" name="rkFront" value="0" />
                <th><label class="rk-description" for="rkFront"><?php _e('Display On Front Page', 'recipekey'); ?></label></th>
				<td><input disabled id="rkFront" type="checkbox" name="rkFront" value="1"> 
				<?php _e('Check this box if you want Recipe Key to display on your front page. This feature requires Excerpts On. 
				Turning Excerpts On can typically be changed on your theme\'s customization page. (Default: On)', 'recipekey'); ?>
				</td>
            </tr>
			<tr>
			<input type="hidden" name="" value="0" />
                <th><label class="rk-description" for="rkArchive"><?php _e('Display On Archive & Search Pages', 'recipekey'); ?></label></th>
				<td><input disabled id="rkArchive" type="checkbox" name="rkArchive" value="1"> 
				<?php  _e('Check this box if you want Recipe Key to display on your archive pages. This feature requires that Archive pages have Excerpts On. 
				Turning Excerpts On can typically be changed on your theme\'s customization page. (Default: On)', 'recipekey'); ?>
				</td>
            </tr>
			<tr>
                <th><label class="description" for="rkLimitDisplay"><?php _e('Limit Icon Display', 'recipekey'); ?></label></th>
				<td><input disabled type="number" min="1" max="19" id="rkLimitDisplay" name="rkLimitDisplay" value="4"> 
				<?php _e('Use this option to limit the number of icons that show up under a specific post. (Default: 19) (Min 1, Max 19).', 'recipekey'); ?>
				</td>
            </tr>
			<tr>
                <th><label class="description" for="rkHideDisplay"><?php _e('Hide', 'recipekey'); ?></label></th>
				<td><input disabled type="text" id="rkHideDisplay" name="rkHideDisplay"> 
				<?php _e('Hide Recipe Key on a specific Category or Tag. I recommend creating a Tag called NoKey and adding it to any post you don\'t want Recipe Key showing up on. 
				Otherwise leave this option blank. (Default: Blank)', 'recipkey'); ?>
				</td>
            </tr>            
			</table>

			<!-- SHORTCODE SETTINGS -->
			<div class="divline"></div>
			<h3><?php _e('ShortCode Settings', 'recipekey'); ?></h3>
			<p>
			<?php _e('Use these settings to further configure Recipe Key shortcode embed. Use the shortcode <b>[recipe_key]</b> to embed Recipe Key anywhere!', 'recipekey'); ?>
			</p>

			<table id="rk_settings_table">
			<tr>
			<th><label class="rk-description" for="short-dietname"><?php _e('Remove Name', 'recipekey'); ?></label></th>
			<td><input disabled id="short-dietname" type="checkbox" name="short-dietname" value="1"> 
			<?php _e('For styles Standard, Split and Block check this box if you\'d like to remove the display name keeping only the dietary icon. 
			Note this option is not available for styles that do not have a dietary icon. (Default: Off)', 'recipekey'); ?>
			</td>
    		</tr>
			<tr>
			<th><label class="rk-description" for="rkp_settings[rkShort_dieticon]"><?php _e('Remove Icon', 'recipekey'); ?></label></th>
			<td><input disabled id="rkp_settings[rkShort_dieticon]" type="checkbox" name="rkp_settings[rkShort_dieticon]" value="1">  
			<?php _e('For styles Standard, Split and Block check this box if you\'d like to remove the display name keeping only the dietary icon. 
			Note this option is not available for styles that do not have a dietary icon.(Default: Off)', 'recipekey'); ?>
			</td>
			</tr>
			<tr>
			<th><label class="description" for="rkLimitShortDisplay"><?php _e('Limit Icon Display', 'rk_domain'); ?></label></th>
			<td><input disabled type="number" min="1" max="19" id="rkLimitShortDisplay" name="rkLimitShortDisplay" value="" />  
			<?php _e('Use this option to limit the number of Shortcode Recipe Key icons that show up under a specific post. (Default: 19) (Min 1, Max 19).', 'recipekey'); ?>
			</td>
			</tr>
			</table>

			<!-- SIDEBAR SETTINGS -->
			<div class="divline"></div>
			<h3><?php _e('Sidebar Settings', 'recipekey'); ?></h3>
			<?php _e('Use these settings to further configure Recipe Key Sidebar Widget. You can also use <b>[recipe_key_sidebar]</b> 
			shortcode to place Recipe Key Sidebar anywhere.', 'recipekey'); ?>
			<table id="rk_settings_table">
			<tr>
			<input type="hidden" name="rkSidebar_dietname" value="0" />
			<th><label class="rk-description" for="rkSidebar_dietname"><?php _e('Abbreviate Style Remove Name', 'recipekey'); ?></label></th>
			<td><input disabled id="rkSidebar_dietname" type="checkbox" name="rkSidebar_dietname" value="1">  
			<?php _e('For the Abbreviate style, if you want to remove the Display Name keeping only the Abbreviated icon check this box. (Default: Off)', 'recipekey'); ?>
			</td>
			</tr>
			<tr>
			<th><label class="description" for="rkLimitSidebar">Limit Icon Display </label></th>
			<td><input disabled type="number" min="1" max="19" id="rkLimitSidebar" name="rkLimitSidebar" value="4" />  
			<?php _e('Use this option to limit the number of Recipe Key icons that show up for the sidebar widget. (Default: 19) (Min 1, Max 19).', 'recipekey'); ?>
			</td>
			</tr>
			<tr>
				<th><label class="description" ><?php _e('Number of Columns', 'recipekey'); ?></label></th>
				<td>
				<select disabled id="rkSideColumn" name="rkSideColumn" onchange="change()">
					<option value="2">2</option>
				</select>
				<?php _e('Choose how many columns you would like Recipe Key to display in the sidebar widget. (Default: 2)', 'recipekey'); ?>
				</td>
				</tr>
				<tr>
				<th><label class="description" ><?php _e('Number of Shortcode Columns', 'recipekey'); ?></label></th>
				<td>
				<select disabled id="rkShortColumn" name="rkShortColumn" onchange="change()">
					<option value="5">5</option>
				</select>
				<?php _e('Choose how many columns you would like Recipe Key to display for it\'s shortcode. (Default: 5)', 'recipekey'); ?>
				</td>
				</tr>
			</table>
			<span style="color:red;font-size:12px;">* Some features are locked and can be accessed by upgrading to Recipe Key Premium. </span><br>
			</div>
			<?php
}
?>
		<!---BUILD ADMIN PAGE--->
		<center><strong><h1>Recipe Key</h1></strong></center>
		
		</br>
		</br>
		<div class="rk-container">
		<div class="recipe-key-admin">
		
		<div class="tab">
		<button class="tablinks" onclick="openRK(event, 'posts')"id="defaultOpen">Styles & Colors</button>
		<button class="tablinks" onclick="openRK(event, 'Settings')" >Settings</button>
		<button class="tablinks" onclick="openRK(event, 'Summary')" >Summary</button>
		<!--<button class="tablinks" onclick="openRK(event, 'premium')"><strong>Get Premium!</strong></button>-->
		</div>
		
		<form method="post" action="options.php">

<div id="Settings" class="tabcontent">
<?php 
settings_fields('rkp_field_group1');
do_settings_sections("rk-admin-page-2");
?>
</div>
</form>
<div id="posts" class="tabcontent">
		<div class="recipe-key-addon">
	 
	
	<br>
	
	<div class="rk-custom">
	<p>Use Recipe Key to increase your category/tag viewability and create better site navigation. Recipe Key can be used with ANY category or tag whether you are a food, DIY, travel blogger or an ecommerce website.  <br>
			</p>
				<br>
				<h2>Styling & Colors</h2>
			<strong>Recipe Key Configuration Steps:</strong> <br>
			<p>
			Recipe Key is extremely simple to configure, just follow the steps below:	<br>
			1. Choose your Recipe Key button style. <br>
			2. Review your <a href='<?php echo admin_url( 'edit-tags.php?taxonomy=category', 'https' ) ?>'> Categories</a> and <a href='<?php echo admin_url( 'edit-tags.php?taxonomy=post_tag', 'https' ) ?>'> Tags</a> Names and enter them below. Remember they are case sensitive (e.g. Gluten Free vs gluten-free).<br>
			3. Pick the Background, Background Hover, Font and Font Hover colors that match your theme and brand colors.<br>
			4. Save your settings.
			</p>
			<br>
	
		
		<form method="post" action="options.php">
			<?php settings_fields('rk_settings_group'); ?>
			<p>
			
			<div class="colorcus">
			
<!-- STANDARD STYLE CUSTOMIZATION -->

<?php //ADD COLOR PICKER
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_style( 'wp-color-picker' );
	?>
			
			<div class="stndbkcus">
			<strong>Standard:</strong> <input id="rk_settings[rk-css-style]" type="radio" name="rk-css-style" value="1" <?php checked(1, get_option('rk-css-style'), true); ?>>
			<br>
			<br>
			<style>
			.recipe-key-stnd-icon{ color:#353535;}
			.recipe-key-stnd-icon:hover { color:#353535;}
			.recipe-key-stnd-diet { color:<?php echo get_option('rk-gf-colorfont')?> !important;}
			.recipe-key-stnd-diet:hover { color:<?php echo get_option('rk-gf-colorfonthv')?> !important;}
			
			</style>
			<div class="recipe-key-post-wrap">
			 <a class="recipe-key-stnd"><span class="irk-gluten-free recipe-key-stnd-icon" width="25"> </span><span class="recipe-key-stnd-diet">Gluten Free</span></a>
			</div>
						
			</div>
				<br>
				
			
<!-- SPLIT STYLE CUSTOMIZATION (STYLE 2) -->
			<div class="splitbkcus">
			<strong>Split:</strong> <input id="rk_settings[rk-css-style]" type="radio" name="rk-css-style" value="2" <?php checked(2, get_option('rk-css-style'), true); ?>>
			<br>
			<br>
			<style>
			.recipe-key-font-style2{ background-color:<?php echo get_option('rk-gf-colorbk')?> !important;}
			.recipe-key-font-style2:hover { background-color:<?php echo get_option('rk-gf-colorbkhv')?> !important;}
			.recipe-key-diet-style2 { color:<?php echo get_option('rk-gf-colorfont')?> !important;}
			.recipe-key-diet-style2:hover { color:<?php echo get_option('rk-gf-colorfonthv')?> !important;}
			.recipe-key-wrap-style2 .irk-gluten-free {color: #FFF};
			
			</style>
			<div class="recipe-key-wrap-style2">
			 <a class="recipe-key-font-style2"><span class="irk-gluten-free recipe-key-icon-style2" width="25"> </span><div class="recipe-key-diet-style2">Gluten Free</div></a>
			</div>
			<br>
			
					</div>
					<br>
					
					
<!-- BLOCK STYLE 3 CUSTOMIZATION -->
					<div class="blockbkcus">	
					<strong>Block:</strong> <input id="rk_settings[rk-css-style]" type="radio" name="rk-css-style" value="3" <?php checked(3, get_option('rk-css-style'), true); ?>>
						<br>
						<br>
						<style>
						.recipe-key-font-style3{ background-color:<?php echo get_option('rk-gf-colorbk')?> !important;}
						.recipe-key-font-style3:hover { background-color:<?php echo get_option('rk-gf-colorbkhv')?> !important;}
						.recipe-key-diet-style3 { color:<?php echo get_option('rk-gf-colorfont');?> !important;}
						.recipe-key-diet-style3:hover { color:<?php echo get_option('rk-gf-colorfonthv'); ?> !important;}
						.recipe-key-wrap-style3 .irk-gluten-free {color: #FFF};
						
						</style>
						<div class="recipe-key-wrap-style3">
						<a class="recipe-key-font-style3"><span class="irk-gluten-free recipe-key-icon-style3" width="25"></span><span class="recipe-key-diet-style3">Gluten Free</span></a>
						</div>
						
							</div>
					
<!-- SIMPLE STYLE 4 CUSTOMIZATION -->
					<div class="simplebkcus">	
					<strong>Abbreviate:</strong> <input id="rk_settings[rk-css-style]" type="radio" name="rk-css-style" value="4" <?php checked(4, get_option('rk-css-style'), true); ?>>
						<br>
						<br>
						<style>
						.recipe-key-font-style4{ background-color:<?php echo get_option('rk-gf-colorbk')?> !important;}	
						.recipe-key-font-style4:hover { background-color:<?php echo get_option('rk-gf-colorbkhv')?> !important;}
						.recipe-key-diet-style4 { color:<?php echo get_option('rk-gf-colorfont');?> !important;}
						.recipe-key-diet-style4:hover { color:<?php echo get_option('rk-gf-colorfonthv'); ?> !important;}
						</style>
						<div class="recipe-key-wrap-style4">
						<a class="recipe-key-font-style4"><span class="recipe-key-icon-style4" width="25"></span><span class="recipe-key-diet-style4">GF</span></a>
						</div>
							</div>

							<!-- NAME ONLY STYLE 5 CUSTOMIZATION -->
							
					<div class="namebkcus">	
					<strong>Name:</strong> <input id="rk_settings[rk-css-style]" type="radio" disabled name="rk-css-style" value="5" <?php checked(5, get_option('rk-css-style'), true); ?>>
						<br>
						<br>
						<style>
						.namebkcus .recipe-key-font-style5{ background-color:<?php echo get_option('rk-gf-colorbk')?> ;}	
						.namebkcus .recipe-key-font-style5:hover { background-color:<?php echo get_option('rk-gf-colorbkhv')?> ;}
						.namebkcus .recipe-key-diet-style5 { color:<?php echo get_option('rk-gf-colorfont');?> ;}
						.namebkcus .recipe-key-diet-style5:hover { color:<?php echo get_option('rk-gf-colorfonthv'); ?> ;}
						</style>
						<div class="recipe-key-wrap-style5">
						<a class="recipe-key-font-style5"><span class="recipe-key-icon-off"></span><span class="recipe-key-diet-style5"><span>Gluten Free</span></span></a>
						</div>
					</div>

					<!-- WHOLE SIMPLE STYLE6 CUSTOMIZATION -->
					<div class="wholebkcus">	
					<strong>Whole:</strong> <input id="rk_settings[rk-css-style]" type="radio" disabled name="rk-css-style" value="6" <?php checked(6, get_option('rk-css-style'), true); ?>>
						<br>
						<br>
						<style>
						.wholebkcus .recipe-key-font-style6{ background-color:<?php echo get_option('rk-gf-colorbk')?> ;}	
						.wholebkcus .recipe-key-font-style6:hover { background-color:<?php echo get_option('rk-gf-colorbkhv')?> ;}
						.wholebkcus .recipe-key-diet-style6 { color:<?php echo get_option('rk-gf-colorfont');?> ;}
						.wholebkcus .recipe-key-diet-style6:hover { color:<?php echo get_option('rk-gf-colorfonthv'); ?> ;}
						</style>
						<a class="recipe-key-font-style6"><span class="recipe-key-diet-style6"><span>Gluten Free</span></span></a>
					</div>
	
					</div> <!--end of colorcus class-->		
					
<div class="divline"></div>

<strong>Customize Taxonomy (Categories and Tags) & Colors</strong>
<p>
Fill out with your Wordpress Categories/Tag Names and how you'd like to display those Names.<br>
Category/Tag Names are case sensitive (e.g. Gluten Free, Gluten-Free or GF). <br><br>
</p>
											
<?php

$taxoutput = '';
echo '<div class="row" style="text-align:center">';
echo '<span style="font-size:14px; font-weight:600;">';
echo '<div class="rk-column-order"> Order <br> (1-19)</div>';
echo '<div class="rk-column-icon">Icon</div>';
echo '<div class="rk-column-color">Icon Color</div>';
echo '<div class="rk-column-value">Category/Tag Name</div>';
echo '<div class="rk-column-value">Display Name</div>';
echo '<div class="rk-column-color">Bkgrd Color</div>';
echo '<div class="rk-column-color">Bkgrd Color Hover</div>';
echo '<div class="rk-column-color">Font Color</div>';
echo '<div class="rk-column-color">Font Color Hover</div>';
echo '</span></div>';
$i = '1';

if(is_array($diets)) {
	foreach ($diets as $diet) {
 
		
		$valName = ''; if (isset($diet['valName'])) { $valName =  esc_html(get_option($diet['valName'])); }
		$valDisplay = ''; if (isset($diet['valDisplay'])) { $valDisplay =  esc_html(get_option($diet['valDisplay'])); }
		if (isset($diet['valColorBk'])) { $valColorBk = esc_html(get_option($diet['valColorBk'])); }
		if (isset($diet['valColorBkHover'])) { $valColorBkHover = esc_html($diet['valColorBkHover']); }
		if (isset($diet['valColorFont'])) { $valColorFont = esc_html($diet['valColorFont']); }
		if (isset($diet['valColorFontHover'])) { $valColorFontHover = esc_html($diet['valColorFontHover']); }

		echo '<div class="row">';
		echo '<div class="rk-column-order"><input type="number" min="1" max="17" disabled  style="width:50px;" value="'.$i.'"/></div>';
		echo '<div class="rk-column-icon"><span class="irk-'.$diet['valIcon'].' recipe-key-icon" alt="'. $valName .' Recipe Symbol"></span></div>';

		echo '<div class="rk-column-color-lite"><input name="rk-'. $diet['valAbb'] .'-iconcolor" type="text" id="rk-'. strtolower($diet['valAbb']) .'-iconcolor" value="#ccc" data-default-color="#7064b8"></div>';


		echo '<div class="rk-column-value"><input type="text" id="rk_settings['. $diet['valName'] .']" name="'. $diet['valName'] .'" style="width:170px;" value="'. $valName .'" /></div>';
		echo '<div class="rk-column-value"><input type="text" id="rk_settings['.$diet['valDisplay'].']" name="'.$diet['valDisplay'].'" style="width:170px;" value="'. $valDisplay.'" /></div>';
		
		echo '<div class="rk-column-color"><input name="'. $diet['valColorBk'] .'" type="text" id="'. $diet['valColorBk'] .'" value="'.esc_attr(get_option($diet['valColorBk'])).'" data-default-color="#7064b8"></div>';
		
		echo '<div class="rk-column-color"><input name="'. $diet['valColorBkHover'] .'" type="text" id="'. $diet['valColorBkHover'] .'" value="'.esc_attr(get_option($diet['valColorBkHover'])).'" data-default-color="#7064b8"></div>';
		
		echo '<div class="rk-column-color"><input name="'. $diet['valColorFont'] .'" type="text" id="'. $diet['valColorFont'] .'" value="'.esc_attr(get_option($diet['valColorFont'])) .'" data-default-color="#7064b8"></div>';
		
		echo '<div class="rk-column-color"><input name="'. $diet['valColorFontHover'] .'" type="text" id="'. $diet['valColorFontHover'] .'" value="'.esc_attr(get_option($diet['valColorFontHover'])) .'" data-default-color="#7064b8"></div>';
		echo'</div>';
		$i++;
	}
}
	$i = '5';
	if(is_array($admindiets)) {
		foreach ($admindiets as $admindiet) {
		
		echo '<div class="row">';
		echo '<div class="rk-column-order"><input type="number" min="1" max="17" disabled  style="width:50px;" value="'.$i.'"/></div>';
		echo '<div class="rk-column-icon"><span class="irk-'.$admindiet['valIcon'].' recipe-key-icon"></span></div>';

		echo '<div class="rk-column-color-lite"><input name="rk-'. $admindiet['valAbb'] .'-iconcolor" type="text" id="rk-'. $admindiet['valAbb'] .'-iconcolor" value="#ccc" data-default-color="#7064b8"></div>';

		echo '<div class="rk-column-value"><input type="text" disabled id="'. $admindiet['primaryName'] .'" name="'. $admindiet['primaryName'] .'" value="'. $admindiet['primaryName'] .'" /></div>';
		echo '<div class="rk-column-value"><input type="text" disabled id="'.$admindiet['primaryName'].'" name="'.$admindiet['primaryName'].'" value="'. $admindiet['primaryName'] .'" /></div>';
		
		echo '<div class="rk-column-color-lite"><input name="rk-'. $admindiet['valAbb'] .'-colorbk" type="text" id="rk-'. $admindiet['valAbb'] .'-colorbk" value="#ccc" data-default-color="#7064b8"></div>';
		
		echo '<div class="rk-column-color-lite"><input name="rk-'. $admindiet['valAbb'] .'-colorbkhv" type="text" id="rk-'. $admindiet['valAbb'] .'-colorbkhv" value="#ccc" data-default-color="#7064b8"></div>';
		
		echo '<div class="rk-column-color-lite"><input name="rk-'. $admindiet['valAbb'] .'-colorfont" type="text" id="rk-'. $admindiet['valAbb'] .'-colorfont" value="#ccc" data-default-color="#7064b8"></div>';
		
		echo '<div class="rk-column-color-lite"><input name="rk-'. $admindiet['valAbb'] .'-colorfonthv" type="text" id="rk-'. $admindiet['valAbb'] .'-colorfonthv" value="#ccc" data-default-color="#7064b8"></div>';

		echo'</div>';
		$i++;
		}
	}


?>
<span style="color:red;font-size:12px;">* Some features are locked and can be accessed by upgrading to Recipe Key Premium. </span><br>
<br>



</div>
</div>

		
</div> <!-- end posts tab -->

<div id="premium" class="tabcontent">
<div class="recipe-key-addon">
<br>
	<div align="center" style="color:#7064b8; font-size:20px"><strong>Upgrade to <a href="http://recipekeyplugin.com" target="_blank">Recipe Key Premium</a> and gain access to:</strong></div>
	</br>
	<div style="color:#7064b8; font-size:20px"><strong>
	- Have Up To 17 Fully Customizable Categories or Tags with Customizable Display Names!
	</br></br>
	- Have Up To 17 Different Icons!
	</br></br>
	- Fully Customizable Display Names!
	</br></br>
	- Choose From 6 Different Styles!
	</br></br>
	- Built for Google's Core Web Vital Compliance!
	</br></br>
	- WooCommerce Integration!
	</br></br>
	- ShortCode, Place Recipe Key Anywhere!
	</br></br>
	- More Icons (Including Whole30, Keto, Vegan & Paleo)!
	</br></br>
	- Additional Customization (Including Adjustable Positions and Foodie Pro Integration)!
	</br></br>
	- Email Support!
	</strong></div>
	</br>
	<div align="center" style="color:#7064b8; font-size:20px"><strong>** <a href="https://recipekeyplugin.com/" target="_blank">Learn More About Recipe Key Premium</a> **</strong></div>
	
	
	</div>
	</div>


<div id="Summary" class="tabcontent">
<div class="recipe-key-addon">
<h2>Summary</h2>
		<?php
		
	
		// BUILD SUMMARY PAGE
		foreach ($diets as $diet) {
			echo '<div class="recipe-key-wrapper">';
			
			$valName = esc_attr(get_option($diet['valName']));
		
			$category_id = get_term_by('name', $valName, 'category');
			$tag_id = get_term_by('name', $valName, 'post_tag');
			 
				if (isset($category_id->name) && $category_id->name === $valName) {
					$category_link = get_category_link( $category_id );
					if ($category_link !==0 && $category_link !== null)  {
						echo '<span class="irk-'.$diet['valIcon'].' recipe-key-icon" alt="'.$valName.' Recipe Symbol"></span> <img src="'. esc_url( plugins_url( 'images/checkmark.png', __FILE__ ) ) .'" alt="Checkmark Icon" width="25" class="admin-recipe-check"><br>	';
						echo 'Taxonomy Title: ' . $category_id->name . '<br>';
						echo 'Taxonomy Link: <a href="'. esc_url( $category_link ).'">'. $category_link . '</a><br>';
						}
				} elseif (isset($tag_id->name) && $tag_id->name === $valName) {
					$tag_link = get_tag_link($tag_id);
					if ($tag_link !==0 && $tag_link !== null) {
						echo '<span class="irk-'.$diet['valIcon'].' recipe-key-icon" alt="'.$valName.' Recipe Symbol"></span> <img src="'. esc_url( plugins_url( 'images/checkmark.png', __FILE__ ) ) .'" alt="Checkmark Icon" width="25" class="admin-recipe-check"><br>';
						echo 'Taxonomy Title: ' . $tag_id->name . '<br>';
						echo 'Taxonomy Link: <a href="'. esc_url( $tag_link ).'">' . $tag_link . '</a><br>';
					}
				} else {
					echo '<span class="irk-'.$diet['valIcon'].' recipe-key-icon" alt="'.$valName.' Not Found"></span> <img src="'. esc_url( plugins_url( 'images/redx.png', __FILE__ ) ) .'" alt="Red X" width="25" class="recipe-x-icon"><br>';
					echo 'Taxonomy Title: ' . $valName . '<br>';
					echo 'Cannot Find Tag, Category and/or Slug for this entry. ';
			}
			echo '<br/>';
			echo '</div>';
		}
		
	foreach ($admindiets as $admindiet) {
		echo '<div class="recipe-key-wrapper">';

		
				echo '<span class="irk-'.$admindiet['valIcon'].' recipe-key-icon"></span><img src="'. esc_url( plugins_url( 'images/redx.png', __FILE__ ) ) .'" alt="Red X" class="recipe-x-icon" width="25"><br>';
				_e('Upgrade to Premium For Additional Icons.', 'recipekey');
			
		echo '<br/>';
		echo '</div>';
	}
		echo '<br/>';
		echo '<br/>';
	
	?>
</div>	
<span style="font-size:12px;color:red">* Get Additional Icons with Premium. </span><br>
	</div>
		<!---SAVE SETTINGS -->
	<div class="recipe-key-addon">
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Settings', 'rk_domain'); ?>" />
			</p>
 </div>
		</form>	
	</div>
<div class="rk-admin-prem"> 
<div  style="font-size:18px;color:purple;text-align:center;">Upgrade to Recipe Key Premium</div>
<ul class="rk-admin-prem-in">
<li>+ Help visitors find more of what they want</li>
<li>+ Increase your categories viewability</li>
<li>+ Create superior site navigation</li>
<li>+ Access Additional Icons and settings</li>
<li>+ WooCommerce integration</li>
<li>+ Built for Google core web vitals</li>
<li>+ Email support</li>
<li>+ No ads!</li>
</ul>
<a href="https://recipekeyplugin.com" target="_blank"><button class="rk-admin-prem-button">Get Recipe Key Premium</button></a>
</div>

</div>

<script>
window.onload = function () {
                startTab();
            };
			
			function startTab() {

  document.getElementById("defaultOpen").click();
}



function openRK(evt, tabName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

 // Get all elements with class="tablinks" and remove the class "active"
 tablinks = document.getElementsByClassName("tablinks");
 for (i = 0; i < tablinks.length; i++) {
   tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}


</script>

<?php
}

}
?>