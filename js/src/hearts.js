(function($)
{
	$.cookie('norad_identifier', 'test', {
		domain: ".jimmysawczuk.net"
	});

	$('.post').on('click', '.post_info .post_hearts .toggle_heart', function()
	{
		var $post = $(this).parents('.post');
		var permalink = $post.data('permalink');

		$post.find('.post_hearts').toggleClass('hearted');

		if ($post.find('.post_hearts').hasClass('hearted'))
		{
			$.post('http://localhost:8080/v1', { url: permalink, "event": "heart"}, function(response)
			{
				$post.find('.post_hearts .big').html(response.count.lifetime);
			}, 'json');
		}
	});

	$(document).ready(function()
	{
		var $posts = $('.post');

		var query = $.map($posts, function(post)
		{
			var $post = $(post);
			var permalink = $post.data('permalink');

			return 'url=' + permalink;
		});

		$.getJSON('http://localhost:8080/v1?event=heart&lifetime=1&callback=?&' + query.join("&"), function(response)
		{
			$.each(response, function(i, row)
			{
				$.each($posts, function(j, post)
				{
					if ($(post).data('permalink') == row.url)
					{
						$(post).find('.post_hearts .big').html(row.count);
					}
				});
			});
		}, 'json');
	});
})(jQuery);
