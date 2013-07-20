var Goodreads = (function($)
{
	function load(ele, cb)
	{
		var $ele = $(ele);

		$.get(Config.stylesheet_directory + "/ajax/goodreads-activity-feed.php", {shelf: $ele.data('shelf'), widgetId: $ele.data('widgetId')}, function(response)
		{
			var $ul = $('<ul />');

			$.each(response, function(idx, book)
			{
				var lines = [];

				if (book.book.publisher != "")
				{
					lines.push(book.book.publisher)
				}

				if (book.read_at.length > 0)
				{
					lines.push('Finished <span class="timeago" title="' + book.read_at + '"></span>');
				}
				else if (book.started_at.length > 0)
				{
					lines.push('Started <span class="timeago" title="' + book.started_at + '"></span>');
				}

				var $li = $('<li />').addClass("book")
					.append($('<img />', {src: book.book.image_url, alt: book.book.title}))
					.append($('<div />').addClass("info")
						.append($('<div />').addClass("title")
							.append($('<a />', {href: book.book.link}).html(book.book.title))
						)
						.append($('<div />').addClass("author").html(book.book.authors.author.name))
						.append($('<div />').addClass("meta")
							.append(lines.join(" &middot; "))
						)
					);

				$ul.append($li);
			});

			$ele.append($ul);

			if (typeof cb == "function")
			{
				cb();
			}
		}, 'json');
	}

	return {
		load: load
	};

})(jQuery);

$(document).ready(function()
{
	if (Config.sidebar_visible)
	{
		$('.goodreads-container').each(function(idx, ele)
		{
			Goodreads.load(ele, function()
			{
				$(ele).find('.timeago').timeago();
			});
		})
	}
});
