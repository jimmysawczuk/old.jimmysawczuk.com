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
