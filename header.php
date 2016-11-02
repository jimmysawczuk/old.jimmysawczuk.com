<!DOCTYPE html>
<html lang="en" xml:lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
	<head>
		<meta charset="utf-8" />
		<title><?=MODE == "live"? "" : "[" . MODE . "] "; ?><? page_title(); ?></title>
		<? load_stylesheet('style'); ?>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<script src="<?=get_min_url('jquery'); ?>" type="text/javascript" charset="utf-8"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<? fb_og_tags(); ?>
		<? twitter_card_tags(); ?>
		<link rel="apple-touch-icon" href="<? bloginfo('stylesheet_directory'); ?>/images/apple-touch-icon.png" />
		<meta name="apple-mobile-web-app-title" content="CC&CS" />
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400italic,700,700italic,300italic,300|Mako|Roboto+Slab:400,700|Lato" rel="stylesheet" type="text/css" />
		<? wp_head(); ?>
		<script type="text/javascript">
			var Config = <?=json_encode(array(
				'stylesheet_directory' => get_bloginfo("stylesheet_directory"),
				'is_single' => is_single(),
				'is_page' => is_page(),
				'sidebar_visible' => defined('HIDE_SIDEBAR') && HIDE_SIDEBAR? false : true,
			)); ?>;
		</script>
		<!--[if IE 7]><script type="text/javascript">$('html').addClass('ie7');</script><![endif]-->
		<!--[if IE 8]><script type="text/javascript">$('html').addClass('ie8');</script><![endif]-->
		<? if (MODE === "live") require(dirname(__FILE__) . '/includes/ga.php'); ?>
		<? if (MODE === "live") require(dirname(__FILE__) . '/includes/fb_pixel.php'); ?>
	</head>
	<body>
		<div id="bg"></div>
		<div id="section411-banner">
			<a href="https://section411.com/?utm_source=jimmysawczuk.com">
				Hey! My new website is <b>Section 411</b>. It's a lot like this site, except it's about 100% newer. Click here to check it out!
			</a>
		</div>
		<div id="tab_container">
			<div id="container">
				<div id="header">
					<h1><a href="<? bloginfo('url'); ?>">Cleveland, Curveballs<br />and Common Sense</a></h1>
				</div>
				<div id="nav">
					<div class="bezel left_bezel"></div>
					<div class="bezel right_bezel"></div>
					<ul>
						<li class="switch"><a href="javascript: void(0);">Menu</a></li>
						<li class="first"><a href="<? bloginfo('url'); ?>" title="Home">Home</a></li>
						<li><a href="<? bloginfo('url'); ?>/contact" title="About Me">About Me</a></li>
						<li><a href="<? bloginfo('url'); ?>/projects" title="Projects">Projects</a></li>
						<li><a href="<? bloginfo('url'); ?>/ballparks" title="Ballparks">Ballparks</a></li>
						<li class="last"><a href="<? bloginfo('url'); ?>/resume" target="_blank" title="Resume">Resum&eacute;</a></li>
					</ul>

					<div id="search" class="empty">
						<form method="get" action="<? bloginfo('url'); ?>">
							<input type="text" name="s" id="search_text" data-description="Search" />
							<button type="submit" id="search_submit"><img src="<? bloginfo('stylesheet_directory'); ?>/images/search.png"></button>
						</form>
					</div>
				</div>
				<div id="content" class="<?=defined('PAGE_TEMPLATE')? PAGE_TEMPLATE : '' ?> <?=defined('HIDE_SIDEBAR') && HIDE_SIDEBAR? 'hide_sidebar' : '' ?>" >
