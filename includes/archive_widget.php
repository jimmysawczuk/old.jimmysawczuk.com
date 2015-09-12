<?php

class ArchiveWidget extends WP_Widget_Archives
{
	public function loadPosts()
	{
		global $wpdb;

		$query = "SELECT
					YEAR(post_date) `year`,
					MONTH(post_date) `month`,
					COUNT(ID) `posts`
				FROM {$wpdb->posts}
				WHERE post_type = 'post'
					AND post_status = 'publish'
				GROUP BY YEAR(post_date), MONTH(post_date)
				ORDER BY post_date DESC";

		$key = md5($query);
		$cache = wp_cache_get('wp_get_archives' , 'general');

		if (!isset($cache[$key]))
		{
			$results = $wpdb->get_results($query);
			$cache[$key] = $results;
			wp_cache_set('wp_get_archives', $cache, 'general');
		}
		else
		{
			$results = $cache[$key];
		}

		$map = array();
		foreach ($results as $row)
		{
			$row->year = (int)$row->year;
			$row->month = (int)$row->month;
			$row->posts = (int)$row->posts;

			if (!isset($map[$row->year]))
			{
				$map[$row->year] = array();
			}

			$map[$row->year][$row->month] = $row->posts;
		}

		return $map;
	}

	function widget($args, $instance)
	{
		global $wp_locale;
		$results = $this->loadPosts();
	?>
		<?=$args['before_widget']; ?>
		<?=$args['before_title']; ?><?=trim($instance['title']) != ""? _e($instance['title']) : "Archives"; ?><?=$args['after_title']; ?>
		<div class="years">
			<? foreach ($results as $year => $months): ?>
				<div class="year">
					<?=$year ?>
				</div>

				<ul class="months" data-year="<?=$year ?>">
					<? foreach ($months as $month => $cnt): ?>
						<li class="month">
							<a href="<?=get_month_link($year, $month); ?>"><?=$wp_locale->get_month($month) ?> <?=$year ?></a>
							<? if (!empty($instance['count'])): ?>
								(<?=$cnt ?>)
							<? endif; ?>
						</li>
					<? endforeach; ?>
				</ul>
			<? endforeach; ?>
		</div>
	<?
	}
}

add_action('widgets_init', function()
{
	register_widget('ArchiveWidget');
});
