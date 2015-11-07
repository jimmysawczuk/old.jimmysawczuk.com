<?php

class Norad
{
	public function __construct($endpoint)
	{
		$this->endpoint = $endpoint;
	}

	public function getLifetimeStatsForURLs(array $urls = array(), array $events = array())
	{
		$endpoint = $this->endpoint . "/v2?" .
			implode("&", array_map(function($s) { return 'event=' . urlencode($s); }, $events)) . '&' .
			implode("&", array_map(function($s) { return 'url=' . urlencode($s); }, $urls));

		$ch = curl_init($endpoint);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, true);
		$this->applyCookie($ch);

		@list($header, $response) = $this->executeRequest($ch);

		return $response;
	}

	public function postEvent($url, $event)
	{
		$endpoint = $this->endpoint . "/v2/event";

		$ch = curl_init($endpoint);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
			'url' => $url,
			'event' => $event,
		)));
		$this->applyCookie($ch);

		list($header, $response) = $this->executeRequest($ch);

		return $response;
	}

	private function applyCookie($ch)
	{
		global $_COOKIE;
		// var_dump($_COOKIE['norad_id']);
		if (isset($_COOKIE['norad_id']))
		{
			curl_setopt($ch, CURLOPT_COOKIE, 'norad_id=' . $_COOKIE['norad_id']);
		}
	}

	private function executeRequest($ch)
	{
		$raw_response = curl_exec($ch);
		$info = curl_getinfo($ch);

		if ($info['http_code'] === 0)
		{
			throw new NoradServiceUnavailableException;
		}

		$raw_response = $this->normalizeLineEndings($raw_response);

		list($header, $response) = explode("\n\n", $raw_response);

		$header = $this->normalizeLineEndings($header);

		if ($info['http_code'] != 200)
		{
			throw new Exception("Norad HTTP error {$info['http_code']}: {$response}");
		}

		if (stripos($info['content_type'], "application/json") === 0)
		{
			$response = json_decode($response, true);
		}

		$header = explode("\n", $header);
		$identifier = "";
		$expires = 0;
		foreach ($header as $row)
		{
			if (stripos($row, "X-Norad-Identifier:") === 0)
			{
				list($name, $identifier) = explode(":", $row);
				$identifier = trim($identifier);
			}

			if (stripos($row, "X-Norad-Identifier-Expires:") === 0)
			{
				list($name, $expires) = explode(":", $row);
				$expires = trim($expires);
			}
		}

		if ($identifier != "")
		{
			setcookie("norad_id", $identifier, $expires, "/", COOKIE_DOMAIN);
			$response['cookie_set'] = true;
		}

		return array($header, $response);
	}

	private function normalizeLineEndings($s)
	{
		$s = str_replace("\r\n", "\n", $s);
		$s = str_replace("\r", "\n", $s);
		return $s;
	}
}

class NoradServiceUnavailableException extends Exception {}
