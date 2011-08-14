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
		
		foreach ($events as &$event)
		{	
			$story = "";
			
			// var_dump($event);
		
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
	
	public static function generateFooterStub($name, $username = "jimmysawczuk")
	{
		$rev_info = parse_revision_information();
		
		if ($rev_info)
		{
			$str = "";
			$str .= '<a href="http://bitbucket.org/'.$username.'/'.$name.'/'.$rev_info['i'].'" ';
			$str .= 'title="Branch: '.$rev_info['b'].'">'.$rev_info['n'];
			$str .= ':'.$rev_info['i'].'</a>';
			
			
			return $str;
		}
		else
		{
			return false;
		}
	}
}
