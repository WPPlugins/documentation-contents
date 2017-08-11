<?php
/*  Copyright 2012  SARAH BIRD  (email : sarah@bonvaya.com)

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License, version 2, as
 published by the Free Software Foundation.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

function the_admin_menu() {
	add_options_page('Settings for Documentation Contents', 'Documentation Contents', 'manage_options', 'documentation-contents', 'build_settings_page');
}

function build_settings_page() {
	if (!current_user_can('manage_options')) {
		wp_die(__('You do not have sufficient permissions to access this page.'));
	}
	
	?>
	<div class="wrap">
		<h2>Documentation Contents Settings</h2>
		<form method="post" action="options.php">
			<?php settings_fields('doccon_settings'); ?>
			<?php do_settings_sections('doccon_settings'); ?>
			<p>Contents Header  <input type="text" name="doccon_title_prefix" value="<?php echo get_option('doccon_title_prefix'); ?>"/> (Default: Table of Contents)</p>
			<p>Default Category <input type="text" name="doccon_default_parent_category" value="<?php echo get_option('doccon_default_parent_category'); ?>"/> (Default: None)</p>
			<p>Specify order with Custom Field <input type="text" name="doccon_custom_order_field_name" value="<?php echo get_option('doccon_custom_order_field_name'); ?>"/> (Default: Alphabetical)</p>
				  <?php submit_button();?>
		</form></div><?php
		
	$instructions = file_get_contents(dirname(__FILE__) . '/options_instructions.html');
	echo $instructions;
}

function register_settings(){	
	register_setting( 'doccon_settings', 'doccon_title_prefix');
	register_setting( 'doccon_settings', 'doccon_default_parent_category');
	register_setting( 'doccon_settings', 'doccon_custom_order_field_name');
}
?>
