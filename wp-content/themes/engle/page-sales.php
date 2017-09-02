<?php /* Template Name: Sales Directory */ ?>

<?php get_header(); ?>

<section class="sales-hero bg--purple">
  <div class="container container--narrow">
    <h1 class="title__h1"><?php the_field('page_title'); ?></h1>
    <h2 class="title__h3"><?php the_field('page_subtitle'); ?></p>
  </div>
</section>

<section class="sales-directory bg--purple">
  <div class="container container--narrow">

		<?php if( have_rows('directory') ): ?>
			<div class="sales-region">
				<?php while ( have_rows('directory') ) : the_row(); ?>
					<h3 class="sales-region__title title__h2"><span><?php the_sub_field('region'); ?></span></h3>

					<div class="sales-region">
						<div class="sales-table">
							<?php while ( have_rows('representatives') ) : the_row(); ?>

				        <div class="sales-table__row">
				          <div class="sales-table__col">
				            <p><?php the_sub_field('name'); ?></p>
				          </div>
				          <div class="sales-table__col">
										<p><?php the_sub_field('phone'); ?></p>
				          </div>
				          <div class="sales-table__col">
										<p><?php the_sub_field('states'); ?></p>
				          </div>
				          <div class="sales-table__col">
				            <a href="mailto:<?php the_sub_field('email'); ?>">
				              <svg class="icon-email">
				                <use xlink:href="#icon-email"></use>
				              </svg>
				            </a>
				          </div>
				        </div>
							<?php endwhile; ?>
						</div>
					</div>

				<?php endwhile; ?>
			</div>
		<?php endif; ?>

    <footer class="sales-footer">
      <p><?php the_field('footer_subtitle'); ?></p>
    </footer>

  </div>
</section>

<?php get_footer(); ?>
