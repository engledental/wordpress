<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta content="width=device-width, initial-scale=1.0, user-scalable=1, minimum-scale=1.0" name="viewport">
	<?php get_template_part( 'partials/favicons' ); ?>
	<?php wp_head(); ?>
	<!-- Google Analytics -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-69136342-3', 'auto');
		ga('send', 'pageview');
	</script>
	<!-- End Google Analytics -->
</head>
<body <?php body_class(); ?>>
	<?php get_template_part( 'partials/svg' ); ?>

	<header class="site-header">
		<div class="container">
			<div class="site-logo">
				<a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo.svg" alt="Engle Dental" /></a>
			</div>
			<nav class="main-nav">
				<a href="#" class="nav-toggle">
					<div class="nav-toggle__bar"></div>
				</a>
				<?php wp_nav_menu( array( 'menu' => 'Main Menu', 'container'=>'' ) ); ?>
			</nav>
		</div>
	</header>

	<main class="main" role="main">
