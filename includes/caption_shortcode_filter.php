<?php

add_filter('img_caption_shortcode', function($empty, $attr, $content)
{
	$id = $attr['id'];
	$align = $attr['align'];
	$width = (int)$attr['width'];
	$caption = $attr['caption'];

	ob_start();
	require(__DIR__ . "/caption.tpl.php");
	$contents = ob_get_clean();
	return $contents;

}, 10, 3 );
