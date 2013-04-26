var Twitter = (function($)
{
	function load(selector, cb)
	{
		$.get(Config.stylesheet_directory + "/ajax/twitter-feed.php", {username: "JimmySawczuk", count: 7}, function(response)
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

				matches = text.match(url_regexp);
				for (var m in matches)
				{
					var match = matches[m];
					var a = $('<span />').append($('<a />', {href: match}).html(match)).html();

					replacements.push({old: match, new: a});
				}

				var match, working = text;
				while (match = username_regexp.exec(text))
				{
					var a = $('<span />').append($('<a />', {href: "http://twitter.com/" + match[1]}).html("@" + match[1])).html();

					replacements.push({old: match[0], new: a});
				}

				for (var i in replacements)
				{
					text = text.replace(replacements[i].old, replacements[i].new);
				}

				var $meta = $('<div />', {class: "meta"});
				$meta.append($('<a />', {href: "http://twitter.com/" + tweet.user.screen_name + "/status/" + tweet.id_str})
					.append($('<time />', {datetime: tweet.created_at, class: "timeago"}))
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

				var $li = $('<li />', {class: "content"})
					.append($('<span />', {class: "content"})
						.html(text)
					)
					.append($meta);

				var $content = $li.find('.content');
				

				$list.append($li);
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
		Twitter.load('#twitter_feed', function()
		{
			$('#twitter_feed .timeago').timeago();
		});	
	}
});
