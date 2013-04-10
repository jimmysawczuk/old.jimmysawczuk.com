<?php

function switch_timezone($format, $time = null, $to = "America/Los_Angeles", $from = "America/Los_Angeles")
{
	if ($time == null) $time = time();

	$from_tz = new DateTimeZone($from);
	$to_tz = new DateTimeZone($to);

	if (is_int($time)) $time = '@' . $time;

	$dt = date_create($time, $from_tz);

	if ($dt)
	{
		$dt->setTimezone($to_tz);
		return $dt->format($format);
	}

	return date($format, $time);
}

function truncate_string($str, $limit = 50)
{
	if (strlen($str) > 50)
	{
		$str = substr($str, 0, 50);
		$str = substr($str, 0, strrpos($str, " ")) . '...';
	}
	
	return $str;
}

function pluralize($num, $sing, $plu, $repl = '%')
{
	if ($num == 1)
	{
		$tbr = $sing;
	}
	else
	{
		$tbr = $plu;
	}
	
	$tbr = str_replace($repl, $num, $tbr);
	
	return $tbr;
}

function get_min_url($urls, $group = false, $override = false)
{
	if (!is_array($urls) && !$group)
	{
		$urls = array($urls);
	}
	
	$root_dir = get_bloginfo('stylesheet_directory');
	
	$root_dir = str_replace(get_bloginfo('url').'/', '', $root_dir);
	
	if (!$group)
	{
		$str = get_bloginfo('stylesheet_directory').'/min/?b='.$root_dir.'&f='.implode(",", $urls);
	}
	else
	{
		$str = get_bloginfo('stylesheet_directory').'/min/?g='.$urls;
	}

	if (MODE == "dev" || $override)
	{
		$str .= "&date=".date("YmdHis");
	}
	
	return $str;
}

function load_stylesheet($name, $override = false)
{
	$dir = get_bloginfo('stylesheet_directory');

	if (MODE == 'live' || $override || true)
	{
		echo '<link href="'.$dir.'/min/?g=css" type="text/css" rel="stylesheet" />';
	}
	elseif (MODE == 'dev')
	{
		echo '<link href="'.$dir.'/less/'.$name.'.less" type="text/css" rel="stylesheet/less" />' . "\n";
		echo '<script type="text/javascript">';
		echo 'var less = {env: "development"};';
		echo '</script>';
		echo '<script src="'.$dir.'/js/less-1.3.0.min.js" type="text/javascript"></script>' . "\n";
		echo '<script type="text/javascript">';
		echo 'if (localStorage) {';
			echo 'delete localStorage["'.$dir.'/less/'.$name.'.less"];';
			echo 'delete localStorage["'.$dir.'/less/'.$name.'.less:timestamp"];';
		echo '}';
		echo '</script>' . "\n";
		
	}
}

function git_revision()
{
	return GitRevision::format("%r &middot; %b &middot; <time datetime=\"%d\"></time>");
}
