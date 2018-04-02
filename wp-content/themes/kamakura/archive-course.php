<?php
/* Template Name: Event */
get_header(); 
$translations = pll_the_languages(array('raw'=>1));
get_template_part('content', 'course');
?>


<?php 
get_footer();
?>