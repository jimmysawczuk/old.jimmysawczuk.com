<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if (have_posts())
{
	$i = 0;
	do
	{
		the_post();
		require_partial('single_post', [
			'featured' => $i === 0 && $paged === 1,
		]);
		$i++;
	}
	while (have_posts());

	require_partial('pagination');
}
else
{
	require_partial('no_posts');
}
