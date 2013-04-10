<?php

require '../includes/config.php';
require '../includes/goodreads.php';

$gr = new Goodreads(GOODREADS_API_KEY);
$books = $gr->getShelf("18966392", $_GET['shelf']);

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
