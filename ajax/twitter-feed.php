<?php

$username = preg_replace("#\W#", "", $_GET['username']);
$count = isset($_GET['count']) && is_numeric($_GET['count'])? $_GET['count'] : 7;

$url = 'https://api.twitter.com/1/statuses/user_timeline/'.$username.'.json?count='.$count;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$tweets = json_decode(curl_exec($ch), true);

header("Content-type: application/json");
echo json_encode($tweets);
