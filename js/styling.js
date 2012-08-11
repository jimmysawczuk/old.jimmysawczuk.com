(function($){

	$.fn.disableSelection = function() {
		return this.each(function()
		{
			$(this).attr('unselectable', 'on')
					.css({
						'-moz-user-select':'none',
						'-webkit-user-select':'none',
						'user-select':'none',
						'-ms-user-select':'none'
					})
					.each(function() {
						this.onselectstart = function() { return false; };
					});
		});
	};

})(jQuery);

(function($)
{
	if (Config.is_single && !Config.is_page)
	{
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

	$('blockquote').each(function(idx, quote)
	{
		var citation = $(quote).attr('cite');

		if (typeof citation !== "undefined")
		{
			(function(citation)
			{
				var a = $('<a />').attr({href: citation, target: "_blank"});
				var domain = a[0].hostname.split(".");
				domain = domain[domain.length - 2] + "." + domain[domain.length - 1];
				a.html(domain);

				$(quote).append($('<div />')
					.addClass('citation')
					.html("Source: ")
					.append(a)
				);
			})(citation);	
		}				
	});

	$('.share-button').click(function(evt)
	{
		evt.preventDefault();

		var width = $(this).data('width')? $(this).data('width') : 575;
		var height = $(this).data('height')? $(this).data('height') : 300;

		window.open($(this).attr('href'), "sharer", "width="+ width + ",height=" + height + ",scrolling=0,status=0");

		return false;
	});

	function init()
	{
		if (typeof $.browser.msie !== "undefined" && $.browser.msie)
		{
			if ($.browser.version == '8.0' || $.browser.version == '7.0')
			{
				$('html').addClass('ie');

				if ($.browser.version == '7.0')
				{
					$('html').addClass('ie7');
				}
			}					
		}
		
		$('.timeago').timeago();
	}

	$(document).ready(function()
	{
		init();
	});

})(jQuery);
