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
class DocumentationContents {
	/*
	 * Extract shortcode attributes, initialize variables & display documentation 
	 */
	public function documentation_contents_init($atts) {
		
		//wordpress function to extract the shortcode attributes
		extract(shortcode_atts(array('tag' => NULL, 'parentcat' => get_option('doccon_default_parent_category'), ), $atts));
	
		//if parent category is still not defined set it to NULL
		if (!$parentcat) {$parent_cat = NULL;}
	
		//make a new DocumentationContents
		$documentation_contents = new DocumentationContents($tag, $parentcat);
		
		//display the contents
		$documentation_contents->display_documentation();
	}
	
	function __construct($tag, $parentcat) {
		$this->set_version_name_and_id_and_description($tag);
		$this->set_product_name_and_id($parentcat);
		$this ->set_title();
	}
	
	private $title; //$title is the title for the documentation
	private $version_name; 	//$version_name is the "pretty" version name
	private $version_slug;
	private $version_description; //$version_description brings up a pop-up with version information
	private $product_name; //$product is optional it is the "pretty" name of the parent CategoryID in case of wanting to do multiple documentation groups
	private $product_id;
	
	/*
	 * Get the pretty version name
	 */
	private function set_version_name_and_id_and_description($tag) {
		$version_info = get_term_by('slug', $tag, 'post_tag');
		if ($version_info) {
			$version_name = $version_info -> name;
			$version_slug = $version_info -> slug;
			$version_description = $version_info -> description;
		} else {
			$version_name = '**Please define a tag in your shortcode reference e.g. [documentation-contents tag="version1"]**';
			$version_slug = NULL;
		}
		//Set $this->version_name
		$this->version_name = $version_name;
		$this->version_slug = $version_slug;
	}

	private function set_product_name_and_id($parentcat) {
		$parent_cat_info = get_term_by( 'slug', $parentcat, 'category' );
		if($parent_cat_info){
			$product_name = $parent_cat_info-> name;
			$product_id = $parent_cat_info -> term_id;
		} else {
			$product_name = NULL;
			$product_id = NULL; 
		}
		//Set $this->product_name & product_id
		$this->product_name = $product_name;
		$this->product_id = $product_id;
	}
		

	private function set_title() {
		//TODO - Add in a pop-up with description information
		$header_prefix = get_option('doccon_title_prefix');
		if (!$header_prefix) {$header_prefix = 'Table of Contents';}//Default to Table of Contents
	
		if ($this->product_name){
		    //prepend the product name (parent category name) to the version_name so we have things like Server v1.0. Mobile v2.0
			$title = $header_prefix . ' for ' . $this->product_name . ' ' . $this -> version_name;
		} else {
			$title = $header_prefix . ' for ' . $this -> version_name;
		}
		$this->title = $title;
	}
		
	/*
	 * Does the heavy lifting of displaying the chapters
	 */
	private function display_documentation() {
		
		//display the title
		?><h2><?php echo $this -> title ?></h2><?php
				
		//Get the categories
		$catargs = array( 'child_of' => $this->product_id );
		$thecats = get_categories( $catargs );
		$meta_key = get_option('doccon_custom_order_field_name');

		foreach ( $thecats as $thecat ) {
			
			//Get the posts for this category and this version
			global $post;
			//We order by custom_field_name if specified
			if ($meta_key) {
				$postargs = array( 'numberposts' => -1, 'category' => $thecat->term_id, 'tag' => $this->version_slug, 'order' => 'ASC', 'orderby' => 'meta_value', 'meta_key' => $meta_key );
			} else {
				 $postargs = array( 'numberposts' => -1, 'category' => $thecat->term_id, 'tag' => $this->version_slug);
			}
			
			//we also don't want to double display when we have product_id = 0 situation so
			//this seems like there must be a better way
			if ($thecat->parent == "0" && $this->product_id === NULL) {
			    $theposts = get_posts( $postargs );
			} elseif ($this->product_id !== NULL) {
				$theposts = get_posts( $postargs );
			} else {
				$theposts = NULL;
			}
			
			//don't display anything if there are no posts - this is necessary because we may still have categories that are part of $thecats because there are posts in other versions, but when 
			//we get tags and also filter on the version(tag) then there may be none and we don't want to display an
			//empty category heading
			

			if(count($theposts)>0){
			//Display Category heading
  			?><h3><?php ; echo $thecat->cat_name; ?></h3><?php  
			//Make a bulleted list of all the posts 
  			?><ul><?php
			foreach ( $theposts as $post ) : setup_postdata($post); 
				?><li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li><?php
			endforeach; 
			?></ul><?php				
			}
		} //end category loop
	
	}

}
?>
