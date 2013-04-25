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
