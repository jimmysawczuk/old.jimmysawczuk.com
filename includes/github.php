<?php

class Github
{
	static $uri = 'https://api.github.com/';

	public static function Request($url)
	{
		$ch = curl_init();
	
		curl_setopt($ch, CURLOPT_URL, self::$uri . $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent: curl'));
	
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
						$commits = $event['payload']['commits'];

						$story = "{$event['actor']['login']} pushed "
							.pluralize(count($commits), "%s commit", "%s commits", '%s').":";

						if (count($commits) > 0)
						{
							$story .= "<ul class=\"extra\">";
							$j = 0;
							foreach ($commits as $commit)
							{
								if (strlen($commit['message']) > 50)
								{
									$commit['message'] = substr($commit['message'], 0, 50);
									$commit['message'] = substr($commit['message'], 0, strripos($commit['message'], ' '));
									$commit['message'] .= "...";
								}

								$link = "http://www.github.com/{$event['repo']['name']}/commit/{$commit['sha']}";

								$story .= "<li>".htmlentities($commit['message'])." (<a href=\"{$link}\">link</a>)</li>";
								$j++;

								if ($j >= 5)
								{
									$story .= "<li><i>and more...</i></li>";
									break;
								}
							}
							$story .= "</ul>";
						}
						

						$adverb = "to";
						break;

					case "CreateEvent":
						switch ($event['payload']['ref_type'])
						{
							case "branch":
								$story = "{$event['actor']['login']} created {$event['payload']['ref']}";
								$adverb = "on";
								break;
							case "tag":
								$story = "{$event['actor']['login']} tagged {$event['payload']['ref']}";
								$adverb = "on";
								break;
							case "repository":
								$story = "{$event['actor']['login']} created "
									.self::getRepoLink($event['repo']['name']);
								$adverb = "";
								break;
						}						
						break;

					case "WatchEvent":
						$story = "{$event['actor']['login']} {$event['payload']['action']} watching "
							.self::getRepoLink($event['repo']['name']).".";
						$adverb = "";
						break;

					case "FollowEvent":
						$story = "{$event['actor']['login']} started following "
							."{$event['payload']['target']['login']}";
						$adverb = "";
						break;

					default:
						$story = "";


				}

				


				if ($story != "")
				{
					$story .= " &mdash; <span class=\"footer\">";
					if ($adverb != "")
					{
						$story .= "{$adverb} "
							.self::getRepoLink($event['repo']['name'], str_replace($user . '/', "", $event['repo']['name']))
							." &middot; ";
					}
					$story .= "<span class=\"timeago\" title=\""
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
