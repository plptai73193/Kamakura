<?php
require_once('sub_function/event.php');
require_once('sub_function/course.php');
define('ASSETS_PATH', get_template_directory_uri() . '/');
define('IMAGE_PATH', ASSETS_PATH . '');
define('JS_PATH', ASSETS_PATH . '');
define('CSS_PATH', ASSETS_PATH . '');

if(isset($_GET['debug'])){
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
}

add_filter( 'wp_title', 'wpdocs_hack_wp_title_for_home' );
add_theme_support( 'post-thumbnails' ); 
/**
 * Customize the title for the home page, if one is not set.
 *
 * @param string $title The original title.
 * @return string The title to use.
 */
$result=load_theme_textdomain( 'kamakura', get_template_directory() . '/languages' );
function wpdocs_hack_wp_title_for_home( $title )
{
 if ( empty( $title ) && ( is_home() || is_front_page() ) ) {
  $title = __( 'マンガペディア', 'dramapedia' ) . ' | ' . get_bloginfo( 'description' );
 }
 return $title;
}
function setIdBody(){
    $bodyId = 'topPage';
    if(is_page()){
       
        $slug = basename(get_permalink());
        switch( $slug ){
            case 'course';
            case 'course-2';
                $bodyId = 'coursedetailPage';
            break;
            case 'event';
                $bodyId = 'topPage';
            break;
            case 'course-detail';
            case 'course-detail-2';
                $bodyId = 'coursePage';
            break;
            case 'schedule';
                $bodyId = 'schedulePage';
            break;
            case 'schedule_en';
                $bodyId = 'schedulePage';
            break;

        }
    }
    if(is_single()){
        
        $postType = get_post_type();
        switch( $postType ){
            case 'event';
                $bodyId = 'eventPage';
            break;
            case 'course':
                $bodyId = 'coursePage';
            break;
        }
    }
    
    if(is_archive()){
        
        $postType = get_queried_object()->name;
       
        switch( $postType ){
            case 'course';
                $bodyId = 'coursedetailPage';
            break;
        }
    }

    if(is_tax()){
        $postType = get_queried_object()->taxonomy;
        switch( $postType ){
            case 'course-custom-post':
            case 'course-post-tag':
            case 'cource_area':
                $bodyId = 'coursedetailPage';
            break;
        }
    }
    wp_reset_query(); 
    echo $bodyId;
}
function setPage(){
    $page = '';
	if(is_page()){
       
        $slug = basename(get_permalink());
        switch( $slug ){
            case 'course';
            case 'course-2';
                $page = 'course';
            break;
            case 'event';
                $page = 'event';
            break;
            case 'course-detail';
            case 'course-detail-2';
                $page = 'course';
            break;
            case 'schedule';
                $page = 'schedule';
            break;
            case 'schedule_en';
                $page = 'schedule';
            break;

        }
    }
    if(is_single()){
        
        $postType = get_post_type();
        switch( $postType ){
            case 'event';
                $page = 'event';
            break;
            case 'course':
                $page = 'course';
            break;
        }
    }
    
    if(is_archive()){
        
        $postType = get_queried_object()->name;
       
        switch( $postType ){
            case 'course';
                $page = 'course';
            break;
            case 'event';
                $page = 'event';
            break;
        }
    }

    if(is_tax()){
        $postType = get_queried_object()->taxonomy;
        switch( $postType ){
            case 'course-custom-post':
            case 'course-post-tag':
            case 'cource_area':
                $page = 'course';
            break;
        }
    }
    if(isset($_GET['a']))
        $page='course';
    wp_reset_query(); 
    return $page;
}

/**
 * Debug function
 * @return void
 * @param array $data
 * @param boolean $exit
 */
function pr($data = array(), $exit = false){
	
	echo '<pre style="text-align:left !important">';
		print_r($data);
	echo '</pre>';
	
	if($exit)
	wp_die();
}


function my_post_queries( $query ) {
    
    // do not alter the query on wp-admin pages and only alter it if it's the main query
    if ( $query->is_main_query() && !is_admin()){

        if( isset($query->query['post_type']) ){
           
            $type = $query->query['post_type'];

            switch( $type ){
                case 'event';
                    $query->set('post_type','event');
                    $query->set('posts_per_page',6);
                    $query->set('post_status' , array('publish'));
                    $meta_query = array(
                        array(
                           'key'=>'cource_event_flg',
                           'value'=> '1',
                           'compare'=>'!=',
                        ),
                    );
                    if( !is_single() ){
                        if( !is_admin() ){
                            $query->set('meta_query',$meta_query);
                        }
                    }
                break;
                case 'course';
                $query->set('posts_per_page', 6);
                $query->set('post_status' , array('publish'));
				break;
                default:
                 $query->set('posts_per_page', 3);
                break;
            }
			$query->set('lang' , 'ja');
        }else $query->set('posts_per_page', 6);
    }
  }
  add_action( 'pre_get_posts', 'my_post_queries' );

function getCurrentLangDefault(){

    if(isset($_SESSION) && isset($_SESSION['lang'])){
        if( in_array($_SESSION['lang'], array('ja', 'en')) ){
            return $_SESSION['lang'];
        }
    }
    $langs = pll_the_languages(array('raw'=>1));
    foreach( $langs as $key=>$lang ){
        if( isset($lang['current_lang']) &&  $lang['current_lang'] ){
            return $key;
            break;
        }
    }
    return 'ja';
}


function getSlugUrl($lang){
    $data =  array(
        'ja' => '/',
        'en' => '/'."en"."/"
    );
    if( in_array( $lang, array_keys($data))  ){
        return  $data[$lang];
    }
    return '/';
}

// Server function

// function getUrlSite(){
//     $env = ENV;
//     switch( $env ){
//         case 'local';
//             return 'http://localhost/kamakura/wordpress/';
//         break;
//         case 'testing':
//             return 'http://www.kamakura-arts.or.jp/kamakuraart/test/wordpress';
//         break;
//         case 'production';
//             return 'http://www.kamakura-arts.or.jp/kamakuraart/test/wordpress';
//         break;
//     }

// }

//Local function
function getUrlSite(){
    $env = ENV;
    switch( $env ){
        case 'local';
            return 'http://localhost/wp/';
        break;
        case 'testing':
            return 'http://localhost/wp';
        break;
        case 'production';
            return 'http://localhost/wp';
        break;
    }

}


function getPagination(){
    echo  '<div class="pagination">'.paginate_links().'</div>';
}

add_action('wp_ajax_nopriv_debugevent', 'debug_event');
add_action('wp_ajax_debugevent', 'debug_event');
function debug_event(){
    $count_pages = wp_count_posts('event');
    echo '<pre>';
    print_r($count_pages);
    echo '</pre>';
    wp_die();
}
