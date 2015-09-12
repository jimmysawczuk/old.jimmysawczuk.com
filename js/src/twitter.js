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
					$meta.append(' &middot; <i class="icon-star"></i> ' + tweet.favorite_count);
				}

				if (tweet.retweet_count > 0)
				{
					$meta.append(' &middot; <i class="icon-retweet"></i> ' + tweet.retweet_count);
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
