<?php
	$current_lang = getCurrentLangDefault();
	$item = get_queried_object();
	$current_page = sanitize_post( $GLOBALS['wp_the_query']->get_queried_object() );
	global $wp;
		// get current url with query string.
		$current_url =  home_url( $wp->request ); 
        $nopaging_url = preg_match("/page\/([0-9]+)/", $current_url,$current_url_new);
	if($item->taxonomy){
		$args = array('post_type' => 'course',
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
			'post_type' => 'course',
			'posts_per_page' => 6,
			'orderby' => 'ID',
			'nopaging' => false,
			'paged' => $current_url_new[1]?$current_url_new[1]:0,
			'order'=>'DESC',
			'lang' => $current_lang,
		);
	}
	$query = new WP_Query( $args );
	$posts = $query->posts;

	if (!empty($query->taxonomy)) {
		$postType = $query->taxonomy;
		$title = "";
		switch( $postType ){
			case 'course-custom-post':
				$title = get_term_by('slug', $term, 'course-custom-post');
				break;
			case 'course-post-tag':
				$title = get_term_by('slug', $term, 'course-post-tag');
				break;
			case 'cource_area':
				$title = get_term_by('slug', $term, 'cource_area');
				break;
		}
	};
?>
<div id="container">
	<div id="sec1">
		<article class="inner clearfix">
			<div class="left">
				<h2>
					<img src="<?php echo IMAGE_PATH ?>common/images/course/flag.png" alt="">
					<span><?php _e('おすすめ<br class="show_400">モデルコース','kamakura') ?></span>
				</h2>
				<?php
					if (!empty($title)) {
				?>
					<h3 class="h3"><?php echo $title->name; ?></h3>
				<?php
					}
				?>
				<?php if ( have_posts() ) { ?>
					<?php while ( have_posts() ) : the_post();?>
						<div class="box clearfix">
							<div class="img">
								<a href="<?= get_permalink(get_the_ID()) ?>">
									<?php
										$thumb = get_the_post_thumbnail();
										echo $thumb;
									?>
								</a>
							</div>
							<div class="detail">
								<h3><?= the_title() ?></h3>
								<p class="text"><?= strip_tags( get_the_excerpt() ) ?></p>
								<div class="btn">
									<a href="<?= get_permalink(get_the_ID()) ?>"><span class="fa fa-caret-right"></span><?php _e('おすすめコース詳細へ','kamakura') ?></a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php } ?>
				<?= getPagination() ?>
			</div>
			<div id="coursePage">

			<?php
				get_template_part('content','course-right');
			?>
				
			</div>
		</article>
	</div>
</div>