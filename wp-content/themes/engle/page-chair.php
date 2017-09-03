<?php /* Template Name: Traverse Chair */ ?>

<?php get_header(); ?>

<section class="chair-hero">

	<?php if( have_rows('hero_titles') ): ?>
		<?php
			$bg_image = get_field('hero_background_image');
			$src = wp_get_attachment_image_src($bg_image, 'hero-bg');
			$src_2x = wp_get_attachment_image_src($bg_image, 'hero-bg-2x');
		?>
		<style type="text/css" scoped>
			.chair-hero__slider { background-image: url('<?=$src[0]?>'); }
			@media (min-width: 50em) {
				.chair-hero__slider { background-image: url('<?=$src_2x[0]?>'); }
			}
		</style>
		<div id="hero-slider" class="chair-hero__slider hero-slider">
	    <?php while ( have_rows('hero_titles') ) : the_row(); ?>
				<div class="slide">
		      <div class="container">
						<h1 class="chair-hero__title title__h1"><?php the_sub_field('title'); ?></h1>
					</div>
		    </div>
	    <?php endwhile; ?>
		</div>
	<?php endif; ?>

</section>

<section class="chair-intro bg--purple">
  <div class="container">
    <div class="chair-intro__header">
      <h2 class="title__h1"><?php the_field('intro_title'); ?></h2>
			<?php the_field('intro_content'); ?>
    </div>

    <div class="chair-intro__highlights">
      <div class="chair-intro__image">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/chair-demo.svg" alt="" />
      </div>
      <div class="chair-intro__list">
				<?php if( have_rows('intro_list') ): ?>
					<ul>
				    <?php while ( have_rows('intro_list') ) : the_row(); ?>
							<li class="title__h3"><?php the_sub_field('list_item'); ?></li>
				    <?php endwhile; ?>
					</ul>
				<?php endif; ?>
      </div>
    </div>
  </div>
</section>

<section class="chair-features bg--purple">
  <div class="container">
    <div class="chair-features__header">
      <h2 class="chair-features__title title__h1"><?php the_field('features_title'); ?></h2>
      <h3 class="chair-features__subtitle"><?php the_field('features_subtitle'); ?></h3>
    </div>

    <div class="chair-features__visuals">
      <div class="chair-features__image">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/chair-cutout.png" alt="" />
      </div>
      <div class="chair-features__icon">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-logo-e.svg" alt="" />
      </div>
    </div>

		<?php if( have_rows('features') ): ?>
			<div class="chair-features__list">
				<?php while ( have_rows('features') ) : the_row(); ?>
					<div class="chair-features__list-item">
		        <h4 class="title__h3"><?php the_sub_field('title'); ?></h4>
		        <p><?php the_sub_field('content'); ?></p>
		      </div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>

  </div>
</section>

<section class="cta-section bg--purple">
  <div class="container">
    <h3 class="title--light"><?php the_field('cta_section_title'); ?></h3>
    <p class="paragraph--large"><?php the_field('cta_section_subtitle'); ?></p>
    <p><a href="<?php the_field('cta_section_button_link'); ?>" class="btn btn--outline"><?php the_field('cta_section_button_label'); ?></a></p>
  </div>
</section>

<?php get_footer(); ?>
