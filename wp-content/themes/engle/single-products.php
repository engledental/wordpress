<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <section class="single-product">
    <div class="container">

      <div class="single-product-grid">

        <div class="product-image">
          <div class="product-image-wrapper">
						<?php
							$attachmentID = get_post_thumbnail_id();
							$src = wp_get_attachment_image_src($attachmentID, 'product-image');
							$srcset = wp_get_attachment_image_srcset($attachmentID, 'product-image');
						?>
						<img src="<?=$src[0]?>" srcset="<?=$srcset?>" alt="<?php the_title(); ?>" />
            <div class="product-ctas">
              <ul>
                <li><a href="<?php echo site_url('/sales-directory/'); ?>">Find a Representative</a></li>
                <li><a href="<?php echo site_url('/contact-us/'); ?>">Request More Info</a></li>
              </ul>
            </div>
          </div>
          <div class="product-support-link">
            <p><a href="<?php echo site_url('/support/'); ?>">Technical Support</a></p>
          </div>
        </div>

        <div class="product-content">
          <h1 class="product-title"><?php the_title(); ?></h1>

          <div class="body-content">
						<?php the_content(); ?>
						<?php $doc = get_field('service_doc'); ?>
						<?php if($doc): ?>
	            <p class="product-download"><a href="<?php echo $doc; ?>" target="_blank">Download Service Doc</a></p>
						<?php endif; ?>
          </div>

					<?php $options = get_field('available_options'); ?>
					<?php if($options): ?>
	          <div class="product-options">
	            <h4 class="product-options__title">Available Options:</h4>
	            <p><?php echo $options; ?></p>
	          </div>
					<?php endif; ?>
        </div>

      </div>

    </div>
  </section>

  <section class="related-products">
    <div class="container container--narrow">
      <h3 class="related-products__title title__h3">Related Products</h3>

      <div class="product-grid">

        <div class="product-grid__item col-1-3">
          <a href="/product.html" class="product-grid__link">
            <div class="product-grid__image">
              <img src="/dist/images/product-fpo-01.jpg" alt="" />
            </div>
            <h3 class="product-grid__title">AS Post Mount Telescopic Arm</h3>
          </a>
        </div>

        <div class="product-grid__item col-1-3">
          <a href="#" class="product-grid__link">
            <div class="product-grid__image">
              <img src="/dist/images/product-fpo-02.jpg" alt="" />
            </div>
            <h3 class="product-grid__title">AS-1 Dual Purpose Table Top Cart</h3>
          </a>
        </div>

        <div class="product-grid__item col-1-3">
          <a href="#" class="product-grid__link">
            <div class="product-grid__image">
              <img src="/dist/images/product-fpo-01.jpg" alt="" />
            </div>
            <h3 class="product-grid__title">AS Post Mount Telescopic Arm</h3>
          </a>
        </div>

        <div class="product-grid__item col-1-3">
          <a href="#" class="product-grid__link">
            <div class="product-grid__image">
              <img src="/dist/images/product-fpo-01.jpg" alt="" />
            </div>
            <h3 class="product-grid__title">AS Post Mount Telescopic Arm</h3>
          </a>
        </div>

      </div>

    </div>
  </section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
