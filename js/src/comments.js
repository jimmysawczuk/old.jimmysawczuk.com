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
