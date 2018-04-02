<?php
function create_post_type()
{
	register_post_type('event', array(
		'labels' => array(
			'name' => __('Events'),
			'singular_name' => __('Event')
		),
		'public' => true,
		'has_archive' => true,
		'archives' => 'archive',
		'hierarchical' => true,
		'supports' => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'comments',
			'revisions',
            'tags',
		)
	));
}
add_action('init', 'create_post_type');

// Category
function add_register_taxonomy()
{
	register_taxonomy('event_taxonomy', 'event', array(
		
		'labels' => array(
			'name' => 'Categories',
			'singular_name' => 'Categories',
			'popular_items' => 'Popular Categories',
			'edit_item' => 'Edit Custom Post Categories',
			'view_item' => 'View Custom Post Categories',
			'update_item' => 'Update Custom Post Categories',
			'search_item' => 'Search Custom Post Categories',
			'add_new_item ' => 'Add Custom Post Categories',
			'menu_name' => __('Event Categories'),
			'parent_item' => 'Slect a parent Custompost Category',
			'new_item_name' => 'Add new custom post category'
		
		),
		'hierarchical' => true,
		'description' => 'Description Custom Post Type',
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_in_nav_menus' => true,
		
		'rewrite' => array(
			'slug' => 'event'
		
		)
	));
}

add_action('init', 'add_register_taxonomy', 0);

function add_register_taxonomy_tag()
{
	register_taxonomy('event-tag', 'event', array(
		
		'labels' => array(
			'name' => 'Tag Custom',
			'singular_name' => 'Tags Categories',
			'popular_items' => 'Tags  Popular Categories',
			'edit_item' => 'Edit Custom Post Tags ',
			'view_item' => 'View Custom Post Tags ',
			'update_item' => 'Update Custom Post Tags ',
			'search_item' => 'Search Custom Post Tags ',
			'add_new_item ' => 'Add Custom Post Tags ',
			'menu_name' => __('Event Tags '),
			// 'parent_item' => 'Slect a parent Tags Category',
			'new_item_name' => 'Add new custom post category'
		
		),
		// 'hierarchical' => true,
		'description' => 'Description Custom Post Type',
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_in_nav_menus' => true,
		
		'rewrite' => array(
			'slug' => 'tag-c-custom-post'
		
		)
	));
}

add_action('init', 'add_register_taxonomy_tag', 0);


function create_post_type_area()
{
	register_post_type('area', array(
		'labels' => array(
			'name' => __('Area'),
			'singular_name' => __('Area')
		),
		'public' => true,
		'has_archive' => true,
		'archives' => 'archive',
		'hierarchical' => true,
		'supports' => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'comments',
			'revisions',
			'tags'
		)
	));
}
add_action('init', 'create_post_type_area');


function create_post_type_type()
{
	register_post_type('type', array(
		'labels' => array(
			'name' => __('Type'),
			'singular_name' => __('Type')
		),
		'public' => true,
		'has_archive' => true,
		'archives' => 'archive',
		'hierarchical' => true,
		'supports' => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'comments',
			'revisions',
			'tags'
		)
	));
}
add_action('init', 'create_post_type_type');

function my_acf_load_type( $field ) {
    
    $args = array(
        'posts_per_page'   => -1,
        'offset'           => 0,
        'post_type'        => 'type',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'author'	   => '',
        'author_name'	   => '',
        'post_status'      => 'publish',
    );
    $posts_array = get_posts( $args );
   
    $field['choices'] = array();
    if( !empty( $posts_array ) ){
        foreach( $posts_array as $post ){
            $field['choices'][$post->ID] =  $post->post_title;
        }
    }
    return $field;
    
}

add_filter('acf/load_field/key=field_5a7c135492467', 'my_acf_load_type');

function my_acf_load_area( $field ) {
	
    $args = array(
        'posts_per_page'   => -1,
        'offset'           => 0,
        'post_type'        => 'area',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'author'	   => '',
        'author_name'	   => '',
        'post_status'      => 'publish',
    );
    $posts_array = get_posts( $args );
   
    $field['choices'] = array();
    if( !empty( $posts_array ) ){
        foreach( $posts_array as $post ){
            $field['choices'][$post->ID] =  $post->post_title;
        }
    }

    return $field;
    
}
add_filter('acf/load_field/key=field_5a7c1c2cd90ad', 'my_acf_load_area');


function my_acf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyCsUtAi2xVAVvrW3LVaAcpe8owo-T4dDwc';
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');