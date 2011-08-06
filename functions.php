<?php

register_sidebars(1, array('name' => 'Right sidebar'));

require('includes/aboutme_widget.php');
require('includes/likebox_widget.php');

function pluralize($num, $sing, $plu)
{
	if ($num == 1)
	{
		$tbr = $sing;
	}
	else
	{
		$tbr = $plu;
	}
	
	$tbr = str_replace('%', $num, $tbr);
	
	return $tbr;
}

function has_more_link()
{
	global $post;
	
	return strpos($post->post_content, "<!--more-->") !== false;
}
