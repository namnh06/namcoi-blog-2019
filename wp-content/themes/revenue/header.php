<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package revenue
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2040865810414258",
    enable_page_level_ads: true
  });
</script>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="true">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if (get_theme_mod('favicon', '') != null) { ?>
<link rel="icon" type="image/png" href="<?php echo esc_url( get_theme_mod('favicon', '') ); ?>" />
<?php } ?>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<?php wp_head(); ?>
<?php
	$primary_font = 'Roboto';
	$secondary_font = 'Roboto';
	$primary_color = get_theme_mod('primary-color', '#000000');
	$secondary_color = get_theme_mod('secondary-color', '#445878');	
?>
<style type="text/css" media="all">
	body,
	input,
	input[type="text"],
	input[type="email"],
	input[type="url"],
	input[type="search"],
	input[type="password"],
	textarea,
	table,
	.sidebar .widget_ad .widget-title,
	.site-footer .widget_ad .widget-title {
		font-family: "<?php echo $primary_font; ?>", "Helvetica Neue", Helvetica, Arial, sans-serif;
	}
	#secondary-menu li a,
	.footer-nav li a,
	.pagination .page-numbers,
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	.comment-form label,
	label,
	h1,h2,h3,h4,h5,h6 {
		font-family: "<?php echo $secondary_font; ?>", "Helvetica Neue", Helvetica, Arial, sans-serif;
	}
	a:hover,
	.site-header .search-icon:hover span,
	.sf-menu li a:hover,
	.sf-menu li li a:hover,
	.sf-menu li.sfHover a,
	.sf-menu li.current-menu-item a,
	.sf-menu li.current-menu-item a:hover,
	.breadcrumbs .breadcrumbs-nav a:hover,
	.read-more a,
	.read-more a:visited,
	.entry-title a:hover,
	article.hentry .edit-link a,
	.author-box a,
	.page-content a,
	.entry-content a,
	.comment-author a,
	.comment-content a,
	.comment-reply-title small a:hover,
	.sidebar .widget a,
	.sidebar .widget ul li a:hover {
		color: <?php echo $primary_color; ?>;
	}
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	.entry-category a,
	.pagination .prev:hover,
	.pagination .next:hover,
	#back-top a span {
		background-color: <?php echo $primary_color; ?>;
	}
	.read-more a:hover,
	.author-box a:hover,
	.page-content a:hover,
	.entry-content a:hover,
	.widget_tag_cloud .tagcloud a:hover:before,
	.entry-tags .tag-links a:hover:before,
	.content-loop .entry-title a:hover,
	.content-list .entry-title a:hover,
	.content-grid .entry-title a:hover,
	article.hentry .edit-link a:hover,
	.site-footer .widget ul li a:hover,
	.comment-content a:hover {
		color: <?php echo $secondary_color; ?>;
	}	
	#back-top a:hover span,
	.bx-wrapper .bx-pager.bx-default-pager a:hover,
	.bx-wrapper .bx-pager.bx-default-pager a.active,
	.bx-wrapper .bx-pager.bx-default-pager a:focus,
	.pagination .page-numbers:hover,
	.pagination .page-numbers.current,
	.sidebar .widget ul li:before,
	.widget_newsletter input[type="submit"],
	.widget_newsletter input[type="button"],
	.widget_newsletter button {
		background-color: <?php echo $secondary_color; ?>;
	}
	.slicknav_nav,
	.header-search,
	.sf-menu li a:before {
		border-color: <?php echo $secondary_color; ?>;
	}
</style>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header clear">

		<div class="container">

		<div class="site-branding">

			<?php if (get_theme_mod('logo', get_template_directory_uri().'/assets/img/logo.png') != null) { ?>
			
			<div id="logo">
				<span class="helper"></span>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo get_theme_mod('logo', get_template_directory_uri().'/assets/img/logo.png'); ?>" alt=""/>
				</a>
			</div><!-- #logo -->

			<?php } else { ?>

			<div class="site-title">
				<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			</div><!-- .site-title -->

			<?php } ?>

		</div><!-- .site-branding -->		

		<nav id="primary-nav" class="primary-navigation">

			<?php 
				if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu' ) );
				} else {
			?>

				<ul id="primary-menu" class="sf-menu">
					<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('Add menu for location: Primary Menu', 'revenue'); ?></a></li>
				</ul><!-- .sf-menu -->

			<?php } ?>

		</nav><!-- #primary-nav -->

		<div id="slick-mobile-menu"></div>

		<?php if ( get_theme_mod('header-search-on', true) ) : ?>
			
			<span class="search-icon">
				<span class="genericon genericon-search"></span>
				<span class="genericon genericon-close"></span>			
			</span>

			<div class="header-search">
				<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="search" name="s" class="search-input" placeholder="Search for..." autocomplete="off">
					<button type="submit" class="search-submit"><?php echo __('Search', 'revenue'); ?></button>		
				</form>
			</div><!-- .header-search -->

		<?php endif; ?>						

		</div><!-- .container -->

	</header><!-- #masthead -->	

<div id="content" class="site-content container clear">
