<?php 
    function _getCategoryCourse( $taxonomy ) {
    
        $args = array(
            // 'lang' => 'ja', 
            'taxonomy' => $taxonomy,
            'orderby' => 'id',
            'hide_empty' => 0, 
            'order'   => 'ASC'
        );
    
        $cats = get_categories($args);
        return  $cats;
    }
    $catCourse = _getCategoryCourse('course-custom-post');
    $tagCourse  = _getCategoryCourse('course-post-tag');
    $catEvent  = _getCategoryCourse('cource_area');
?>


    <h2><?php _e('テーマから探す','kamakura') ?></h2>
    <?php if( !empty( $catCourse ) ){ ?>
        <ul><!-- Course -->
            <?php foreach($catCourse as $cat){ ?>
            <li><a href="<?= get_term_link( $cat->term_id ); ?>"><?= $cat->name ?></a></li>
            <?php } ?>
        </ul>
    <?php } ?>
    <h2><?php _e('エリアから探す','kamakura') ?></h2>
    <?php if( !empty( $catEvent ) ){ ?>
        <ul><!-- Course -->
            <?php foreach($catEvent as $cat){ ?>
            <li><a href="<?= get_term_link( $cat->term_id ); ?>"><?= $cat->name ?></a></li>
            <?php } ?>
        </ul>
    <?php } ?>
    <h2><?php _e('人気のキーワードから探す','kamakura') ?></h2>
    <?php if( !empty( $tagCourse ) ) {?>
        <div class="tag"> <!-- tag -->
            <?php foreach( $tagCourse as $tag  ){ ?>
            <span class="tag1">
                <a href="<?= get_tag_link( $tag->term_id ); ?>"><?= $tag->name ?></a>
            </span>
            <?php } ?>
        </div>
    <?php } ?>
