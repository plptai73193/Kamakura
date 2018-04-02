<?php
	get_template_part('template-part/content','slide');
	// $current_lang = getCurrentLangDefault();
	$args = array('post_type' => 'event',
		'posts_per_page' => 3,
		'orderby' => 'ID',
		'nopaging' => false,
		'paged' => 1,
		'order'=>'DESC',
		'lang' => $lang,
		'meta_key'    => 'cource_event_flg', 
		'meta_value'  => '0',
		'meta_compare' => '=',
	);

	$query = new WP_Query( $args );
	$posts = $query->posts;
	$colors = array(
		1 => 'pink', 2 => 'blue', 3 => 'green'
	);
	$slug = getSlugUrl($lang);
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>common/css/top.css">
<div id="container">
	<article class="inner">
	<?php
        get_template_part('template-part/content','slide-text');
    ?>
	</article>
	<div id="sec2">
		<div class="inner">
			<?php if ($slug == '/en/') { ?>
				<h2><img src="<?php echo IMAGE_PATH ?>common/images/top/sec2_h2_en.png" alt=""></h2>
			<?php }else{ ?>
				<h2><img src="<?php echo IMAGE_PATH ?>common/images/top/sec2_h2.png" alt=""></h2>
			<?php } ?>
			<div class="clearfix news_outer">
				<?php 
				if( !empty($posts) ){
					foreach( $posts as $post ){	
						$thumb = get_the_post_thumbnail_url($post->ID);
						$typeId = get_post_meta($post->ID,'type');
						$postType = get_post($typeId[0]);
						$eventId = get_post_meta($post->ID,'area');
						$eventType = get_post($eventId[0]);
						$class = get_post_meta($eventType->ID,'color');
						$id = $post->ID;
						$cats = get_the_terms( $id ,'event_taxonomy');
				?>
				<div class="col3 first">
					<a href="<?= get_permalink($post->ID) ?>">
						<p class="img"><img src="<?=  $thumb ?>" alt=""></p>
						<div class="info">
							<?php if( isset( $cats ) && !empty( $cats ) ){
									$i = 0;
									foreach($cats as $cat){
										$i++;
							?>
								<span class="<?= $cat->slug ?>"><?= $cat->name ?></span>
							<?php
									}
							?> 
							<?php }else{ ?>
								<span class="" style="opacity:0">sssssss</span>
								<span class="date" style="opacity:0">ssssss</span>
							<?php } ?>
							<!-- <p class="date"><?= date('Y/m/d', strtotime($post->post_date)) ?></p> -->
							<p class="desc"><?= $post->post_excerpt ?></p>
						</div>
					</a>
				</div>
				<?php }} ?>
			</div>
		</div>
	</div>
	<article class="inner map_inner">
	<!-- //▼TOP MAP▼// -->
	<div id="topMap">
		<?php if ($slug == '/en/') { ?>
			<h2><img src="<?php echo IMAGE_PATH ?>common/images/top/map_h2_en.png" alt=""></h2>
		<?php }else{ ?>
			<h2><img src="<?php echo IMAGE_PATH ?>common/images/top/map_h2.png" alt=""></h2>
		<?php } ?>
		
		<p class="scale_map ova">
			<img src="<?php echo IMAGE_PATH ?>common/images/top/top_map.png" alt="鎌倉アート＆カルチャーMAP" id="scale_map">
		</p>
		<?php if ($slug == '/en/') { ?>
			<p class="btn">
				<a onClick="printPdf();" class="a-w640" style="cursor: pointer;">
					<img src="<?php echo IMAGE_PATH ?>common/images/top/btn_map_en_pc.png" alt="MAPを印刷する" class="over ">
				</a>
				<a class="w640 enlarge_map">
					<img src="<?php echo IMAGE_PATH ?>common/images/top/btn_map_en.png" alt="MAPを印刷する" class="over ">
				</a>
			</p>
		<?php }else{ ?>
			<p class="btn">
				<a onClick="printPdf();" class="a-w640" style="cursor: pointer;">
					<img src="<?php echo IMAGE_PATH ?>common/images/top/btn_map.png" alt="MAPを印刷する" class="over">
				</a>
				<a class="w640 enlarge_map">
					<img src="<?php echo IMAGE_PATH ?>common/images/top/btn_map_sp.png" alt="MAPを印刷する" class="over ">
				</a>
			</p>
		<?php } ?>
	</div>
	<!-- //△TOP MAP△// -->
	</article>
	<!-- //▼TOP SCHEDULE▼// -->
	<div id="topSchedule">
		<div class="titleBox">
			<?php if ($slug == '/en/') { ?>
				<h2><img src="<?php echo IMAGE_PATH ?>common/images/top/ttl_schedule_en.png" alt="鎌倉のミュージアム"></h2>
				<p class="btn"><a href="schedule_en"><img src="<?php echo IMAGE_PATH ?>common/images/top/btn_schedule_en.png" alt="展覧会＆開館スケジュールはこちら" class="over"></a></p>
			<?php }else{ ?>
				<h2><img src="<?php echo IMAGE_PATH ?>common/images/top/ttl_schedule.png" alt="鎌倉のミュージアム"></h2>
				<p class="btn"><a href="schedule"><img src="<?php echo IMAGE_PATH ?>common/images/top/btn_schedule.png" alt="展覧会＆開館スケジュールはこちら" class="over"></a></p>
			<?php } ?>
		</div>
		<ul class="clearfix">
			<!--*-->
			<li class=""><a href="http://www.yohshomei.com/">
				<h3 class="heightLine-3"><?php _e('北鎌倉葉祥明美術館', 'kamakura') ?></h3>
				<figure><img src="<?php echo IMAGE_PATH ?>common/images/top/musium_img01.jpg" alt="<?php _e('北鎌倉葉祥明美術館', 'kamakura') ?>" width="100%" class="over"></figure>
				<dl class="heightline-z">
					<dt id="musium01"><!-- <?php _e('本日 開館 9:00~18:00','kamakura') ?> --></dt>
					<dd><i class="fa fa-calendar" aria-hidden="true"></i><?php _e('北鎌倉駅から徒歩7分','kamakura') ?></dd>
				</dl>
			</a></li>
			<!--*-->
			<!--*-->
			<li class=""><a href="http://www.moma.pref.kanagawa.jp/public/HallTop.do?hl=a">
				<h3 class="heightLine-3"><?php _e('神奈川県立近代美術館 鎌倉別館', 'kamakura') ?></h3>
				<figure><img src="<?php echo IMAGE_PATH ?>common/images/top/musium_img02.jpg" alt="<?php _e('神奈川県立近代美術館 鎌倉別館', 'kamakura') ?>" width="100%" class="over"></figure>
				<dl class="heightline-z">
					<dt id="musium02"><!-- <?php _e('本日 開館 9:00~18:00','kamakura') ?> --></dt>
					<dd><i class="fa fa-calendar" aria-hidden="true"></i><?php _e('鎌倉駅から徒歩15分','kamakura') ?></dd>
				</dl>
			</a></li>
			<!--*-->
			<!--*-->
			<li class=""><a href="https://www.city.kamakura.kanagawa.jp/kokuhoukan/">
				<h3 class="heightLine-3"><?php _e('鎌倉国宝館', 'kamakura') ?></h3>
				<figure><img src="<?php echo IMAGE_PATH ?>common/images/top/musium_img03.jpg" alt="<?php _e('鎌倉国宝館', 'kamakura') ?>" width="100%" class="over"></figure>
				<dl class="heightline-z">
					<dt id="musium03"><!-- <?php _e('本日 開館 9:00~18:00','kamakura') ?> --></dt>
					<dd><i class="fa fa-calendar" aria-hidden="true"></i><?php _e('鎌倉駅から徒歩12分','kamakura') ?></dd>
				</dl>
			</a></li>
			<!--*-->
			<!--*-->
			<li class=""><a href="http://www.kamakura-kawakita.org/">
				<h3 class="heightLine-4"><?php _e('鎌倉市川喜多映画記念館', 'kamakura') ?></h3>
				<figure><img src="<?php echo IMAGE_PATH ?>common/images/top/musium_img04.jpg" alt="<?php _e('鎌倉市川喜多映画記念館', 'kamakura') ?>" width="100%" class="over"></figure>
				<dl class="heightline-z">
					<dt id="musium04"><!-- <?php _e('本日 開館 9:00~17:00','kamakura') ?> --></dt>
					<dd><i class="fa fa-calendar" aria-hidden="true"></i><?php _e('鎌倉駅から徒歩8分','kamakura') ?></dd>
				</dl>
			</a></li>
			<!--*-->
			<!--*-->
			<li class=""><a href="http://www.kamakura-arts.or.jp/kaburaki/">
				<h3 class="heightLine-4"><?php _e('鎌倉市鏑木清方記念美術館', 'kamakura') ?></h3>
				<figure><img src="<?php echo IMAGE_PATH ?>common/images/top/musium_img05.jpg" alt="<?php _e('鎌倉市鏑木清方記念美術館', 'kamakura') ?>" width="100%" class="over"></figure>
				<dl class="heightline-z">
					<dt id="musium05"><!-- <?php _e('本日 開館 9:00~17:00','kamakura') ?> --></dt>
					<dd><i class="fa fa-calendar" aria-hidden="true"></i><?php _e('鎌倉駅から徒歩7分','kamakura') ?></dd>
				</dl>
			</a></li>
			<!--*-->
			<!--*-->
			<li class=""><a href="http://kamakuraborikaikan.jp/museum/">
				<h3 class="heightLine-4"><?php _e('鎌倉彫資料館', 'kamakura') ?></h3>
				<figure><img src="<?php echo IMAGE_PATH ?>common/images/top/musium_img06.jpg" alt="<?php _e('鎌倉彫資料館', 'kamakura') ?>" width="100%" class="over"></figure>
				<dl class="heightline-z">
					<dt id="musium06" class="close"><!-- <?php _e('閉じる','kamakura') ?> --></dt>
					<dd><i class="fa fa-calendar" aria-hidden="true"></i><?php _e('鎌倉駅から徒歩5分','kamakura') ?></dd>
				</dl>
			</a></li>
			<!--*-->
			<!--*-->
			<li class=""><a href="https://www.city.kamakura.kanagawa.jp/rekibun/koryukan.html">
				<h3 class="heightLine-5"><?php _e('鎌倉歴史文化交流館', 'kamakura') ?></h3>
				<figure><img src="<?php echo IMAGE_PATH ?>common/images/top/musium_img0401.jpg" alt="<?php _e('鎌倉歴史文化交流館', 'kamakura') ?>" width="100%" class="over"></figure>
				<dl class="heightline-z">
					<dt id="musium07"><!-- <?php _e('本日 開館 9:00~17:00','kamakura') ?> --></dt>
					<dd><i class="fa fa-calendar" aria-hidden="true"></i><?php _e('鎌倉駅から徒歩7分','kamakura') ?></dd>
				</dl>
			</a></li>
			<!--*-->
			<!--*-->
			<li class=""><a href="http://www.kamakurabungaku.com/">
				<h3 class="heightLine-5"><?php _e('鎌倉文学館', 'kamakura') ?></h3>
				<figure><img src="<?php echo IMAGE_PATH ?>common/images/top/musium_img0501.jpg" alt="<?php _e('鎌倉文学館', 'kamakura') ?>" width="100%" class="over"></figure>
				<dl class="heightline-z">
					<dt id="musium08"><!-- <?php _e('本日 開館 9:00~18:00','kamakura') ?> --></dt>
					<dd><i class="fa fa-calendar" aria-hidden="true"></i><?php _e('由比ヶ浜駅から徒歩7分','kamakura') ?></dd>
				</dl>
			</a></li>
			<!--*-->
			<!--*-->
			<li class=""><a href="http://www.kannon-museum.jp/">
				<h3 class="heightLine-5"><?php _e('観音ミュージアム', 'kamakura') ?></h3>
				<figure><img src="<?php echo IMAGE_PATH ?>common/images/top/musium_img0301.jpg" alt="<?php _e('観音ミュージアム', 'kamakura') ?>" width="100%" class="over"></figure>
				<dl class="heightline-z">
					<dt id="musium09"><!-- <?php _e('本日 開館 9:00~17:00','kamakura') ?> --></dt>
					<dd><i class="fa fa-calendar" aria-hidden="true"></i><?php _e('長谷駅から徒歩5分','kamakura') ?></dd>
				</dl>
			</a></li>
			<!--*-->
			
		</ul>
	</div>
	<!-- //△TOP SCHEDULE△// -->

	<div id="sec3">
		<div class="inner">
			<?php if ($slug == '/en/') { ?>
				<h2><img src="<?php echo IMAGE_PATH ?>common/images/top/sec3_h2_en.png" alt=""></h2>
			<?php }else{ ?>
				<h2><img src="<?php echo IMAGE_PATH ?>common/images/top/sec3_h2.png" alt=""></h2>
			<?php } ?>
			<p class="text">
				<?php _e('博物館、美術館、文学館などの文化施設で働く専門職員です。文化の発展と継承のために、資料の収集と保存、調査研究、展示、教育普及活動などの様々な活動を行っています。学芸員によるギャラリートークをおこなっている館もありますので、日時をご確認の上、ぜひご来館ください。','kamakura') ?>
				
			</p>
		</div>
	</div>
</div>