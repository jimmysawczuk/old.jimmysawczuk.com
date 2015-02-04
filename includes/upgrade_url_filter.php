<?php

add_filter("the_content", function($content)
{
	if (is_ssl())
	{
		$orignal_dir = wp_upload_dir();
		$original_dir_parts = parse_url($original_dir['baseurl']);

		$normal_dir = 'http://' .
			$original_dir_parts['host'] .
			(isset($original_dir_parts['port'])? ':' . $original_dir_parts['port'] : "") .
			$original_dir_parts['path'];

		$secure_dir = 'https://' .
			$original_dir_parts['host'] .
			(isset($original_dir_parts['port'])? ':' . $original_dir_parts['port'] : "") .
			$original_dir_parts['path'];

		$content = str_replace('src="http://blog.jimmysawczuk.com', 'src="http://www.jimmysawczuk.com', $content);
		$content = str_replace('href="http://blog.jimmysawczuk.com', 'href="http://www.jimmysawczuk.com', $content);

		$content = str_replace('src="' . $normal_dir, 'src="' . $secure_dir, $content);
		$content = str_replace('href="' . $normal_dir, 'href="' . $secure_dir, $content);
	}

	return $content;
});
