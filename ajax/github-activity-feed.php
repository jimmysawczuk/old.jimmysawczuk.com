<?php

require '../includes/utility.php';
require '../includes/github.php';

if (isset($_GET['count']) && is_numeric($_GET['count']) && $_GET['count'] >= 0 && $_GET['count'] <= 20)
{
	$cnt = $_GET['count'];
}
else
{
	$cnt = 5;
}

$feed = Github::ActivityFeed("jimmysawczuk", $cnt);

foreach ($feed as $row)
{
	echo "<li>".$row['story']."</li>\n";
}