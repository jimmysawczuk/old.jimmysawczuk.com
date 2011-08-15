var BitBucket = {
	
	
	load: function(selector, cb)
	{
		$.get(Config.stylesheet_directory + "/ajax/bitbucket.php", {}, function(response)
		{	
			$(selector).html(response);
			
			cb();
		});
	}
	
	
}