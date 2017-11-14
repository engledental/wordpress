<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section class="global-page">
	<div class="container container--narrow">

		<div class="flex-grid">

			<div class="col-2-3">
				<h1 class="page-title title__h1"><?php the_title(); ?></h1>
				<div class="body-content">
					<?php the_content(); ?>
				</div>
			</div>

			<aside class="sidebar-right col-1-3">
				<div class="contact-info">
					<div class="contact-info-wrapper">
						<h3><?php the_field('contact_block_title', 'options'); ?></h3>
						<h4>Call Us</h4>
						<p><?php the_field('phone_number', 'options'); ?></p>

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
							<li><a href="mailto:<?php the_field('email', 'options'); ?>">Send Us Feedback</a></li>
							<li><a href="<?php the_field('serial_number_document', 'options'); ?>" target="_blank"><?php the_field('serial_number_link_label', 'options'); ?></a></li>
						</ul>
					</div>
				</div>
			</aside>

		</div>

	</div>
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
