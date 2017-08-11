<?php /* Template Name: Support */ ?>

<?php get_header(); ?>

<section class="support-hero">
	<div class="support-hero__bg"></div>

	<div class="container">

		<div class="support-hero__content">
			<h1 class="support-hero__title title__h1"><?php the_field('hero_title'); ?></h1>
			<p class="support-hero__subtitle paragraph--large"><?php the_field('hero_content'); ?></p>
			<p><a href="#tech-support" class="btn btn--turq"><?php the_field('hero_button_label'); ?></a></p>
		</div>

	</div>
</section>

<section class="video-tutorials">
	<div class="container container--narrow">
		<h2 class="video-tutorials__title title__h2"><?php the_field('video_section_title'); ?></h2>

		<?php if( have_rows('videos') ): ?>
			<div class="video-grid flex-grid">
				<?php while ( have_rows('videos') ) : the_row(); ?>
					<div class="video-grid__item col-1-2">
						<div class="video-embed">
							<?php the_sub_field('video_url'); ?>
						</div>
						<h3 class="video-title title__h4"><?php the_sub_field('video_title'); ?></h3>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>

	</div>
</section>

<section id="tech-support" class="tech-support bg--purple">
	<div class="container container--narrow">

		<h3 class="tech-support__title title__h2"><span><?php the_field('form_section_title'); ?></span></h3>

		<div class="tech-support-grid flex-grid">
			<div class="tech-support-grid__form col-2-3">
				<?php Ninja_Forms()->display( 2 ); ?>
			</div>
			<div class="tech-support-grid__contact-info col-1-3">
				<p>Technical Support<br />
				Toll Free: <?php the_field('toll_free_phone_number', 'options'); ?><br />
				Fax: <?php the_field('fax_number', 'options'); ?></p>
				<p>Available <?php the_field('support_hours', 'options'); ?><br />
				Monday-Friday</p>
			</div>
		</div>

	</div>
</section>


<?php get_footer(); ?>
