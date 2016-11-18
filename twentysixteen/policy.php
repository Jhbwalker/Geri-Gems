<?php

/**

 * Template Name: Policy Page

 *

 * @package WordPress

 * @subpackage Twenty_Sixteen

 * @since Twenty Sixteen 1.0

 */



get_header(); ?>

<div class="mainContent">
    	<div class="container">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<h2><?php the_title(); ?></h2>
<p><?php the_content(); ?></p>
<?php endwhile; endif; ?>

 	</div>
	</div>

<?php

//get_sidebar();

get_footer();
?>




