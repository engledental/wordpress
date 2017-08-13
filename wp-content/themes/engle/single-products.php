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
                <li><a href="">Find a Representative</a></li>
                <li><a href="">Request More Info</a></li>
              </ul>
            </div>
          </div>
          <div class="product-support-link">
            <p><a href="">Technical Support</a></p>
          </div>
        </div>

        <div class="product-content">
          <h1 class="product-title"><?php the_title(); ?></h1>

          <div class="body-content">
						<?php the_content(); ?>
            <p class="product-download"><a href="">Download Service Doc</a></p>
          </div>

          <div class="product-options">
            <h4 class="product-options__title">Available Options:</h4>
            <p>2nd H.V.E. w/ 6′ Tubing, Assistant’s 3-Way Air/Water Syringe, 32″ Light Post w/ Pelton Style Adapter, 32″ Light Post w/ Ritter Style Adapter, Engle Chair Mounting Bracket Assembly For 2″ Outside Diameter Post, Light Post Mounted Telescopic Assistant’s Arm, Small J-Box w/ Air &amp; Water Master Valve/Filter/Regulator Assembly Additional Umbilical</p>
          </div>
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
