<?php

function spark_enqueue_scripts(){
	//wp_enqueue_script('template-default-js');
}
//add_action('wp_enqueue_scripts');

get_header(); ?>

<section id="content" role="main">
    <?php
    // Loop
    if( have_posts() ):

        while ( have_posts() ) : the_post();

        endwhile;

    else :

        echo 'Not Found.';

    endif;
    ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer();
