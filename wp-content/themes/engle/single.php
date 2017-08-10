<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article class="post">

		<h1><?php the_title(); ?></h1>

		<p class="post-meta"><a href="<?php echo get_term_link($category[1]); ?>"><?php echo $category[1]->name; ?></a> / Posted on <?php the_date('n-j-y'); ?></p>

		<div class="post-hero">
			<?php
			$attachmentID = get_post_thumbnail_id();
			$src = wp_get_attachment_image_src($attachmentID, 'full-post-image');
			$srcset = wp_get_attachment_image_srcset($attachmentID, 'full-post-image'); ?>
			<img src="<?=$src[0]?>" srcset="<?=$srcset?>" />
		</div>

		<p class="post-author">Posted by <?php the_author(); ?></p>

    <?php get_template_part( 'partials/post-share' ); ?>

		<div class="post-body">
			<?php the_content(); ?>
		</div>

		<div class="post-tags">
			<h4>Tags</h4>
			<?php
			$posttags = get_the_tags();
			if ($posttags) {
			  foreach($posttags as $tag) {
			    echo '<a href="' . get_term_link($tag) . '" class="post-tags--item">' . $tag->name . '</a>';
			  }
			}
			?>
		</div>

	</article>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
