var Search = {
	config: {
		search_container: '#search',
		search_text: '#search_text',
		search_submit: '#search_submit'
	},
	
	init: function()
	{
		$(Search.config.search_text).focus(function()
		{
			if ($(Search.config.search_text).val() == $(Search.config.search_text).data('description'))
			{
				$(Search.config.search_text).val('');
				$(Search.config.search_container).removeClass('empty');
			}
		});
		
		$(Search.config.search_text).blur(function()
		{		
			if ($(Search.config.search_text).val() == '')
			{
				$(Search.config.search_text).val($(Search.config.search_text).data('description'));
				$(Search.config.search_container).addClass('empty');
			}
		});
				
		$(Search.config.search_text).blur();
	}
};
