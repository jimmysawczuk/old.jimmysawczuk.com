<?php

register_sidebars(1, array('name' => 'Right sidebar'));

require('includes/git_revision.php');
require('includes/utility.php');

require('includes/aboutme_widget.php');
require('includes/likebox_widget.php');
require('includes/twitter_widget.php');
require('includes/ballpark_widget.php');
require('includes/bitbucket_widget.php');
require('includes/github_widget.php');

require('includes/bitbucket.php');
require('includes/github.php');

if (file_exists('includes/mode.php'))
{
	require('includes/mode.php');
}
else
{
	define('MODE', 'live');
}

function has_more_link()
{
	global $post;
	
	return strpos($post->post_content, "<!--more-->") !== false;
}

function page_title()
{
	global $post;
	
	if (is_single() || is_page())
	{
		the_title();
		echo ' - ';
		bloginfo('name');
	}
	else
	{
		bloginfo('name');
		echo ' - ';
		bloginfo('description');
	}
}

function fb_og_tags()
{
	$meta_tags = array();
	$meta_tags []= '<meta property="fb:admins" content="15504121" />';
	$meta_tags []= '<meta property="og:locale" content="en_US" />';
	// $meta_tags []= '<meta property="fb:page_id" content="107775795674" />';
	$meta_tags []= '<meta property="fb:app_id" content="193404464015012" />';
	
	if (is_single())
	{
		global $post;
		
		$matches = array();		
		$matched = preg_match_all('#<img(?:.*)src\=\"(.+?)\"(?:.*)\/\>#i', $post->post_content, $matches);
		
		if ($matched)
		{
			$meta_tags []= '<meta property="og:image" content="'.$matches[1][0].'" />';
		}
		else
		{
			$meta_tags []= '<meta property="og:image" content="'.get_bloginfo('stylesheet_directory').'/images/about_jimmy.jpg" />';
		}
		
		
		$meta_tags []= '<meta property="og:title" content="'.str_replace("\"", "&quot;", get_the_title()).'"/>';
		$meta_tags []= '<meta property="og:type" content="article"/>';
		$meta_tags []= '<meta property="og:url" content="'.get_permalink().'"/>';
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
