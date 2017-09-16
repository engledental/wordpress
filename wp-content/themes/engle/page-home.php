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
			<p><a href="<?php the_field('hero_button_link'); ?>" class="btn btn--turq"><?php the_field('hero_button_label'); ?></a></p>
		</div>
	</div>

</section>

<section class="home-intro">
	<div class="container">

		<h2 class="section-title"><?php the_field('intro_title'); ?></h2>

		<?php if( have_rows('intro_content_columns') ): ?>
			<div class="home-intro__grid flex-grid">
		    <?php while ( have_rows('intro_content_columns') ) : the_row(); ?>
					<div class="home-intro__grid-item col-1-3">
						<div class="home-intro__icon">
							<?php $image = get_sub_field('icon'); ?>
			      	<img src="<?php echo $image['url']; ?>" alt="" />
						</div>
						<h3 class="title__h3"><?php the_sub_field('title'); ?></h3>
						<p><?php the_sub_field('content'); ?></p>
					</div>
		    <?php endwhile; ?>
			</ul>
		<?php endif; ?>

	</div>
</div>

<section class="home-products">
  <div class="container">

    <h2 class="section-title"><?php the_field('products_section_title'); ?></h2>

		<?php if( have_rows('products_grid') ): ?>
			<div class="home-products__grid flex-grid">
				<?php while ( have_rows('products_grid') ) : the_row(); ?>
					<?php $term = get_sub_field('category'); ?>
					<div class="home-products__grid-item col-1-5">
		        <a href="<?php echo get_term_link($term); ?>">
		          <h3 class="title__h3"><?php echo $term->name; ?></h3>
		        </a>
		      </div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>

    <div class="home-products__footer">
      <p><a href="<?php the_field('products_section_button_link'); ?>" class="btn btn--outline"><?php the_field('products_section_button_label'); ?></a></p>
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
