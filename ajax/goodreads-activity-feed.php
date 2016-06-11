<?php

require '../includes/config.php';

require realpath('../../../../wp-load.php');

$widget = new GoodreadsWidget;
$settings = $widget->get_settings();
$settings = $settings[$_GET['widgetId']];

$gr = new Goodreads($settings['api_key']);
$books = $gr->getShelf($settings['user_id'], $settings['shelf']);

header("Content-type: application/json");

foreach ($books as &$book)
{
	foreach (array('started_at', 'read_at', 'date_added', 'date_updated') as $key)
	{
		if (is_string($book[$key]))
		{
			$book[$key] = date("c", strtotime($book[$key]));
		}
	}
}
unset($book);

echo json_encode($books);
