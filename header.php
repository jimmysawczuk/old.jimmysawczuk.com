<!DOCTYPE html>
<html lang="en" xml:lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
	<head>
		<title><? bloginfo('name'); ?></title>
		<link href='//fonts.googleapis.com/css?family=Arvo:400,700|Mako' rel='stylesheet' type='text/css'>
		<link href="<? bloginfo('stylesheet_directory'); ?>/css/style.css" type="text/css" rel="stylesheet" />
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<script src="<? bloginfo('stylesheet_directory'); ?>/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="<? bloginfo('stylesheet_directory'); ?>/js/jquery.ui.min.js" type="text/javascript" charset="utf-8"></script>
		<meta name="viewport" content="width=1050, maximum-scale=1.0" />
		<? fb_og_tags(); ?>
		<? wp_head(); ?>
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-3634519-4']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
	</head>
	<body>
		<div id="tab_container">
			<div id="container">
				<div id="header">
					<h1><a href="<? bloginfo('url'); ?>">Cleveland, Curveballs<br />and Common Sense</a></h1>
				</div>
				<div id="nav">
					<ul>
						<li class="first"><a href="<? bloginfo('url'); ?>" title="Home">Home</a></li>
						<li><a href="<? bloginfo('url'); ?>/contact" title="About Me">About Me</a></li>
						<li><a href="<? bloginfo('url'); ?>/projects" title="Projects">Projects</a></li>
						<li><a href="http://code.jimmysawczuk.com" target="_blank" title="Code">Code</a></li>
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
