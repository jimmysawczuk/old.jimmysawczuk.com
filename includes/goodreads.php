<?php

class Goodreads
{
	private $url = "https://www.goodreads.com";
	private $key = false;

	public function __construct($key)
	{
		$this->key = $key;
	}

	public function getShelf($user_id, $shelf)
	{
		$url = $this->url . "/review/list/{$user_id}?key={$this->key}&v=2&shelf={$shelf}";

		$xml = file_get_contents($url);

		$result = new SimpleXMLElement($xml);

		$books = array();
		if (isset($result->reviews))
		{
			$result = $result->reviews->review;
			foreach ($result as $book)
			{
				$book = json_decode(json_encode($book), true);

				$books []= $book;
			}
		}

		return $books;
	}
}
