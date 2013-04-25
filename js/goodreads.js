var Goodreads = (function($)
{
	function load(selector, cb)
	{
		$.get(Config.stylesheet_directory + "/ajax/goodreads-activity-feed.php", {shelf: "currently-reading"}, function(response)
		{
			$.each(response, function(idx, book)
			{
				var $li = $('<li />', {class: "book"})
					.append($('<img />', {src: book.book.image_url, alt: book.book.title}))
					.append($('<div />', {class: "info"})
						.append($('<div />', {class: "title"})
							.append($('<a />', {href: book.book.link}).html(book.book.title))
						)
						.append($('<div />', {class: "author"}).html(book.book.authors.author.name))
						.append($('<div />', {class: "meta"})
							.append(book.book.format)
							.append(" &middot; ")
							.append("Started ")
							.append($('<abbr />', {class: "timeago", title: book.started_at}))
						)
					);

				$(selector).append($li);
			});
			
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
		Goodreads.load('#goodreads_books', function()
		{
			$('#goodreads_books .timeago').timeago();
		});	
	}
});