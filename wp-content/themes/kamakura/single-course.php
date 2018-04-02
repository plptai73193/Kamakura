<?php
$locale = get_locale();
$spots = get_field('spots_in_course');
$detail = get_field('course_detail');
$detail = @$detail[0];
$cat_name = array();
if( !empty( $detail['detail_course_24'] ) ){
    foreach ($detail['detail_course_24']  as $termnum) {
        $terms_disp = get_term_by('term_taxonomy_id',  $termnum, 'course_area');
        $cat_name[] = $terms_disp->name;
    }
}
if(!empty($terms_disp))
    $catName = '('. implode(", ", $cat_name) .')';
// function _getCategoryCourse1( $taxonomy ) {

//     $args = array(
//         'lang' => 'ja', 
//         'taxonomy' => $taxonomy,
//         'orderby' => 'id',
//         'hide_empty' => 0, 
//         'order'   => 'DESC'
//     );

//     $cats = get_categories($args);
//     return  $cats;
// }
// $catCourse = _getCategoryCourse('course-custom-post');
// $tagCourse  = _getCategoryCourse1('course-post-tag');
// $catEvent  = _getCategoryCourse1('cource_area');
get_header(); 
$id = get_the_ID();
$cats = get_the_terms( $id ,'cource_area');
$fields = get_fields(get_the_ID());
?>
<div id="container">
	<div id="sec1" class="clearfix">
		<article class="inner">
			<div class="left">
				<h2>
					<span><?= $detail['course_detail_01'] ?></span><br>
					<!-- <?= trim(get_the_title())." ".$cat->name?> -->
                    <?= trim(get_the_title())." ";
                        
                       $catName = '';
                       $c = $locale == 'en_US' ? ', ' : '、';
                        if( !empty($cats) ){
                            $i = 0;
                            foreach($cats as $cat){
                                $i++;
                               $catName .= $cat->name .$c;
                            }
                        }

                        $catName = trim($catName, '、');
                        $catName = trim($catName, ', ');
                         echo "(".$catName;
                         echo ") "
                    ?>
				</h2>
				<div class="sub_content clearfix">
					<div class="fl">
                        <?php
                            $thumb = get_the_post_thumbnail();
                            echo  $thumb;
                        ?>
					</div>
					<div class="fr">
						<ul class="list_ttl">
                            <?php if( !empty( get_field('start_spot') )   ){ ?>
                                <li><span><?php the_field('start_spot') ?></span>
                                    <ul>
                                    <?php if( !empty( $fields['time_to_next_spot']) ){ ?>
                                        <li>
                                            <?php 
                                                echo $fields['time_to_next_spot'];
                                                if ($locale == 'en_US') { 
                                                    echo " minutes-walk"; 
                                                } else{
                                                    echo "分";
                                                }
                                            ?>
                                        </li>
                                    <?php } ?>
                                    </ul>
                                </li>
                            <?php  } ?>
                            <?php
                                foreach ($spots as $key=>$the_spot) {
                            ?>
                            <?php if( !empty( $the_spot['spot_name'] )   ){ ?>
                                <li><span><?= $the_spot['spot_name'] ?></span>
                                    <ul>
                                    <?php if( !empty( $the_spot['time_to_next_spot'] )   ){ ?>
                                        <li><?php
                                                echo $fields['spots_in_course'][$key]['time_to_next_spot'];
                                                if ($locale == 'en_US') {
                                                    echo " minutes-walk"; 
                                                } else{
                                                    echo "分";
                                                }   
                                            ?>
                                        </li>
                                    <?php } ?>
                                    </ul>
                                </li>
                            <?php  } ?>
                            <?php } ?>
                            <?php if( !empty( get_field('goal_spot') )   ){ ?>
                            <li><span><?php the_field('goal_spot')?></span></li>
                            <?php } ?>
                        </ul>
					</div>
				</div>
				<div class="map">
                    <div class="ova">
                        <?php if( !empty( $detail['course_detail_11'] ) ){ ?>
                        <!-- <img src="<?php echo $detail['course_detail_11'] ?>" alt="" class="hide_640"> -->
                        <img src="<?php echo IMAGE_PATH ?>common/img/course_map1.png" alt="" class="hide_640">
                        <?php } ?>
                        <?php if( !empty( $detail['course_detail_11'] ) ){ ?>
                        <!-- <img src="<?php echo $detail['course_detail_11'] ?>" alt="" class="show_640" id="scale_map"> -->
                        <img src="<?php echo IMAGE_PATH ?>common/img/course_map1.png" alt="" class="show_640" id="scale_map">
                        <?php } ?>
                    </div>
                    <?php if ($locale == 'en_US') { ?>
                        <div class="btn">
                            <?php if( !empty( $detail['course_detail_11'] ) ){ ?>
                                <a onClick="printPdf();"  target="_blank">
                                    <img src="<?php echo IMAGE_PATH ?>common/images/top/btn_map_en_pc.png" alt="MAPを印刷する" class="hide_640">
                                </a>
                                <a class="enlarge_map" target="_blank">
                                   <img src="<?php echo IMAGE_PATH ?>common/images/top/btn_map_en.png" alt="MAPを印刷する" class="show_640">
                                </a>
                            <?php } ?>
                        </div>
                    <?php }else{ ?>
                        <div class="btn">
                            <?php if( !empty( $detail['course_detail_11'] ) ){ ?>
                                <a onClick="printPdf();"  target="_blank">
                                    <img src="<?php echo IMAGE_PATH ?>common/images/top/btn_map.png" alt="MAPを印刷する" class="hide_640">
                                </a>
                                <a class="enlarge_map" target="_blank">
                                   <img src="<?php echo IMAGE_PATH ?>common/images/top/btn_map_sp.png" alt="MAPを印刷する" class="show_640">
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>
					<!-- <div class="btn">
                        <?php if( !empty( $detail['course_detail_11'] ) ){ ?>
    						<a href="<?= $detail['course_detail_12']  ?>"  target="_blank">
    							<img src="<?php echo IMAGE_PATH ?>common/images/course/map_btn.png" alt="" class="hide_640">
    						</a>
    						<a href="<?= $detail['course_detail_12']  ?>" target="_blank">
    							<img src="<?php echo IMAGE_PATH ?>common/images/top/btn_map_sp.png" alt="" class="show_640">
    						</a>
                        <?php } ?>
					</div> -->
				</div>
			</div>

			<div class="right hide_767">
                <?php
                    get_template_part('content','course-right-detail');
                ?>
			</div>
		</article>
	</div>
	<div id="sec2" class="clearfix">
		<article class="inner">
			<div class="left">
				<!-- <h2 class="hide_640"><img src="<?php echo IMAGE_PATH ?>common/images/course/sec2_ttl.png" alt=""></h2>
                <h2 class="show_640"><img src="<?php echo IMAGE_PATH ?>common/images/course/sec2_ttlsp.png" alt=""></h2> -->
                    <h2><img src="<?php echo IMAGE_PATH ?>common/images/course/sec2_ttl_flag.png" alt=""><?php the_field('start_spot') ?><?php _e('出発','kamakura') ?></h2>
				<!-- <h2 class="show_640"><img src="<?php echo IMAGE_PATH ?>common/images/course/sec2_ttlsp.png" alt=""></h2> -->
                <p class="text"><?= get_the_content() ?></p>

			</div>
		</article>
	</div>
	<div id="sec3" class="clearfix">
		<article class="inner">
			<div class="left">
				
                <?php if( !empty($spots) ){ $i = 0?>
                    <?php 
                        foreach( $spots as $spot ){ $i++;    
                            $terms = array();
                            if( !empty( $spot['course_25'] ) ){
                                foreach($spot['course_25'] as $sp)
                                { 
                                    $terms[] = get_term_by('term_taxonomy_id', $sp ,'course_area');
                                }
                            }
                            if($i%2 == 0){
                                include(locate_template('course_detail/even.php'));
                            }else{
                                include(locate_template('course_detail/odd.php'));
                            }
                    ?>
                            
                    <?php } ?>
                <?php  } ?>
				
			</div>

		</article>
	</div>
	<div class="courseMap">
    <?php if( !empty($detail['course_detail_23']) ) { 
        $maps = $detail['course_detail_23'];
        ?>
		<article class="inner mapGreen">
			<div class="left" style="float:none;">
				<div class="gmapWrap">
					<div class="gmap">
					<!-- <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCsUtAi2xVAVvrW3LVaAcpe8owo-T4dDwc&q=<?= $maps['address'] ?>&center=<?= $maps['lat'].','.$maps['lng'] ?>" width="640" height="480"></iframe> -->
                    <iframe src="<?php echo $maps ?>" width="640" height="480"></iframe>

					</div>
				</div>
			</div>
			<!--<p class="text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>\-->
		</article>
        <?php } ?>
	</div>
	<article class="inner">
        <div class="right show_767">
            <?php
                get_template_part('content','course-right-detail-bottom');
            ?>
        </div>
	</article>
</div>
<?php get_footer(); ?>
