(function($)
{
	var config = {
		container: '#search',
		text: '#search_text',
		submit: '#search_submit'
	};
	
	function init()
	{
		$(config.text).focus(function()
		{
			if ($(config.text).val() == $(config.text).data('description'))
			{
				$(config.text).val('');
				$(config.container).removeClass('empty');
			}
		});
		
		$(config.text).blur(function()
		{		
			if ($(config.text).val() == '')
			{
				$(config.text).val($(config.text).data('description'));
				$(config.container).addClass('empty');
			}
		});
				
		$(config.text).blur();
	}

	$(document).ready(init);

})(jQuery);

var BitBucket = {
	load: function(selector, cb)
	{
		$.get(Config.stylesheet_directory + "/ajax/bitbucket-activity-feed.php", {}, function(response)
		{	
			$(selector).html(response);
			
			if (typeof cb == "function")
			{
				cb();
			}
		});
	}
}

var Github = (function($)
{
	function load(selector, cb)
	{
		$.get(Config.stylesheet_directory + "/ajax/github-activity-feed.php", {count: 7}, function(response)
		{	
			$(selector).html(response);
			
			if (typeof cb == "function")
			{
				cb();
			}
		});
	}

	return {
		load: load
	};

})(jQuery);

$(document).ready(function()
{
	if (Config.sidebar_visible)
	{
		Github.load('#github_events', function()
		{
			$('#github_events .timeago').timeago();
		});	
	}
});

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

var Twitter = (function($)
{
	var selector, opts;

	function init(_selector, _opts)
	{
		var default_options = {
			screen_name: "",
			count: 7,
			cb: function() {}
		};

		opts = $.extend(true, default_options, _opts);

		selector = _selector;

		if ($(selector).length == 0)
		{
			return;
		}

		$.get(Config.stylesheet_directory + "/ajax/twitter-feed.php", { username: opts.screen_name, count: opts.count }, function(response)
		{
			render(response);
		}, 'json');
	}

	function render(response)
	{
		var $list = $(selector).find('ul');

		// per http://daringfireball.net/2010/07/improved_regex_for_matching_urls
		var url_regexp_string = /((?:[a-z][\w-]+:(?:\/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'".,<>?«»“”‘’]))/gi;
		var url_regexp = new RegExp(url_regexp_string);

		var username_regexp_string = /(?:\@(\w+))/ig;
		var username_regexp = new RegExp(username_regexp_string);

		$.each(response, function(i, tweet)
		{
			var text = tweet.text;
			var replacements = [], matches;

			var $media = $('<div />').addClass("media");
			if (tweet.entities && tweet.entities.media)
			{
				$.each(tweet.entities.media, function(i, media)
				{
					$media.append($('<a />', {href: media.expanded_url, target: "_blank"})
							.append($('<img />', {src: media.media_url_https}))
						);
					text = text.replace(media.url, "");
				});
			}

			matches = text.match(url_regexp);
			for (var m in matches)
			{
				var match = matches[m];
				var a = $('<span />').append($('<a />', {href: match}).html(match)).html();

				replacements.push({old_str: match, new_str: a});
			}

			var match, working = text;
			while (match = username_regexp.exec(text))
			{
				var a = $('<span />').append($('<a />', {href: "http://twitter.com/" + match[1]}).html("@" + match[1])).html();

				replacements.push({old_str: match[0], new_str: a});
			}

			for (var i in replacements)
			{
				text = text.replace(replacements[i].old_str, replacements[i].new_str);
			}

			var $meta = $('<div />').addClass("meta");
			$meta.append($('<a />', {href: "http://twitter.com/" + tweet.user.screen_name + "/status/" + tweet.id_str})
				.append($('<span />', {title: tweet.created_at}).addClass("timeago"))
			);

			if (tweet.in_reply_to_screen_name != null)
			{
				var screen_name = tweet.in_reply_to_screen_name;
				$meta.append(" in reply to ")
					 .append($('<a />', {href: "http://twitter.com/" + screen_name}).html("@" + screen_name));
			}

			if (tweet.place)
			{
				$meta.append(" from " + tweet.place.full_name);
			}

			if (typeof tweet.retweeted_status == "undefined")
			{
				if (tweet.favorite_count > 0)
				{
					$meta.append(' &middot; <i class="fa fa-heart"></i> ' + tweet.favorite_count);
				}

				if (tweet.retweet_count > 0)
				{
					$meta.append(' &middot; <i class="fa fa-retweet"></i> ' + tweet.retweet_count);
				}
			}

			var $li = $('<li />').addClass("tweet")
				.append($('<span />').addClass("content")
					.html(text)
				)
				.append($media)
				.append($meta);

			var $content = $li.find('.content');

			$list.append($li);
		});

		if (typeof opts.cb == "function")
		{
			opts.cb();
		}
	}

	return {
		render: render,
		init: init
	};

})(jQuery);

$(document).ready(function()
{
	if (Config.sidebar_visible)
	{
		Twitter.init('#twitter_feed', {screen_name: "JimmySawczuk", count: 7, cb: function()
		{
			$('#twitter_feed .timeago').timeago();
		}});
	}
});

// (function($)
// {
// 	var endpoint = Config.stylesheet_directory + "/ajax/norad-stats.php";

// 	function postHeart()
// 	{
// 		var $post = $(this).parents('.post');
// 		var permalink = $post.data('permalink');

// 		if ($post.hasClass('hearted'))
// 		{
// 			return;
// 		}

// 		$post.find('.post_hearts').toggleClass('hearted', true);

// 		if ($post.find('.post_hearts').hasClass('hearted'))
// 		{
// 			$.post(endpoint, { method: "postEvent", url: permalink, "event": "heart"}, function(response)
// 			{
// 				if (response.success)
// 				{
// 					var payload = response.payload;
// 					$post.find('.post_hearts .count').html(payload.lifetime.unique);
// 				}
// 				else
// 				{
// 					$post.find('.post_hearts').toggleClass('hearted', false);
// 				}

// 			}, 'json');
// 		}
// 	}

// 	function updateHearts()
// 	{
// 		var $posts = $('.post');

// 		var query = $.map($posts, function(post)
// 		{
// 			var $post = $(post);
// 			var permalink = $post.data('permalink');

// 			return 'url[]=' + permalink;
// 		});

// 		var params = [
// 			"method=lifetimeEvent",
// 			"event[]=heart"
// 		];

// 		$.each(query, function(i, row)
// 		{
// 			params.push(row);
// 		});

// 		$.getJSON(endpoint + "?" + params.join("&"), function(response)
// 		{
// 			if (response.success)
// 			{
// 				var payload = response.payload;
// 				$.each(payload, function(i, row)
// 				{
// 					$.each($posts, function(j, post)
// 					{
// 						var $post = $(post);
// 						if ($post.data('permalink') == row.url)
// 						{
// 							$post.find('.post_hearts .count').html(row.unique);
// 							if (row.is_member)
// 							{
// 								$post.find('.post_hearts').toggleClass('hearted', true);
// 							}
// 						}
// 					});
// 				});
// 			}
// 			else if (!response.success && response.error == "Service unavailable")
// 			{
// 				$posts.find('.post_hearts').hide();
// 			}

// 		}, 'json');
// 	}

// 	$('.post').on('click', '.post_info .post_hearts .toggle_heart', postHeart);
// 	$('.post').on('click tap', '.post_info_inline .post_hearts .toggle_heart', postHeart);
// 	$(document).ready(updateHearts);
// })(jQuery);

(function($){

	$.fn.disableSelection = function() {
		return this.each(function()
		{
			$(this).attr('unselectable', 'on')
					.css({
						'-moz-user-select':'none',
						'-webkit-user-select':'none',
						'user-select':'none',
						'-ms-user-select':'none'
					})
					.each(function() {
						this.onselectstart = function() { return false; };
					});
		});
	};

})(jQuery);

(function($)
{
	if (Config.is_single && !Config.is_page)
	{
		$(document).scroll(function()
		{
			$('.post .post_info').stop();

			scroll_top = $(document).scrollTop();

			if (scroll_top > $('#comments').position().top)
			{
				height = $('#comments').position().top;
				$('.post .post_info .top_link').css({'display': 'block'});
			}
			else if (scroll_top > 210)
			{
				height = (scroll_top - 200) + 'px';
				$('.post .post_info .top_link').css({'display': 'block'});
			}
			else
			{
				height = '0px';
				$('.post .post_info .top_link').css({'display': 'none'});
			}

			$('.post .post_info').animate({'top': height}, 300);
		});
	}

	$('.widget_links').each(function(idx, linkset)
	{
		id = $(linkset).attr('id');

		even = false;
		$('#' + id + ' ul li').each(function(idx, link)
		{
			if (!even)
			{
				$(link).addClass('odd');
			}
			else
			{
				$(link).addClass('even');
			}
			even = !even;
		});
	});

	$('blockquote').each(function(idx, quote)
	{
		var citation = $(quote).attr('cite');

		if (typeof citation !== "undefined")
		{
			(function(citation)
			{
				var a = $('<a />').attr({href: citation, target: "_blank"});
				var domain = a[0].hostname.split(".");
				domain = domain[domain.length - 2] + "." + domain[domain.length - 1];
				a.html(domain);

				$(quote).append($('<div />')
					.addClass('citation')
					.html("Source: ")
					.append(a)
				);
			})(citation);
		}
	});

	$('.share-button').click(function(evt)
	{
		evt.preventDefault();

		var width = $(this).data('width')? $(this).data('width') : 575;
		var height = $(this).data('height')? $(this).data('height') : 300;

		window.open($(this).attr('href'), "sharer", "width="+ width + ",height=" + height + ",scrolling=0,status=0");

		return false;
	});

	function init()
	{
		$('.post .content').find('img').removeAttr('height');

		$('.timeago').timeago();

		$('#nav .switch a').click(function()
		{
			$('#nav').toggleClass('active');
		});

		$('.widget_archive .years .year').click(function()
		{
			var $this = $(this);
			var $months = $this.next('.months');

			var active = $this.hasClass('active');

			if (!active)
			{
				$('.widget_archive').find('.active').toggleClass('active', false);
			}

			$this.toggleClass('active', !active);
			$months.toggleClass('active', !active);
		});

		$('.widget_archive .years .year:first').click();
	}

	$(document).ready(function()
	{
		init();
	});

})(jQuery);

var Comments = (function($)
{
	var endpoint = Config.stylesheet_directory + "/ajax/norad-stats.php";

	function init()
	{
		FB.Event.subscribe('comment.create', function(args)
		{
			var permalink = args.href;

			$.post(endpoint, { method: "postEvent", url: permalink, "event": "comment"}, function(response)
			{
				if (response.success)
				{
					var payload = response.payload;
				}
			}, 'json');
		});
	}

	return {
		init: init
	};

})(jQuery);
