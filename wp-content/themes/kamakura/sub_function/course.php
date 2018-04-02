<?php

function create_post_type_course()
{
	register_post_type('course', array(
		'labels' => array(
			'name' => __('おすすめコース'),
			'singular_name' => __('Course Post')
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
add_action('init', 'create_post_type_course');


// Category
function add_register_taxonomy_course()
{
	register_taxonomy('course-custom-post', 'course', array(
		
		'labels' => array(
			'name' => 'カテゴリ(テーマ)',
			'singular_name' => 'Categories',
			'popular_items' => 'Popular Categories',
			'edit_item' => 'Edit Custom Post Categories',
			'view_item' => 'View Custom Post Categories',
			'update_item' => 'Update Custom Post Categories',
			'search_item' => 'Search Custom Post Categories',
			'add_new_item ' => 'Add Custom Post Categories',
			'menu_name' => __('カテゴリ(テーマ)'),
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
			'slug' => 'c-course'
		
		)
	));

	register_taxonomy('cource_area', 'course', array(		
		'labels' => array(
			'name' => 'カテゴリ(エリア)',
			'singular_name' => 'Area Categories',
			'popular_items' => 'Popular Categories',
			'edit_item' => 'Edit Custom Post Categories',
			'view_item' => 'View Custom Post Categories',
			'update_item' => 'Update Custom Post Categories',
			'search_item' => 'Search Custom Post Categories',
			'add_new_item ' => 'Add Custom Post Categories',
			'menu_name' => __('カテゴリ(エリア)'),
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
			'slug' => 'a-cource'
		)
	));
}

add_action('init', 'add_register_taxonomy_course', 0);

function add_register_taxonomy_tag_course()
{
	register_taxonomy('course-post-tag', 'course', array(
		
		'labels' => array(
			'name' => 'タグ（コース）',
			'singular_name' => 'Tags Categories',
			'popular_items' => 'Tags  Popular Categories',
			'edit_item' => 'Edit Custom Post Tags ',
			'view_item' => 'View Custom Post Tags ',
			'update_item' => 'Update Custom Post Tags ',
			'search_item' => 'Search Custom Post Tags ',
			'add_new_item ' => 'Add Custom Post Tags ',
			'menu_name' => __('タグ（コース）'),
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
			'slug' => 'tag-course'
		
		)
	));
}

add_action('init', 'add_register_taxonomy_tag_course', 0);


/*function my_acf_load_type_event_category( $field ) {
    
    $args = array(
        'lang' => 'ja', 
        'taxonomy' => 'event_taxonomy',
        'orderby' => 'id',
        'order'   => 'DESC'
    );

    $cats = get_categories($args);
    $field['choices'] = array();
  
    foreach( $cats as $cat ){
        $field['choices'][$cat->term_id] = $cat->name;
    }
    return $field;
}

add_filter('acf/load_field/key=field_5a81c857545ed', 'my_acf_load_type_event_category');
add_filter('acf/load_field/key=field_5a815927f4efa', 'my_acf_load_type_event_category');
add_filter('acf/load_field/key=field_5a81d1172149c', 'my_acf_load_type_event_category');
*/



