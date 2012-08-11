var Github = {
	
	load: function(selector, cb)
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
}

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