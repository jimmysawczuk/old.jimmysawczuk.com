<?php

register_sidebars(1, array('name' => 'Right sidebar'));

define('GOOGLE_MAPS_API_KEY', "AIzaSyBo5OqOOFOiMArR6jAAoeZAdrpPZH12fcY");

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

require('projects.inc.php');
require('ballpark_resume.inc.php');

@include('includes/mode.php');
if (!defined('MODE'))
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

function twitter_card_tags()
{
	$meta_tags = array();

	if (is_single())
	{
		global $post;

		$matches = array();
		$matched = preg_match_all('#<img(?:.*)src\=\"(.+?)\"(?:.*)\/\>#i', $post->post_content, $matches);

		if ($matched)
		{
			$meta_tags []= '<meta property="twitter:image" content="'.$matches[1][0].'" />';
		}
		else
		{
			$meta_tags []= '<meta property="twitter:image" content="'.get_bloginfo('stylesheet_directory').'/images/about_jimmy.jpg" />';
		}

		$description = extract_excerpt();

		$meta_tags []= '<meta property="twitter:title" content="'.str_replace("\"", "&quot;", get_the_title()).'"/>';
		$meta_tags []= '<meta property="twitter:type" content="summary" />';
		$meta_tags []= '<meta property="twitter:url" content="'.get_permalink().'"/>';
		$meta_tags []= '<meta property="twitter:description" content="'.get_excerpt().'" />';
	}
	else
	{
		$description = "A blog about baseball, technology, politics and life by Jimmy Sawczuk, a software engineer from Cleveland living in Columbia, SC.";

		$meta_tags []= '<meta property="twitter:title" content="Cleveland, Curveballs and Common Sense"/>';
		$meta_tags []= '<meta property="twitter:type" content="website"/>';
		$meta_tags []= '<meta property="twitter:url" content="'.get_bloginfo('url').'"/>';
		$meta_tags []= '<meta property="twitter:image" content="'.get_bloginfo('stylesheet_directory').'/images/about_jimmy.jpg" />';
		$meta_tags []= '<meta property="twitter:description" content="'.$description.'" />';
	}

	echo implode("\r\n", $meta_tags);
}

function blog_domain($root = true)
{
	$url = get_bloginfo('url');

	$url = preg_replace('#https?\://#', '', $url);

	
	if (!$root)
	{
		return $url;
	}
	else
	{
		$url = explode('.', $url);
		$cnt = count($url);

		$url = $url[$cnt - 2] . '.' . $url[$cnt - 1];

		return $url;	
	}
}

public function extract_excerpt()
{
	$excerpt = get_the_excerpt();

	if ($excerpt == "")
	{
		$excerpt = get_the_post();

		$excerpt = strip_tags($excerpt);

		$excerpt = substr($excerpt, 0, stripos($excerpt, " ", 200));
	}

	return $excerpt;
}
