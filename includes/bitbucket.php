<?php

class BitBucket
{
	static $uri = "https://api.bitbucket.org/1.0";
	
	public static function Request($url)
	{
		$ch = curl_init();
	
		curl_setopt($ch, CURLOPT_URL, self::$uri . $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
		$result = curl_exec($ch);
	
		return json_decode($result, true);
	}
	
	private static function toUTC($format = "U", $time = false)
	{
		if ($time === false)
		{
			$time = time();
		}
	
		return switch_timezone($format, $time, "America/New_York", "Europe/Amsterdam");
	}
	
	private static function getRepositoryURL($owner, $name, $link = false)
	{
		if ($link)
		{
			return "<a href=\"https://bitbucket.org/{$owner}/{$name}\">{$name}</a>";
		}
		else
		{
			return "https://bitbucket.org/{$owner}/{$name}";
		}
	}
	
	public static function ActivityFeed($limit = 10)
	{
		$result = self::Request('/users/jimmysawczuk/events?limit='.$limit);
		$events = $result['events'];
		
		if ($events && is_array($events))
		{
			foreach ($events as &$event)
			{	
				$story = "";
	
				switch ($event['event'])
				{
					case "commit":
						$story .= truncate_string($event['description']);
						$url = self::getRepositoryURL($event['repository']['owner'], $event['repository']['name'])."/changeset/{$event['node']}";
	
						break;
	
					case "start_follow_repo":
						$story .= "<i>Started following ".self::getRepositoryURL($event['repository']['owner'], $event['repository']['name'], true)."</i>";
	
						$url = "javascript: void(0);";
	
						break;
	
					case "create":
						$story = "<i>Created ".self::getRepositoryURL($event['repository']['owner'], $event['repository']['name'], true)."</i>";
	
						$url = "javascript: void(0);";
	
						break;
	
					default:
						break;
				}
				
				$story .= " &mdash; <span class=\"footer\">".self::getRepositoryURL($event['repository']['owner'], $event['repository']['name'], true)." &middot; <a href=\"{$url}\" class=\"timeago\" title=\"".self::toUTC("c", $event['created_on'])."\"></a></span>";
				
				$event['story'] = $story;
			}
			unset($event);
			
			return $events;
		}
		else
		{
			return false;
		}
	}
	
	public static function RepositoryEvents($name, $limit = 30, $username = "jimmysawczuk")
	{
		$result = self::Request("/repositories/{$username}/{$name}/events/?limit={$limit}");
		$result = $result['events'];
		
		usort($result, "self::sortByCreatedOn");
		
		return $result;
	}
	
	private static function sortByCreatedOn($a, $b)
	{
		$_a = self::toUTC("U", $a['created_on']);
		$_b = self::toUTC("U", $b['created_on']);
		
		if ($a == $b)
		{
			return 0;
		}
		elseif ($a > $b)
		{
			return -1;
		}
		else
		{
			return 1;
		}
	}
}
