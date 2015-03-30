<!DOCTYPE html>
<html lang="en" xml:lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
	<head>
		<title><?=MODE == "live"? "" : "[" . MODE . "] "; ?><? page_title(); ?></title>
		<? load_stylesheet('style'); ?>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<script src="<?=get_min_url('jquery'); ?>" type="text/javascript" charset="utf-8"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<? fb_og_tags(); ?>
		<? twitter_card_tags(); ?>
		<link rel="apple-touch-icon" href="<? bloginfo('stylesheet_directory'); ?>/images/apple-touch-icon.png" />
		<? wp_head(); ?>
		<? if (MODE === "live"): ?>
			<script type="text/javascript">
				var _gaq = _gaq || [];
				_gaq.push(['_setAccount', 'UA-3634519-4']);
				_gaq.push(['_trackPageview']);

				(function() {
					var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
					ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
				})();
			</script>
		<? endif; ?>
		<script type="text/javascript">
			var Config = {
				stylesheet_directory: '<? bloginfo("stylesheet_directory"); ?>',
				is_single: <?=is_single()? 'true' : 'false' ?>,
				is_page: <?=is_page()? 'true' : 'false' ?>,
				sidebar_visible: <?=defined('HIDE_SIDEBAR') && HIDE_SIDEBAR? 'false' : 'true' ?>
			};
		</script>
	</head>
	<body>
		<div id="bg"></div>
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
							<div id="search_text_wrapper" class="input_wrapper">
								<input type="text" name="s" id="search_text" data-description="Search" />
							</div>
							<input type="image" src="<? bloginfo('stylesheet_directory'); ?>/images/search.png" value="" id="search_submit" />
						</form>
					</div>
				</div>
				<div id="content" class="<?=defined('PAGE_TEMPLATE')? PAGE_TEMPLATE : '' ?> <?=defined('HIDE_SIDEBAR') && HIDE_SIDEBAR? 'hide_sidebar' : '' ?>" >
