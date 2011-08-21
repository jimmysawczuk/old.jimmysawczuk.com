var Styling = {

	init: function()
	{
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
					}
					else if (scroll_top > 210)
					{
						height = (scroll_top - 200) + 'px';
					}
					else
					{
						height = '0px';
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