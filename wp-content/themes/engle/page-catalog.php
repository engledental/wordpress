<?php /* Template Name: Catalog */ ?>

<?php get_header(); ?>

<section class="catalog-hero">
  <div class="container">
    <h1 class="title__h1"><?php the_field('page_title'); ?></h1>
  </div>
</section>

<section class="catalogs">
  <div class="container">

    <?php if( have_rows('catalogs') ): ?>
      <div class="catalog-grid flex-grid">
        <?php while ( have_rows('catalogs') ) : the_row(); ?>
          <div class="catalog-grid__item col-1-2">
            <h2 class="catalog-grid__item-title title__h2"><?php the_sub_field('title'); ?></h2>
            <a href="<?php the_sub_field('pdf'); ?>" class="catalog-grid__item-link">
              <?php
                $image_id = get_sub_field('cover_image');
                $src = wp_get_attachment_image_src($image_id, 'catalog-cover');
                $srcset = wp_get_attachment_image_srcset($image_id, 'catalog-cover');
              ?>
              <img src="<?=$src[0]?>" srcset="<?=$srcset?>" alt="<?php the_sub_field('title'); ?>" />
              <div class="catalog-grid__item-overlay">
                <p>Download PDF</p>
              </div>
            </a>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

  </div>
</section>

<section class="upholstery">
  <div class="container">
    <h2 class="upholstery__title title__h2"><?php the_field('upholstery_section_title'); ?></h2>

    <?php if( have_rows('upholstery_options') ): ?>
      <div class="upholstery-grid flex-grid">
        <?php while ( have_rows('upholstery_options') ) : the_row(); ?>
          <div class="upholstery-grid__item col-1-2">
            <?php
              $image_id = get_sub_field('image');
              $src = wp_get_attachment_image_src($image_id, 'upholstery-thumb');
              $srcset = wp_get_attachment_image_srcset($image_id, 'upholstery-thumb');
            ?>
            <img src="<?=$src[0]?>" srcset="<?=$srcset?>" alt="<?php the_sub_field('title'); ?>" />
            <h3 class="upholstery-grid__item-title"><?php the_sub_field('title'); ?></h3>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

  </div>
</section>

<section class="colors">
  <div class="container">
    <h2 class="colors__title title__h2"><?php the_field('color_section_title'); ?></h2>

    <?php if( have_rows('color_options') ): ?>
      <div class="color-grid">
        <?php while ( have_rows('color_options') ) : the_row(); ?>
          <div class="color-grid__item">
            <?php
              $image_id = get_sub_field('image');
              $src = wp_get_attachment_image_src($image_id, 'color-thumb');
              $srcset = wp_get_attachment_image_srcset($image_id, 'color-thumb');
            ?>
            <img src="<?=$src[0]?>" srcset="<?=$srcset?>" alt="<?php the_sub_field('title'); ?>" />
            <h3 class="color-grid__item-title"><?php the_sub_field('title'); ?></h3>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

    <?php $color_request_link = get_field('color_swatch_request_link'); ?>
    <?php if($color_request_link): ?>
      <div class="colors__footer">
        <p><a href="<?php the_field('color_swatch_request_link'); ?>" class="btn btn--purple"><?php the_field('color_swatch_request_link_label'); ?></a></p>
      </div>
    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>
