<?php 
//global $wp_query;
//pr( $wp_query );

get_header(); 
$page = 'index';
$flag = 0;
if(is_tax ()){
    $flag = 1;
    $postType = get_queried_object()->taxonomy;
   
    switch( $postType ){
        case 'course-custom-post':
        case 'course-post-tag':
        case 'cource_area':
            $page = 'course';
            break;
        case 'event_taxonomy':
            $page = 'listevent';
            break;
    }
}
if(is_singular()){
    $flag = 2;
    $postType = get_queried_object();
    switch( $postType ){
        case 'event';
        $page = 'event';
        break;
    }
}

if(is_single()){
    $flag = 3;
    echo 'single';exit;
}


get_template_part('content', $page);

?>

	

<?php get_footer(); ?>
