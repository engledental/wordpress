<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

<section class="home-hero">

	<div id="hero-slider" class="home-hero__slider hero-slider">
		<div class="slide slide-01"></div>
		<div class="slide slide-02"></div>
		<div class="slide slide-03"></div>
	</div>

	<div class="container">
		<div class="home-hero__content">
			<h1 class="home-hero__title title__h1"><?php the_field('hero_title'); ?></h1>
			<p class="home-hero__subtitle paragraph--large"><?php the_field('hero_content'); ?></p>
			<p><a href="http://www.engledental.com/the-traverse-chair/" class="btn btn--turq">Learn More</a></p>
		</div>
	</div>

</section>

<section class="home-perform">
	<div class="container">

		<h2 class="section-title">Engineered to Perform</h2>

		<?php if( have_rows('hero_benefits') ): ?>
			<div class="home-perform__grid flex-grid">
		    <?php while ( have_rows('hero_benefits') ) : the_row(); ?>
					<div class="home-perform__grid--usa col-1-3">
						<div class="home-perform__icon">
			      	<?php the_sub_field('benefit'); ?>
						</div>
						<h3 class="title__h3"><?php the_sub_field('title'); ?></h3>
						<p><?php the_sub_field('content'); ?></p>
					</div>
		    <?php endwhile; ?>
			</ul>
		<?php endif; ?>

	</div>
</div>

<!-- <section class="treatments-image">
	<?php $image = get_field('hero_image'); ?>
	<img src="<?php echo $image["sizes"]['full-width-image']; ?>" srcset="<?php echo $image["sizes"]['full-width-image']; ?> 1000w, <?php echo $image["sizes"]['full-width-image-2x']; ?> 2000w" alt="Oceana Vein Clinic Office" />
</section> -->

<section class="home-products">
  <div class="container">

    <h2 class="section-title">Engle Dental Products</h2>

    <div class="home-products__grid flex-grid">
      <div class="home-products__grid--light-system col-1-5">
        <a href="">
          <h3 class="title__h3">Light Systems</h3>
        </a>
      </div>
      <div class="home-products__grid--mobile-carts col-1-5">
        <a href="">
          <h3 class="title__h3">Mobile Carts</h3>
        </a>
      </div>
      <div class="home-products__grid--utility-centers col-1-5">
        <a href="">
          <h3 class="title__h3">Utility Centers</h3>
        </a>
      </div>
      <div class="home-products__grid--chair-mount-cupsidors col-1-5">
        <a href="">
          <h3 class="title__h3">Chair Mount Cupsidors</h3>
        </a>
      </div>
      <div class="home-products__grid--assistant-arms col-1-5">
        <a href="">
          <h3 class="title__h3">Assistant Arms</h3>
        </a>
      </div>
    </div>

    <div class="home-products__footer">
      <p><a href="" class="btn btn--outline">Explore More</a></p>
    </div>

  </div>
</section>

<section class="home-contact">
  <div class="container">

    <h2 class="home-contact__title title--light"><?php the_field('cta_section_title'); ?></h2>
    <p class="home-contact__subtitle paragraph--large"><?php the_field('cta_section_subtitle'); ?></p>
    <p><a href="<?php the_field('cta_section_button_link'); ?>" class="btn btn--outline"><?php the_field('cta_section_button_label'); ?></a></p>

    <div class="home-contact__icon">
      <img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-logo-e.svg" alt="" />
    </div>

  </div>
</section>

<?php get_footer(); ?>
