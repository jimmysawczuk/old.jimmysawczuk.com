(function($)
{
	var config = {
		container: '#search',
		text: '#search_text',
		submit: '#search_submit'
	};
	
	function init()
	{
		$(Search.config.text).focus(function()
		{
			if ($(Search.config.text).val() == $(Search.config.text).data('description'))
			{
				$(Search.config.text).val('');
				$(Search.config.container).removeClass('empty');
			}
		});
		
		$(Search.config.text).blur(function()
		{		
			if ($(Search.config.text).val() == '')
			{
				$(Search.config.text).val($(Search.config.text).data('description'));
				$(Search.config.container).addClass('empty');
			}
		});
				
		$(Search.config.text).blur();
	}

	$(document).ready(init);

})(jQuery);
