<?php

register_sidebars(1, array('name' => 'Right sidebar'));

require('includes/aboutme_widget.php');
require('includes/likebox_widget.php');
require('includes/twitter_widget.php');

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

function fb_og_tags()
{
	$meta_tags = array();
	$meta_tags []= '<meta property="fb:admins" content="15504121" />';
	$meta_tags []= '<meta property="fb:page_id" content="107775795674" />';
	
	if (is_single())
	{
		global $post;
		
		$matches = array();		
		$matched = preg_match_all('#<img(?:.*)src\=\"(.+?)\"(?:.*)\/\>#i', $post->post_content, $matches);
		
		if ($matched)
		{
			foreach ($matches[1] as $match)
			{
				$meta_tags []= '<meta property="og:image" content="'.$match.'" />';
			}
		}
		else
		{
			$meta_tags []= '<meta property="og:image" content="'.get_bloginfo('stylesheet_directory').'/images/about_jimmy.jpg" />';
		}
		
		
		$meta_tags []= '<meta property="og:title" content="'.str_replace("\"", "&quot;", $post->post_title).'"/>';
		$meta_tags []= '<meta property="og:type" content="article"/>';
		$meta_tags []= '<meta property="og:url" content="'.$post->post_permalink.'"/>';
		$meta_tags []= '<meta property="og:image" content="'.''.'" />';
		$meta_tags []= '<meta property="og:site_name" content="'.get_bloginfo().'"/>';
		
	}
	else
	{
		$description = "A blog about baseball, technology, politics and life by Jimmy Sawczuk, a software engineer from Cleveland living in Columbia, SC.";
	
		$meta_tags []= '<meta property="og:title" content="Cleveland, Curveballs and Common Sense"/>';
		$meta_tags []= '<meta property="og:type" content="website"/>';
		$meta_tags []= '<meta property="og:url" content="'.get_bloginfo('url').'"/>';
		$meta_tags []= '<meta property="og:image" content="'.get_bloginfo('stylesheet_directory').'/images/about_jimmy.jpg" />';
		$meta_tags []= '<meta property="og:description" content="'.$description.'" />';
	}
	
	echo implode("\r\n", $meta_tags);
}
