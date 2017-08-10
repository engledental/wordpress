<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<h1><?php printf( __( 'Search Results for: %s', 'twentysixteen' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>

	<?php while ( have_posts() ) : the_post(); ?>

		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

	<?php endwhile;
endif; ?>

<?php get_footer(); ?>
