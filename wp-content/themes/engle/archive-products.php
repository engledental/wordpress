<?php get_header(); ?>

<section class="products-hero">
  <div class="container container--narrow">
    <h1 class="title__h1">Our Products</h1>
    <h2 class="title__h3"><?php the_field('product_page_subtitle', 'options'); ?></p>
  </div>
</section>

<nav class="products-nav">
  <div class="container container--narrow">
		<?php
			$terms = get_terms(array(
		    'taxonomy' => 'products_category',
		    'hide_empty' => false,
			));
		?>
		<ul>
			<li><a href="/products/" class="is-active">Show All</a></li>
			<?php foreach ($terms as $term) { ?>
				<li><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term->name; ?></a></li>
			<?php } ?>
		</ul>
  </div>
</nav>

<section class="products">
  <div class="container container--narrow">

    <div class="product-grid">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="product-grid__item col-1-3">
          <a href="<?php the_permalink(); ?>" class="product-grid__link">
            <div class="product-grid__image">
							<?php
								$attachmentID = get_post_thumbnail_id();
								$src = wp_get_attachment_image_src($attachmentID, 'product-thumb');
								$srcset = wp_get_attachment_image_srcset($attachmentID, 'product-thumb');
							?>
							<img src="<?=$src[0]?>" srcset="<?=$srcset?>" alt="<?php the_title(); ?>" />
            </div>
            <h3 class="product-grid__title"><?php the_title(); ?></h3>
          </a>
        </div>

			<?php endwhile; endif; ?>

		</div>

    <?php
      if (function_exists("pagination")) {
        pagination($post->max_num_pages);
      }
    ?>

  </div>
</section>

<?php get_footer(); ?>
