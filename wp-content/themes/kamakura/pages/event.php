<?php
/* Template Name: Event */
get_header(); 

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
//pr($paged);
$args = array('post_type' => 'event',
    'posts_per_page' => 6,
    'orderby' => 'ID',
    'nopaging' => false,
    'paged' => $paged,
    'order'=>'DESC');
$query = new WP_Query( $args );
$posts = $query->posts;
$colors = array(
    1 => 'pink', 2 => 'blue', 3 => 'green'
);
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>common/css/top.css">
<div id="container" class="con">
	<div id="sec2">
		<div class="inner" id="eventpage">
			<h2 class="event_h2">
				<img src="<?php echo IMAGE_PATH ?>common/images/event/ttl_flag.png" alt="">
				<span><?php _e('イベント情報','kamakura') ?></span>
			</h2>
			<div class="clearfix news_outer">
            <?php 
                if( !empty($posts) ){
                    foreach($posts as $post){
                    $thumb = get_the_post_thumbnail_url($post->ID);
                    $typeId = get_post_meta($post->ID,'type');
                    $postType = get_post($typeId[0]);

                    $eventId = get_post_meta($post->ID,'area');
                    $eventType = get_post($eventId[0]);
                    
					$class = get_post_meta($eventType->ID,'color');
					
					$id = $posts->ID;
					$cats = get_the_terms( $id ,'event_taxonomy');

            ?>
				<div class="col3 first">
					<a href="spot.html">
						<p class="img"><img src="<?=  $thumb ?>" alt="" class="max"></p>
						<div class="info ev_info">
							<div class="ev_ttl">
								<img src="images/event/event_icon.png" alt=""><?= $postType->post_title ?>
							</div>
							<div class="ev_ttl1"><?= $post->post_title ?></div>
							<p class="sub_ttl">
								<span class="<?= $colors[$class[0]] ?>"><?= $eventType->post_title ?></span>
								<span class="date"></span>
							</p>
							<!-- <p class="date">2017/10/20</p> -->
							<p class="desc"><?= $post->post_excerpt ?> </p>
						</div>
					</a>
				</div>
                    <?php }} ?>
				
			</div>
		</div>
	</div>
</div>
<?php 
get_footer();
?>