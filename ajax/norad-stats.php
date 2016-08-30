<?php

require '../includes/norad.php';
require '../includes/mode.php';

if (true) // (!defined("NORAD_URL"))
{
	$payload = array(
		'success' => false,
		'error' => "Service unavailable",
	);

	header("Content-type: application/json");
	die(json_encode($payload));
}

$Norad = new Norad(NORAD_URL);

$payload = array();

if (!isset($_REQUEST['method']))
{
	header("HTTP/1.1 400 Bad Request", true, 400);
	exit;
}

switch ($_REQUEST['method'])
{
	case "lifetimeEvent":
		try
		{
			$resp = $Norad->getLifetimeStatsForURLs($_GET['url'], $_GET['event']);
			$payload['success'] = true;
			$payload['payload'] = $resp;
		}
		catch (NoradServiceUnavailableException $e)
		{
			$payload['success'] = false;
			$payload['error'] = "Service unavailable";
		}
		catch (Exception $e)
		{
			$payload['success'] = false;
			$payload['error'] = $e->getMessage();
		}
		break;

	case "postEvent":
		try
		{
			$resp = $Norad->postEvent($_POST['url'], $_POST['event']);
			$payload['success'] = true;
			$payload['payload'] = $resp;
		}
		catch (NoradServiceUnavailableException $e)
		{
			$payload['success'] = false;
			$payload['error'] = "Service unavailable";
		}
		catch (Exception $e)
		{
			$payload['success'] = false;
			$payload['error'] = $e->getMessage();
		}
		break;

}

header("Content-type: application/json");
die(json_encode($payload));
