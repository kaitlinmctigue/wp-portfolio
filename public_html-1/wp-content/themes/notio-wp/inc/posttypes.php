<?php
/*-----------------------------------------------------------------------------------*/
/*	Create a new post type called portfolios
/*-----------------------------------------------------------------------------------*/

function create_post_type_portfolios() 
{
	$labels = array(
		'name' => __( 'Portfolio','bronx'),
		'singular_name' => __( 'Portfolio','bronx' ),
		'rewrite' => array('slug' => __( 'portfolios','bronx' )),
		'add_new' => _x('Add New', 'portfolio', 'bronx'),
		'add_new_item' => __('Add New Portfolio','bronx'),
		'edit_item' => __('Edit Portfolio','bronx'),
		'new_item' => __('New Portfolio','bronx'),
		'view_item' => __('View Portfolio','bronx'),
		'search_items' => __('Search Portfolio','bronx'),
		'not_found' =>  __('No portfolios found','bronx'),
		'not_found_in_trash' => __('No portfolios found in Trash','bronx'), 
		'parent_item_colon' => ''
	  );
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	  ); 
	  
	  register_post_type('portfolio',$args);
	  flush_rewrite_rules();
}

$category_labels = array(
	'name' => __( 'Project Categories', 'bronx'),
	'singular_name' => __( 'Project Category', 'bronx'),
	'search_items' =>  __( 'Search Project Categories', 'bronx'),
	'all_items' => __( 'All Project Categories', 'bronx'),
	'parent_item' => __( 'Parent Project Category', 'bronx'),
	'edit_item' => __( 'Edit Project Category', 'bronx'),
	'update_item' => __( 'Update Project Category', 'bronx'),
	'add_new_item' => __( 'Add New Project Category', 'bronx'),
  'menu_name' => __( 'Project Categories', 'bronx')
); 	

register_taxonomy("project-category", 
		array("portfolio"), 
		array("hierarchical" => true, 
				'labels' => $category_labels,
				'show_ui' => true,
    			'query_var' => true,
				'rewrite' => array( 'slug' => 'project-category' )
));

/* Initialize post types */
add_action( 'init', 'create_post_type_portfolios' );
?>