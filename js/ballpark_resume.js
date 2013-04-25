var BallparkResume = (function()
{
	var ballparks;
	var default_opts;

	function init(opts, inc_ballparks)
	{
		var styles = [
			{
				featureType: "all",
				elementType: "labels",
				stylers: [
					{visibility: "simplified"}
				]
			},
			{
				featureType: "poi",
				elementType: "labels",
				stylers: [
					{ visibility: "off" }
				]
			}
		];

		default_opts = {
			zoom: 6,
			mapTypeId: google.maps.MapTypeId.HYBRID,
			maxZoom: 17,
			minZoom: 6,
			panControl: false,
			mapTypeControl: false,
			zoomControl: true,
			zoomControlOptions: {
				position: google.maps.ControlPosition.LEFT_CENTER,
				style: google.maps.ZoomControlStyle.SMALL
			},
			streetViewControl: false,
			disableDefaultUI: true,
			scrollwheel: false,
			draggable: false,
			disableDoubleClickZoom: true,
			styles: styles
		};

		ballparks = inc_ballparks;

		bindEvents();
	}

	function bindEvents()
	{
		$('.ballpark').on('click', function(evt)
		{
			if (!$(this).hasClass('ballpark_engaged'))
			{
				var $other_engaged = $('.ballpark_engaged');
				$other_engaged.find('.header, .footer').slideUp('fast', function()
				{
					var $parent = $(this).parent();
					$parent.removeClass('ballpark_engaged');
					$(this).removeAttr('style');
				});
				$other_engaged.find('.map_engaged').removeClass('map_engaged');
				$other_engaged.find('.show_location_engaged').removeClass('show_location_engaged');
				$other_engaged.find('.credit').show();

				$(this).find('.header, .footer').slideDown('normal', function()
				{
					var $parent = $(this).parent();
					$parent.addClass('ballpark_engaged');
					$(this).removeAttr('style');
				});
				
			}
			else
			{
				if (!$(this).find('.map_engaged').hasClass('map_engaged'))
				{
					$(this).find('.header, .footer').slideUp('fast', function()
					{
						var $parent = $(this).parent();
						$parent.removeClass('ballpark_engaged');
						$(this).removeAttr('style');
					});
				}
				
			}
		});

		$('.ballpark .show_location .icon-globe').on('click', function(evt)
		{
			evt.stopPropagation();

			var $ballpark_div = $(this).parents('.ballpark:first');
			var $map_div = $ballpark_div.find('.map:first');

			$map_div.toggleClass('map_engaged');

			if ($map_div.hasClass('map_engaged'))
			{
				var center = new google.maps.LatLng($ballpark_div.data('mapCenter')[0], $ballpark_div.data('mapCenter')[1]);
				var opts = $.extend(default_opts, {center: center});
				var map = new google.maps.Map($map_div[0], opts);

				(function(map)
				{
					var funcs = [];

					var zoom_target = 16;
					var initial_timeout = 500;
					var frame_duration = 150;

					for (var i = map.getZoom(), j = 0; i <= zoom_target; i++, j++)
					{
						var func = (function(i)
						{
							return function()
							{
								map.setZoom(i);
								if (map.getZoom() == zoom_target)
								{
									map.setOptions({minZoom: 13});
								}
							}
						})(i);

						funcs.push({func: func, timeout: initial_timeout + j * frame_duration});
					}

					map.event_set = false;

					google.maps.event.addListener(map, 'tilesloaded', function()
					{
						if (!map.event_set)
						{
							map.event_set = true;
							for (var f in funcs)
							{
								window.setTimeout(funcs[f].func, funcs[f].timeout);
							}	
						}
					});					
				})(map);
				

				$ballpark_div.find('.credit').hide();
				$(this).parents('.show_location').addClass('show_location_engaged');
			}
			else
			{
				$ballpark_div.find('.credit').show();
				$(this).parents('.show_location').removeClass('show_location_engaged');
			}
		});

		$('.ballpark').disableSelection();
	}

	var public_functions = {
		init: init
	};

	return public_functions;
})();
