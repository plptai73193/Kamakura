<?php
/* Template Name: Event */
get_header(); 
$translations = pll_the_languages(array('raw'=>1));
$colors = array(
    1 => 'pink', 2 => 'blue', 3 => 'green'
);

?>

<?php 
get_template_part('content','listevent');
get_footer();
?>