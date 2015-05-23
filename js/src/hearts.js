(function($)
{
	var endpoint = Config.stylesheet_directory + "/ajax/norad-stats.php";

	function postHeart()
	{
		var $post = $(this).parents('.post');
		var permalink = $post.data('permalink');

		if ($post.hasClass('hearted'))
		{
			return;
		}

		$post.find('.post_hearts').toggleClass('hearted', true);

		if ($post.find('.post_hearts').hasClass('hearted'))
		{
			$.post(endpoint, { method: "postEvent", url: permalink, "event": "heart"}, function(response)
			{
				if (response.success)
				{
					var payload = response.payload;
					$post.find('.post_hearts .big').html(payload.count.lifetime);
				}
				else
				{
					$post.find('.post_hearts').toggleClass('hearted', false);
				}

			}, 'json');
		}
	}

	function updateHearts()
	{
		var $posts = $('.post');

		var query = $.map($posts, function(post)
		{
			var $post = $(post);
			var permalink = $post.data('permalink');

			return 'url[]=' + permalink;
		});

		var params = [
			"method=lifetimeEvent",
			"event[]=heart"
		];

		$.each(query, function(i, row)
		{
			params.push(row);
		});

		$.getJSON(endpoint + "?" + params.join("&"), function(response)
		{
			if (response.success)
			{
				var payload = response.payload;
				$.each(payload, function(i, row)
				{
					$.each($posts, function(j, post)
					{
						var $post = $(post);
						if ($post.data('permalink') == row.url)
						{
							$post.find('.post_hearts .big').html(row.count);
							if (row.is_member)
							{
								$post.find('.post_hearts').toggleClass('hearted', true);
							}
						}
					});
				});
			}
			else if (!response.success && response.error == "Service unavailable")
			{
				$posts.find('.post_hearts').hide();
			}

		}, 'json');
	}

	$('.post').on('click', '.post_info .post_hearts .toggle_heart', postHeart);
	$(document).ready(updateHearts);
})(jQuery);
