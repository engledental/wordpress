<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta content="width=device-width, initial-scale=1.0, user-scalable=1, minimum-scale=1.0" name="viewport">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php get_template_part( 'partials/svg' ); ?>

	<header class="site-header">
		<div class="container">
			<div class="site-logo">
				<a href="/"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo.svg" alt="Engle Dental" /></a>
			</div>
			<nav class="main-nav">
				<a href="#" class="nav-toggle">
					<div class="nav-toggle__bar"></div>
				</a>
				<?php wp_nav_menu( array('menu'=>'1', 'container'=>'') ); ?>
			</nav>
		</div>
	</header>

	<main class="main" role="main">
