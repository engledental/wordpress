<?php /* Template Name: Support */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h1><?php the_title(); ?></h1>

	<?php Ninja_Forms()->display( 2 ); ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
