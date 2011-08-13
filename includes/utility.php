<?php

function switch_timezone($format, $time = null, 
    $to = "America/Los_Angeles", $from = "America/Los_Angeles")
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