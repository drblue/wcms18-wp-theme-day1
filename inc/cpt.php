<?php

function cptui_register_my_cpts() {

	/**
	 * Post Type: FAQs.
	 */

	$labels = array(
		"name" => __( "FAQs", "mybasictheme" ),
		"singular_name" => __( "FAQ", "mybasictheme" ),
	);

	$args = array(
		"label" => __( "FAQs", "mybasictheme" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "faqs", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor" ),
	);

	register_post_type( "mbt_faq", $args );
}
add_action( 'init', 'cptui_register_my_cpts' );
