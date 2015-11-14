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
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400italic,700,700italic,300italic,300|Mako|Roboto+Slab:400,700" rel="stylesheet" type="text/css" />
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
	</head>
	<body>
		<? if (MODE === "live") require_partial('ga'); ?>
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
					<?=$content ?>
				</div>
			</div>
		</div>
		<div id="copyright">
			&copy; 2008-<?=date("Y"); ?> Jimmy Sawczuk
			&middot;
			<a href="http://github.com/jimmysawczuk/jimmysawczuk.com">Open source</a>; MIT License
			&middot;
			<?
			$fmt = '<a href="http://github.com/jimmysawczuk/jimmysawczuk.com/commit/%R" title="Branch: %b">%r</a>; <span class="timeago" title="%F">%F</span> &middot;';
			echo ScmStatus::format($fmt, array('format_date' => "c"));
			?>
			<a href="https://github.com/jimmysawczuk/jimmysawczuk.com#acknowledgements">Acknowledgements</a>
		</div>

		<div id="fb-root"></div>
		<script type="text/javascript" src="<?=get_min_url('components'); ?>" charset="utf-8"></script>
		<script type="text/javascript">
			window.fbAsyncInit = function() {
				FB.init({
					appId: '<?=FB_APP_ID; ?>',
					xfbml: true,
					channelUrl: Config.stylesheet_directory + '/channel.html'
				});

				Comments.init();
			};
			(function() {
				var e = document.createElement('script'); e.async = true;
				e.src = document.location.protocol +
					'//connect.facebook.net/en_US/all.js';
				document.getElementById('fb-root').appendChild(e);
			}());
		</script>
		<? wp_footer(); ?>
	</body>
</html>
