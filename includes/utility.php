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

function get_min_url($name, $override = false)
{
	$dir = get_bloginfo('stylesheet_directory');

	if (MODE == "live" || $override)
	{
		return $dir . '/js/bin/' . $name . '.min.js';
	}
	else
	{
		return $dir . '/js/bin/' . $name . '.js';
	}
}

function load_stylesheet($name, $override = false)
{
	$dir = get_bloginfo('stylesheet_directory');

	if (MODE == 'live' || $override)
	{
		echo '<link href="'.$dir.'/css/'.$name.'.min.css" type="text/css" rel="stylesheet" />';
	}
	elseif (MODE == 'dev')
	{
		echo '<link href="'.$dir.'/less/'.$name.'.less" type="text/css" rel="stylesheet/less" />' . "\n";
		echo '<script type="text/javascript">';
		echo 'var less = {env: "development"};';
		echo '</script>';
		echo '<script src="'.get_min_url("less", true).'" type="text/javascript"></script>' . "\n";
	}
}

function git_revision()
{
	return GitRevision::format("%r &middot; %b &middot; <time datetime=\"%d\"></time>");
}
