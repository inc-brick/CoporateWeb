<?php
/**
 * The template for displaying the header.
 *
 * @package brick
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/404.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/archive.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/comments.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/footer.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/galleries.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/header.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/pageheader.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/pagination.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/plugins.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/postnavigation.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/primarymenu.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/singlepostpage.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/widgets.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/mediaqueries.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/front.css" type="text/css" />

<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP|Roboto&display=swap" rel="stylesheet">
<? wp_enqueue_script('jquery'); ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<a class="skip-link btn btn-accent screen-reader-text" href="#main">
		<?php esc_html_e( 'Skip to content', 'brick' ); ?>
	</a>

	<header id="masthead" class="site-header site-header--fixed">

		<div class="site-header__branding site-branding">
			<?php brick_site_logo(); ?>
			<?php brick_site_title(); ?>
		</div>

	</header>
