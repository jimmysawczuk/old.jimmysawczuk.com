var Styling = {

	init: function()
	{
		if (typeof $.browser.msie !== "undefined" && $.browser.msie)
		{
			if ($.browser.version == '8.0' || $.browser.version == '7.0')
			{
				$('html').addClass('ie');	
			}					
		}
		
		if (Config.is_single && !Config.is_page)
		{
			(function() {
				$(document).scroll(function()
				{
					$('.post .post_info').stop();

					scroll_top = $(document).scrollTop();

					if (scroll_top > $('#comments').position().top)
					{
						height = $('#comments').position().top;
						$('.post .post_info .top_link').css({'display': 'block'});
					}
					else if (scroll_top > 210)
					{
						height = (scroll_top - 200) + 'px';
						$('.post .post_info .top_link').css({'display': 'block'});
					}
					else
					{
						height = '0px';
						$('.post .post_info .top_link').css({'display': 'none'});
					}

					$('.post .post_info').animate({'top': height}, 300);
				});
			})();
		}

		$('.widget_links').each(function(idx, linkset)
		{
			id = $(linkset).attr('id');

			even = false;
			$('#' + id + ' ul li').each(function(idx, link)
			{
				if (!even)
				{
					$(link).addClass('odd');
				}
				else
				{
					$(link).addClass('even');
				}
				even = !even;
			});
		});
	}
};
