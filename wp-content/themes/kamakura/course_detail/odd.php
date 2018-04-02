<?php
   $i = $i < 10 ? '0'.$i : $i;
   $locale = get_locale();
   $current_lang = getCurrentLangDefault();
?>
<div class="clearfix">
<div class="fr">
    <p class="spotttl">Spot.<?= $i ?></p>
    <h3><?= !empty( $spot['spot_name'] ) ? $spot['spot_name'] : '' ?></h3>
    <p class="desc"><?=  $spot['course_14']  ?></p>
    <div class="note">
        <?php if( !empty( $terms ) ){ ?>
            <?php foreach ( $terms as $key => $term){ ?>
                <span class="<?= $term->slug ?>"><?=  $term->name ?></span>
            <?php } ?>
        <?php } ?>  
    </div>
    <?php 
        if ($current_lang == 'en') {
    ?>
        <a href="<?= !empty( $spot['course_26'] )? getUrlSite().'/'.$spot['course_26'].'?a=course' : 'javascript:;'  ?>" class="hide_640">
            <img src="<?php echo IMAGE_PATH ?>common/images/course/sec3_btn_en.png" alt="" class="max100">
        </a>
    <?php } else { ?>
        <a href="<?= !empty( $spot['course_26'] )? getUrlSite().'/'.$spot['course_26'].'?a=course' : 'javascript:;'  ?>" class="hide_640">
            <img src="<?php echo IMAGE_PATH ?>common/images/course/sec3_btn.png" alt="" class="max100">
        </a>
    <?php } ?>
</div>
<div class="fl">
    <?php if($spot['course_27']){ ?>
        <img src="<?php echo $spot['course_27']['url'] ?>" alt="" width="100%" class="img-res">
    <?php } ?>
    <?php 
        if ($current_lang == 'en') {
    ?>
    <a href="<?= !empty( $spot['course_26'] )? getUrlSite().'/'.$spot['course_26'].'?a=course' : 'javascript:;'  ?>" class="show_640 text_center btn2">
        <img src="<?php echo IMAGE_PATH ?>common/images/course/sec3_btn_en.png" alt="">
    </a>
    <?php } else { ?>
    <a href="<?= !empty( $spot['course_26'] )? getUrlSite().'/'.$spot['course_26'].'?a=course' : 'javascript:;'  ?>" class="show_640 text_center btn2">
        <img src="<?php echo IMAGE_PATH ?>common/images/course/sec3_btn.png" alt="">
    </a>
    <?php } ?>
</div>
</div>
<p class="text">
    <?=  $spot['course_15']  ?>
    
</p>
<?php
    foreach($spot['course_16'] as $the_point) {
?>
<img src="<?php echo IMAGE_PATH ?>common/images/course/point_1.png" alt="" width="100%" class="hide_640">
<img src="<?php echo IMAGE_PATH ?>common/images/course/point_101.png" alt="" width="100%" class="show_640">
<p class="text2">
    <?=  $the_point['course_point'] ?>
</p>
<img src="<?php echo IMAGE_PATH ?>common/images/course/point_line.png" alt="" width="100%">
<?php
    }
?>
<?php
    if (!empty($spot['recommend'])) {
        $recommend = $spot['recommend'];
?>
<div class="chat_content">
<h3><img src="<?php echo IMAGE_PATH ?>common/images/course/deco_1.png" alt=""><?php _e('学芸員のおススめ！！','kamakura') ?></h3>
<?php
    foreach ($recommend as $the_recommend) { 
        if ($the_recommend["speaker"] == 2)  { // 話者が学芸員の場合
?>
    <?php if( !empty(  $spot['course_18'] ) ){ // 学芸員名 ?>
        <div class="ttl"><span><?= $spot['course_18'] ?></span></div>
    <?php } ?>
    <div class="clearfix cb2">
        <div class="chatbox2">
        <?php if( !empty(  $the_recommend['conversation']) ){ ?>
            <?= $the_recommend['conversation'] ?>
        <?php } ?>
        </div>
        <?php if( !empty(  $spot['course_19'] )) { // 学芸員写真{ ?>
        <div class="lady">
            <img src="<?php echo $spot['course_19'] ?>" alt="">
        </div>
        <?php } ?>
    </div>
<?php
        } else { // 話者が小町・しらすの場合
?>
    <div class="clearfix cb1">
        <div class="girl">
            <img src="<?php echo IMAGE_PATH ?>common/images/course/girl.png" alt="">
        </div>
        <?php if( !empty(  $the_recommend['conversation']) ) { ?>
            <div class="chatbox"><?= $the_recommend['conversation']  ?></div>
        <?php } ?>
    </div>
<?php
        }
    }
?>
</div>
<?php
    }
?>
    <div class="sep">
        <span>
            <img src="<?php echo IMAGE_PATH ?>common/images/course/step.png" alt="">
            <?php 
                if ($current_lang == 'en') {
                    echo $spot['time_to_next_spot'] . "minutes-walk";
                } else{
                    echo $spot['time_to_next_spot'] . "分";
                }
                // echo $spot['time_to_next_spot'] . "分"  
            ?>
        </span>
    </div>