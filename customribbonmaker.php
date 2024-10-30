<?php
/*
Plugin Name: Custom Ribbon Maker
Plugin URI: http://www.simongoodchild.com
Description: Add a custom ribbon to your site, set your own position, colours, text, link, visibility, etc
Author: Simon Goodchild
Version: 1.5
Author URI: http://www.simongoodchild.com
*/


function ribbon_maker() {

	global $current_user;

	$visitor = get_option('rm_visibility');
	if ( ($visitor == 'all') || ($visitor == 'visitors' && (!is_user_logged_in())) || ($visitor == 'loggedin' && (is_user_logged_in())) ) {

		echo '<a class="ribbon-maker" target="'.get_option('rm_target').'" href="'.get_option('rm_url').'">';
		echo get_option('rm_text');
		echo '</a>';
		
		echo '<style>';
		
			echo '.ribbon-maker {';
			echo '  text-decoration:'.get_option('rm_underline').' !important;';
			echo '  font: '.get_option('rm_font').' !important;';
			echo '  color: '.get_option('rm_color').' !important;';
			echo '  text-align: center;';
			$s = rm_hex2rgb(str_replace('#', '', get_option('rm_shadow')));
			echo '  text-shadow: 0px 0px 3px rgba('.$s['r'].','.$s['g'].','.$s['b'].','.get_option('rm_shadow_str').');';
			echo '  -webkit-transform: rotate('.get_option('rm_rotation').');';
			echo '  -moz-transform:    rotate('.get_option('rm_rotation').');';
			echo '  -ms-transform:     rotate('.get_option('rm_rotation').');';
			echo '  -o-transform:      rotate('.get_option('rm_rotation').');';
			echo '  transform:         rotate('.get_option('rm_rotation').');';
			echo '  position: '.get_option('rm_fixed').';';
			echo '  z-index:999999;';
			echo '  padding: '.get_option('rm_padding').'px 0;';
			echo '  '.get_option('rm_vertical').': '.get_option('rm_vertical_margin').'px;';
			echo '  '.get_option('rm_horizontal').': '.get_option('rm_horizontal_margin').'px;';
			echo '  width: '.get_option('rm_width').'px;';
			echo '  background-color: '.get_option('rm_start_color').';';
			echo '  background-image: -webkit-gradient(linear, left top, left bottom, from('.get_option('rm_start_color').'), to('.get_option('rm_end_color').'));';
			echo '  background-image: -webkit-linear-gradient(top, '.get_option('rm_start_color').', '.get_option('rm_end_color').');';
			echo '  background-image:    -moz-linear-gradient(top, '.get_option('rm_start_color').', '.get_option('rm_end_color').');';
			echo '  background-image:     -ms-linear-gradient(top, '.get_option('rm_start_color').', '.get_option('rm_end_color').');';
			echo '  background-image:      -o-linear-gradient(top, '.get_option('rm_start_color').', '.get_option('rm_end_color').');';
			echo '  -webkit-box-shadow: 0px 0px 3px rgba(0,0,0,0.3);';
			echo '  -moz-box-shadow:    0px 0px 3px rgba(0,0,0,0.3);';
			echo '  box-shadow:         0px 0px 3px rgba(0,0,0,0.3);';
			echo '}';
        
            echo '@media all and (max-width: '.get_option('rm_min_width').'px) { .ribbon-maker { display: none !important; } }'; 
			
		echo '</style>';	

	}
	
}

if (!is_admin()) {
	add_action('wp_head', 'ribbon_maker');
} else {
	add_action( 'admin_menu', 'ribbon_maker_add_to_admin_menu' );
	add_action( 'admin_enqueue_scripts', 'ribbon_maker_enqueue_color_picker' );
}
function ribbon_maker_add_to_admin_menu(){
    add_menu_page( 'Ribbon Maker', 'Ribbon Maker', 'manage_options', 'custom-ribbon-maker/customribbonmaker_admin.php' );
}
function ribbon_maker_enqueue_color_picker( ) {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-script', plugins_url('customribbonmaker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}
function rm_hex2rgb($hexString){
	if(strlen($hexString)==6){
		list($r,$g,$b) = str_split($hexString,2);
		return Array("r"=>hexdec($r),"g"=>hexdec($g),"b"=>hexdec($b));
	}
	return false;
}
?>
