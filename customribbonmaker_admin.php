<?php

if (current_user_can('manage_options'))  {
	
	define("TEXT_DOMAIN", "custom-ribbon-maker");	
	    
  	echo '<div class="wrap">';
  	echo '<div id="icon-themes" class="icon32"><br /></div>';
  	echo '<h2>Custom Ribbon Maker</h2><br />';  

	if (isset($_POST['rm_start_color'])) {
		update_option('rm_text', $_POST['rm_text']);
		update_option('rm_url', $_POST['rm_url']);
		update_option('rm_font', $_POST['rm_font']);
		update_option('rm_min_width', $_POST['rm_min_width']);
		update_option('rm_color', $_POST['rm_color']);
		if (isset($_POST['rm_underline']) && $_POST['rm_underline']) {
			update_option('rm_underline', 'underline');
		} else {
			update_option('rm_underline', 'none');
		}
		if (isset($_POST['rm_fixed']) && $_POST['rm_fixed']) {
			update_option('rm_fixed', 'fixed');
		} else {
			update_option('rm_fixed', 'absolute');
		}
		update_option('rm_start_color', $_POST['rm_start_color']);
		update_option('rm_end_color', $_POST['rm_end_color']);
		update_option('rm_position', $_POST['rm_position']);
		if ($_POST['rm_position'] == 'topright') {
			update_option('rm_rotation', '45deg');
			update_option('rm_vertical', 'top');
			update_option('rm_horizontal', 'right');
		}
		if ($_POST['rm_position'] == 'topleft') {
			update_option('rm_rotation', '-45deg');
			update_option('rm_vertical', 'top');
			update_option('rm_horizontal', 'left');
		}
		if ($_POST['rm_position'] == 'bottomright') {
			update_option('rm_rotation', '-45deg');
			update_option('rm_vertical', 'bottom');
			update_option('rm_horizontal', 'right');
		}
		if ($_POST['rm_position'] == 'bottomleft') {
			update_option('rm_rotation', '45deg');
			update_option('rm_vertical', 'bottom');
			update_option('rm_horizontal', 'left');
		}
		update_option('rm_vertical_margin', $_POST['rm_vertical_margin']);
		update_option('rm_horizontal_margin', $_POST['rm_horizontal_margin']);
		update_option('rm_padding', $_POST['rm_padding']);
		update_option('rm_width', $_POST['rm_width']);
		update_option('rm_shadow', $_POST['rm_shadow']);
		update_option('rm_shadow_str', $_POST['rm_shadow_str']);
		update_option('rm_visibility', $_POST['rm_visibility']);
		if (isset($_POST['rm_target']) && $_POST['rm_target']) {
			update_option('rm_target', '_blank');
		} else {
			update_option('rm_target', '');
		}
	}
	
	update_option('rm_text', ($x = get_option('rm_text')) ? $x : 'YOUR TEXT HERE');
	update_option('rm_shadow', ($x = get_option('rm_shadow')) ? $x : 'rgba(255,255,255,0.5) 0px 1px 0px');
	update_option('rm_shadow_str', ($x = get_option('rm_shadow_str')) ? $x : '1.0');
	update_option('rm_url', ($x = get_option('rm_url')) ? $x : '/');
	update_option('rm_font', ($x = get_option('rm_font')) ? $x : 'bold 15px Sans-Serif');
	update_option('rm_min_width', ($x = get_option('rm_min_width')) ? $x : '0');
	update_option('rm_color', ($x = get_option('rm_color')) ? $x : '#000000');
	update_option('rm_underline', ($x = get_option('rm_underline')) ? $x : '');
	update_option('rm_start_color', ($x = get_option('rm_start_color')) ? $x : '#e8ff69');
	update_option('rm_end_color', ($x = get_option('rm_end_color')) ? $x : '#c8d600');
	update_option('rm_position', ($x = get_option('rm_position')) ? $x : 'topright');	
	update_option('rm_vertical', ($x = get_option('rm_vertical')) ? $x : 'top');
	update_option('rm_horizontal', ($x = get_option('rm_horizontal')) ? $x : 'right');
	update_option('rm_vertical_margin', (get_option('rm_vertical_margin') !== false) ? get_option('rm_vertical_margin') : '60');
	update_option('rm_horizontal_margin', (get_option('rm_horizontal_margin') !== false) ? get_option('rm_horizontal_margin') : '-70');
	update_option('rm_padding', ($x = get_option('rm_padding')) ? $x : '17');
	update_option('rm_width', ($x = get_option('rm_width')) ? $x : '320');
	update_option('rm_visibility', ($x = get_option('rm_visibility')) ? $x : 'all');
	update_option('rm_target', ($x = get_option('rm_target')) ? $x : '');

	echo '<form action="#" method="POST">';
	echo '<table>';

	echo '<tr style="height:30px"><td style="width:150px">'.__('Text', TEXT_DOMAIN).'</td>';
		echo '<td><input type="text" name="rm_text" style="width:250px" value="'.get_option('rm_text').'" /></td></tr>';
	echo '<tr style="height:30px"><td style="width:150px">'.__('Hyperlink', TEXT_DOMAIN).'</td>';
		echo '<td><input type="text" name="rm_url" style="width:250px" value="'.get_option('rm_url').'" /></td></tr>';
	echo '<tr style="height:30px"><td style="width:150px">'.__('New Window?', TEXT_DOMAIN).'</td>';
		echo '<td><input type="checkbox" name="rm_target" '.(get_option('rm_target') == '_blank' ? 'CHECKED' : '').' /></td></tr>';
	echo '<tr style="height:30px"><td style="width:150px">'.__('Minimum window width', TEXT_DOMAIN).'</td>';
		echo '<td><input type="text" name="rm_min_width" style="width:250px" value="'.get_option('rm_min_width').'" /> (pixels)</td></tr>';
	echo '<tr style="height:30px"><td style="width:150px">'.__('Font', TEXT_DOMAIN).'</td>';
		echo '<td><input type="text" name="rm_font" style="width:250px" value="'.get_option('rm_font').'" /></td></tr>';
	echo '<tr style="height:30px"><td style="width:150px">'.__('Underline', TEXT_DOMAIN).'</td>';
		echo '<td><input type="checkbox" name="rm_underline" '.(get_option('rm_underline') == 'underline' ? 'CHECKED' : '').' /></td></tr>';
	echo '<tr style="height:30px"><td style="width:150px">'.__('Fixed', TEXT_DOMAIN).'</td>';
		echo '<td><input type="checkbox" name="rm_fixed" '.(get_option('rm_fixed') == 'fixed' ? 'CHECKED' : '').' /></td></tr>';
	echo '<tr style="height:30px"><td style="width:150px">'.__('Text colour', TEXT_DOMAIN).'</td>';
		echo '<td><input type="text" name="rm_color" value="'.get_option('rm_color').'" class="my-color-field" /></td></tr>';
	echo '<tr style="height:30px"><td style="width:150px">'.__('Glow', TEXT_DOMAIN).'</td>';
		echo '<td><input type="text" name="rm_shadow" value="'.get_option('rm_shadow').'" class="my-color-field" /></td></tr>';
	echo '<tr style="height:30px"><td style="width:150px">'.__('Glow alpha', TEXT_DOMAIN).'</td>';
		echo '<td><input type="text" name="rm_shadow_str" style="width:50px" value="'.get_option('rm_shadow_str').'" /></td></tr>';		
	echo '<tr style="height:30px"><td style="width:150px">'.__('Start colour', TEXT_DOMAIN).'</td>';
		echo '<td><input type="text" name="rm_start_color" value="'.get_option('rm_start_color').'" class="my-color-field" /></td></tr>';
	echo '<tr style="height:30px"><td style="width:150px">'.__('End colour', TEXT_DOMAIN).'</td>';
		echo '<td><input type="text" name="rm_end_color" value="'.get_option('rm_end_color').'" class="my-color-field" /></td></tr>';
	echo '<tr style="height:30px"><td style="width:150px">'.__('Position', TEXT_DOMAIN).'</td>';
		echo '<td>';
		$r = get_option('rm_position') ? get_option('rm_position') : "top-right";
		echo '<select name="rm_position">';
		echo '<option value="topright" '.($r == 'topright' ? 'SELECTED' : '').'>Top right</option>';
		echo '<option value="topleft"'.($r == 'topleft' ? 'SELECTED' : '').'>Top left</option>';
		echo '<option value="bottomleft"'.($r == 'bottomleft' ? 'SELECTED' : '').'>Bottom left</option>';
		echo '<option value="bottomright"'.($r == 'bottomright' ? 'SELECTED' : '').'>Bottom right</option>';
		echo '</select>';
		echo '</td></tr>';
	echo '<tr style="height:30px"><td style="width:150px">'.__('Length', TEXT_DOMAIN).'</td>';
		echo '<td><input type="text" name="rm_width" style="width:50px" value="'.get_option('rm_width').'" /> pixels</td></tr>';
	echo '<tr style="height:30px"><td style="width:150px">'.__('Vertical Margin', TEXT_DOMAIN).'</td>';
		echo '<td><input type="text" name="rm_vertical_margin" style="width:50px" value="'.get_option('rm_vertical_margin').'" /> pixels</td></tr>';
	echo '<tr style="height:30px"><td style="width:150px">'.__('Horizontal Margin', TEXT_DOMAIN).'</td>';
		echo '<td><input type="text" name="rm_horizontal_margin" style="width:50px" value="'.get_option('rm_horizontal_margin').'" /> pixels</td></tr>';
	echo '<tr style="height:30px"><td style="width:150px">'.__('Padding', TEXT_DOMAIN).'</td>';
		echo '<td><input type="text" name="rm_padding" style="width:50px" value="'.get_option('rm_padding').'" /> pixels</td></tr>';
	echo '<tr style="height:30px"><td style="width:150px">'.__('Visibility', TEXT_DOMAIN).'</td>';
		echo '<td>';
		$r = get_option('rm_visibility') ? get_option('rm_visibility') : "all";
		echo '<select name="rm_visibility">';
		echo '<option value="all" '.($r == 'all' ? 'SELECTED' : '').'>Always</option>';
		echo '<option value="loggedin"'.($r == 'loggedin' ? 'SELECTED' : '').'>Logged in users only</option>';
		echo '<option value="visitors"'.($r == 'visitors' ? 'SELECTED' : '').'>Visitors only</option>';
		echo '</select>';
		echo '</td></tr>';

	echo '<tr><td colspan="2" style="padding-top:40px"><input type="submit" class="button-primary" value="'.__('Save', TEXT_DOMAIN).'" /></td></tr>';
	echo '</table>';
  	echo '</div>';
  	echo '</form>';
  	
}
  	

  	




?>
