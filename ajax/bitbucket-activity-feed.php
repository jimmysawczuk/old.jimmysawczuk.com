<?

require '../includes/utility.php';
require '../includes/bitbucket.php';

if (isset($_GET['count']) && is_numeric($_GET['count']) && $_GET['count'] >= 0 && $_GET['count'] <= 20)
{
	$cnt = $_GET['count'];
}
else
{
	$cnt = 5;
}

$feed = BitBucket::ActivityFeed($cnt);

foreach ($feed as $row)
{
	echo "<li>".$row['story']."</li>\n";
}