<?php /* Template Name: Contact Us */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<section class="contact-hero bg--purple">
    <div class="container container--narrow">
      <h1 class="title__h1"><?php the_field('page_title'); ?></h1>
      <h2 class="title__h3"><?php the_field('page_content'); ?></p>
    </div>
  </section>

	<section class="contact-form bg--purple">
    <div class="container container--narrow">

      <div class="contact-grid flex-grid">

        <div class="contact-grid__form col-2-3">
					<?php Ninja_Forms()->display( 1 ); ?>
				</div>

				<div class="contact-info col-1-3">
					<div class="contact-info-wrapper">
						<h3><?php the_field('contact_block_title', 'options'); ?></h3>

						<h4>Call Us</h4>
						<p><?php the_field('toll_free_phone_number', 'options'); ?><br />
							<?php the_field('phone_number', 'options'); ?></p>

						<h4>Email</h4>
						<p><a href="mailto:<?php the_field('email', 'options'); ?>"><?php the_field('email', 'options'); ?></a></p>

						<h4>Fax</h4>
						<p><?php the_field('fax_number', 'options'); ?></p>

						<h4>Mailing Address</h4>
						<p><?php the_field('address', 'options'); ?>, <?php the_field('city', 'options'); ?>, <?php the_field('state', 'options'); ?> <?php the_field('zip', 'options'); ?></p>
					</div>
					<div class="contact-links">
						<ul>
							<li><a href="/support/">Technical Support</a></li>
							<li><a href="mailto:<?php the_field('email_address', 'options'); ?>">Send Us Feedback</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
