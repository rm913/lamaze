<?php
/* Template Name: Demo Template */

function spark_enqueue_scripts(){
	//wp_enqueue_script('template-default-js');
}
//add_action('wp_enqueue_scripts', 'spark_enqueue_scripts');

get_header();
?>




<?php get_sidebar(); ?>
<?php get_footer();
