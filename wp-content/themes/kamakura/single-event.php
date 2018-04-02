<?php
	get_header(); 
    $id = get_the_ID();
    $cats = get_the_terms( $id ,'event_taxonomy');
    $typeId = get_post_meta($id,'type');
    $postType = get_post($typeId[0]);
?>
<div id="container">
	<div id="sec1">
		<article class="inner">
            <div class="clearfix">
                <?php if (!get_field("cource_event_flg", $id)) { ?>
                    <div class="ev_ttl fl">
                        <img src="<?php echo IMAGE_PATH . get_event_icon_file_name($postType->ID) ?>" alt=""><?= $postType->post_title ?>
                    </div>
                <?php } ?>
                <p class="tag fl">
                    <?php
                        if( !empty($cats) ){
                        $i = 0;
                        foreach($cats as $cat){
                            $i++;
                    ?>
                    <span class="<?= $cat->slug ?> tag<?= $i ?>">
                        <a href="<?= get_term_link($cat->term_id) ?>">
                            <?= $cat->name ?>
                        </a>
                    </span>
                    <?php 
                        if($i == 2)
                            $i = 0;
                    }}
                 ?>
                    
                </p>
            </div>
			<h2><?= the_title(); ?></h2>
            <?php
                $images = get_field('galerry_event');
            ?>
			<div class="clearfix">
				<div class="w50r">
                    <?php if( !empty( $images ) ){  ?>
                        <div class="img">
                            <div class="bxSlider" data-pagercustom=".img_thumbnail">
                                <?php foreach($images as $image){ ?>
                                    <div><img src="<?= $image['galerry_image']['url'] ?>" alt="" width="100%"></div>
                                <?php } ?>
                            </div>
                        </div>
                        <ul class="img_thumbnail clearfix">
                            <?php foreach($images as $image){ ?>
                                <li>
                                    <a data-slide-index="0">
                                        <img src="<?= $image['galerry_image']['sizes']['medium'] ?>" alt="" width="100%">
                                    </a>
                                </li>
                            <?php } ?>
                            
                        </ul>
                    <?php } ?>
                </div>
				<div class="w50l">
					<!-- <h3>鎌倉の工芸品といえば鎌倉彫。<br>鎌倉彫の歴史を辿るとともに、<br>制作体験も人気</h3>
					<p class="text">
						鎌倉彫は、彫りの陰影と漆の色合いによる絶妙なコンビネーションが魅力の伝統工芸です。当館は、室町時代～現代までの鎌倉彫作品を一度に見ることができる唯一の施設になります。時には重厚に、時には華やかに、時には素朴に作られた個性あふれる鎌倉彫をぜひ見に来てください。一階には、ショップとカフェがあり、かわいいミュージアムグッズや鎌倉彫の器でお茶＆スイーツもお楽しみいただけます。
					</p>-->
                    <?php the_content() ?>
				</div>
			</div>
		</article>
	</div>
    <?php 
        $point_check = get_field('event_point');
        if ($point_check == '') {} else{
     ?>
	<div id="sec2">
		<article class="inner">
			<h2 class="hide_640"><img src="<?php echo IMAGE_PATH ?>common/images/event/sec2_point.png" alt=""></h2>
			<h2 class="show_640"><img src="<?php echo IMAGE_PATH ?>common/images/event/sec2_pointsp.png" alt=""></h2>
			<div class="text">
                <?php 
                    $point = get_field('event_point');
                    echo $point;
                ?>
                
            </div>
			<div class="line">
				<img src="<?php echo IMAGE_PATH ?>common/images/event/sec2_line.png" alt="" width="100%">
			</div>
		</article>
	</div>
    <?php } ?>
	<div id="sec3">
		<article class="inner">
			<h2><?php _e('詳細情報','kamakura') ?></h2>
            <?php 
                $infos = get_field('tour_infomation');
               // pr($infos);
            ?>
			<div style="overflow-x: auto">
				<table>
                    <?php foreach($infos as $info){ ?>
					<tr>
						<th class="left"><?= $info['text'] ?></th>
						<th class="right"><?= $info['value'] ?></th>
					</tr>
					<?php } ?>
				</table>
			</div>
		</article>
	</div>
	<div id="sec4">
		<article class="inner">
			<h2><?php _e('地図情報','kamakura') ?></h2>
            <?php
                $maps = get_field('event_google_maps');
            ?>
			<div class="map">
				<!-- <img src="<?php echo IMAGE_PATH ?>common/images/event/map.png" alt="" width="100%"> -->
                <iframe width="100%"
                height="450px"
                frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCsUtAi2xVAVvrW3LVaAcpe8owo-T4dDwc&q=<?= $maps['address'] ?>&center=<?= $maps['lat'].','.$maps['lng'] ?>" allowfullscreen>
                </iframe>
			</div>
		</article>
	</div>
</div>
<?php get_footer(); ?>