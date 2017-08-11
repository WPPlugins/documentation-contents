<?php
/*
 Plugin Name: Documentation Contents
 Plugin URI: http://sarahbird.org/documentation-contents
 Description: Create a table of contents for your documentation. Mark your posts with multiple tags so you don't have to duplicate posts to create a new version of your documentation when you have a version upgrade. Put your posts in categories to order your documentation into chapters. Optionally use a custom field for fine-grained control over the order of your posts.
 Version: 1.0.0
 Author: Sarah Bird
 License: GPL2

 Copyright 2012  SARAH BIRD  (email : sarah@bonvaya.com)

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

require_once (dirname(__FILE__) . '/options.php');
require_once (dirname(__FILE__) . '/documentation-contents.php');

/*register the Documentation as a shortcut as a shortcode*/
add_shortcode('documentation-contents', array('DocumentationContents', 'documentation_contents_init'));

/*add the admin dashboard admin menu*/
add_action('admin_menu', 'the_admin_menu');
add_action('admin_init', 'register_settings');

?>
