<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://developers.facebook.com/schema/" <?php language_attributes(); ?>>

<head>
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php if ($_SERVER['SCRIPT_URI'] == 'http://www.jimmysawczuk.com/'): ?>
<meta name="description" content="A blog by Jimmy Sawczuk, a native Clevelander working for a startup in Columbia, SC." />
<?php endif; ?>
<meta name="author" content="Jimmy Sawczuk" />
<meta property="fb:admins" content="15504121" />
<? if (defined('META_IMG')): ?>
<meta proprety="og:image" content="<?=META_IMG ?>" />
<? endif; ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_enqueue_script('jquery'); ?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

<!--[if IE 6]>
<style type="text/css">
/*<![CDATA[*/
#header{background-image: none; filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_directory'); ?>/images/content_top.png',sizingMethod='scale'); }
.comm_date{background-image: none; filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_directory'); ?>/images/date_comm_box.png',sizingMethod='scale'); }
#footer{background-image: none; filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_directory'); ?>/images/content_bottom.png',sizingMethod='scale'); }
/*]]>*/
</style>
<![endif]-->
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
<div id="body">
<div id="header">

<?php top_header_image(); ?>

<? /*
<div id="rss-feed"><a title="<?php _e('Subscribe via RSS','lightword'); ?>" href="<?php bloginfo('rss2_url'); ?>"><?php _e('Subscribe via RSS','lightword'); ?></a></div>
*/ ?>

<div id="top_bar">
<ul id="front_menu">
<?php echo $selected; ?>
<li><a class="<?=is_home()? "s": "" ?>" title="Home" href="http://www.jimmysawczuk.com"><span>Home</span></a></li>
<li><a class="<?=is_page('contact')? "s": "" ?>" title="Contact" href="http://www.jimmysawczuk.com/contact"><span>Contact</span></a></li>
<li><a class="<?=is_page('projects')? "s": "" ?>" title="Projects" href="http://www.jimmysawczuk.com/projects"><span>Projects</span></a></li>
<li><a class="" title="Resume" target="_blank" href="http://www.jimmysawczuk.com/resume"><span>Resumé</span></a></li>
<li><a class="" title="Code" target="_blank" href="http://code.jimmysawczuk.com"><span>Code</span></a></li>
</ul>
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>"> <input type="text" value="" name="s" id="s" /> <input type="submit" id="go" value="" alt="<?php _e('Search'); ?>" title="<?php _e('Search'); ?>" /></form>
</div>

</div>
<div id="content">
