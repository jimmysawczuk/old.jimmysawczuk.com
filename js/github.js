var Github = {
	
	load: function(selector, cb)
	{
		$.get(Config.stylesheet_directory + "/ajax/github.php", {count: 7}, function(response)
		{	
			$(selector).html(response);
			
			if (typeof cb == "function")
			{
				cb();
			}
		});
	}
	
	
}