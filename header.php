<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title><?php bloginfo('name')?> <?php wp_title('-'); ?></title>
		<meta name="description" content="<?php bloginfo('name')?> <?php wp_title('-'); ?>">

		<meta property="og:type" content="website"/>
		<meta property="og:title" content="><?php bloginfo('name')?> <?php wp_title('-'); ?>"/>
		<meta property="og:description" content="><?php bloginfo('name')?> <?php wp_title('-'); ?>"/>
		<meta property="og:url" content="<?php bloginfo('url'); ?>"/>
		<meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/img/og-image.png"/>

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">
		<script>document.documentElement.classList.add("js");</script>
        <?php wp_head(); ?>
    </head>
	<body>

		<header class="header">
			<div class="container">
				<a href="/" class="grid-4">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/bikcraft.png" alt="Bikcraft">
				</a>
				<nav class="grid-12 header_menu">
				<?php
					$args = array(
						'menu' => 'principal',
						'theme_location' => 'menu-principal',
						'container' => false
					);
					wp_nav_menu( $args );
				?>
				</nav>
			</div>
		</header>