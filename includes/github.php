<?php

class Github
{
	static $uri = 'https://api.github.com/';

	public static function Request($url)
	{
		$ch = curl_init();
	
		curl_setopt($ch, CURLOPT_URL, self::$uri . $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
		$result = curl_exec($ch);
	
		return json_decode($result, true);
	}

	private static function getRepoLink($name, $text = '')
	{
		if ($text == '')
		{
			$text = $name;
		}

		return '<a href="http://www.github.com/'.$name.'">'.$text.'</a>';
	}

	public static function ActivityFeed($user, $limit = 10)
	{
		$events = self::Request('users/'.$user.'/events');

		$i = 0;

		if ($events && is_array($events))
		{
			foreach ($events as &$event)
			{	
				$story = "";

				switch ($event['type'])
				{
					case "PushEvent":
						$story = "{$event['actor']['login']} pushed "
							.pluralize(count($event['payload']['commits']), "%s commit", "%s commits", '%s');
						break;

					case "CreateEvent":
						switch ($event['payload']['ref_type'])
						{
							case "branch":
								$story = "{$event['actor']['login']} created {$event['payload']['ref']}";
								break;
							case "tag":
								$story = "{$event['actor']['login']} tagged {$event['payload']['ref']}";
								break;
							case "repository":
								$story = "{$event['actor']['login']} created";
								break;
						}						
						break;

					case "WatchEvent":

						$story = "{$event['actor']['login']} {$event['payload']['action']} watching "
							.self::getRepoLink($event['repo']['name']).".";

						break;

					default:
						$story = "";


				}

				


				if ($story != "")
				{
					$story .= " &mdash; <span class=\"footer\">on "
						.self::getRepoLink($event['repo']['name'])
						." &middot; <span class=\"timeago\" title=\""
						.date("c", strtotime($event['created_at']))."\"></span></span>";

					$event['story'] = $story;
					$i++;
				}

				if ($i >= $limit)
				{
					break;
				}
			}
			unset($event);

			$tbr = array();


			foreach ($events as $event)
			{
				if (isset($event['story']))
				{
					$tbr []= $event;
				}
			}
			
			return $tbr;
		}
		else
		{
			return false;
		}
	}
}