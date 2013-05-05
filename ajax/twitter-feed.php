<?php

require "../includes/config.php";

$consumer_key = TWITTER_CONSUMER_KEY;
$consumer_secret = TWITTER_CONSUMER_SECRET;

$auth = base64_encode(rawurlencode($consumer_key).":".rawurlencode($consumer_secret));

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.twitter.com/oauth2/token");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, array('grant_type' => 'client_credentials'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Basic {$auth}"));

$result = json_decode(curl_exec($ch), true);

if (!isset($result['access_token']))
{
	exit;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name={$_GET['username']}&count={$_GET['count']}");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer {$result['access_token']}"));

$result = json_decode(curl_exec($ch), true);

if (isset($_GET['callback']))
{
	header("Content-type: text/javascript");
	echo "{$_GET['callback']}(".json_encode($result).")";
}
else
{
	header("Content-type: application/json");
	echo json_encode($result);
}
