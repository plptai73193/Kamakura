<?php
	$current_lang = getCurrentLangDefault();
	$current_page = sanitize_post( $GLOBALS['wp_the_query']->get_queried_object() );
	global $wp;
		
		$current_url =  home_url( $wp->request ); 
        $nopaging_url = preg_match("/page\/([0-9]+)/", $current_url,$current_url_new);
	if($item->taxonomy){
		$args = array('post_type' => 'event',
		'posts_per_page' => 6,
		'tax_query' => array(
                      array(
                        'taxonomy' => $item->taxonomy,
                        'field' => 'slug',
                        'terms' => array($item->slug),  
                    )

                ),
			'orderby' => 'ID',
			'nopaging' => false,
			'paged' => $current_url_new[1]?$current_url_new[1]:0,
			'order'=>'DESC',
			'lang' => $current_lang,
		);
	}else{
		$args = array(
			'post_type' => 'event',
			'posts_per_page' => 6,
			'orderby' => 'ID',
			'nopaging' => false,
			'paged' => $current_url_new[1]?$current_url_new[1]:0,
			'order'=>'DESC',
			'lang' => $current_lang,
		);
	}
	// $args = array('post_type' => 'event',
	// 	'posts_per_page' => 6,
	// 	'orderby' => 'ID',
	// 	'nopaging' => false,
	// 	'paged' => 1,
	// 	'order'=>'DESC',
	// 	'lang' => $current_lang,
	// 	'meta_key'    => 'cource_event_flg', 
	// 	'meta_value'  => '0',
	// 	'meta_compare' => '=',
	// );
	$query = new WP_Query( $args );
	$posts = $query->posts;
	$colors = array(
		1 => 'pink', 2 => 'blue', 3 => 'green'
	);
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>common/css/top.css">

<div id="container" class="con event_con">
	<div id="sec2">
		<div class="inner" id="eventpage">
			<h2 class="event_h2">
				<img src="<?php echo IMAGE_PATH ?>common/images/event/ttl_flag.png" alt="" class="w80px">
				<span><?php _e('イベント情報','kamakura') ?></span>
			</h2>
			<div class="clearfix news_outer">
            <?php 
                 if ( have_posts() ) {
					while ( have_posts() ) : the_post();
						if (!get_field("cource_event_flg")) {
							$thumb = get_the_post_thumbnail_url($post->ID);
							$typeId = get_post_meta($post->ID,'type');
							$postType = get_post($typeId[0]);
							/*$eventId = get_post_meta($post->ID,'area');
							$eventType = get_post($eventId[0]);*/
							//$class = get_post_meta($eventType->ID,'color');
							$id = $post->ID;
							$cats = get_the_terms( $id ,'event_taxonomy');
            ?>
				<div class="col3 first heightLine-0">
					<a href="<?= get_permalink($post->ID) ?>">
						<p class="img"><img src="<?=  $thumb ?>" alt="" class="max"></p>
						<div class="info ev_info">			
							<div class="ev_ttl fn m10t">
								<img src="<?php echo IMAGE_PATH . get_event_icon_file_name($postType->ID) ?>" alt=""><?= $postType->post_title ?>
							</div>
							<div class="ev_ttl1"><?= $post->post_title ?></div>
							<p class="sub_ttl">
								<?php if( isset( $cats ) && !empty( $cats ) ){ 
									$i = 0;
									foreach($cats as $cat){
										$i++;
								?>
									<span class="<?= $cat->slug ?>"><?= $cat->name ?></span>
									<!-- <span class="date"></span> -->
								<?php
									}
								?>
								<?php }else{ ?>
									<span class="" style="opacity:0">sssssss</span>
									<span class="date" style="opacity:0">ssssss</span>
								<?php } ?>
							</p>
							<!-- <p class="date">2017/10/20</p> -->
							<p class="desc"><?= $post->post_excerpt ?> </p>
						</div>
					</a>
				</div>
				<?php } endwhile; } ?>
			</div>
			<?= getPagination() ?>
		</div>
	</div>
</div>