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
			zoom: 16,
			mapTypeId: google.maps.MapTypeId.HYBRID,
			maxZoom: 17,
			minZoom: 13,
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
				$other_engaged.removeClass('ballpark_engaged');
				$other_engaged.find('.map_engaged').removeClass('map_engaged');
				$other_engaged.find('.show_location_engaged').removeClass('show_location_engaged');
				$other_engaged.find('.credit').show();

				$(this).addClass('ballpark_engaged');

				
				var center = new google.maps.LatLng($(this).data('mapCenter')[0], $(this).data('mapCenter')[1]);
				var opts = $.extend(default_opts, {center: center});
				var map = new google.maps.Map($(this).find('.map:first')[0], opts);
			}
			else
			{
				if (!$(this).find('.map_engaged').hasClass('map_engaged'))
				{
					$(this).removeClass('ballpark_engaged');
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

				$ballpark_div.find('.credit').hide();
				$(this).parents('.show_location').addClass('show_location_engaged');
			}
			else
			{
				$ballpark_div.find('.credit').show();
				$(this).parents('.show_location').removeClass('show_location_engaged');
			}
		});
	}

	var public_functions = {
		init: init
	};

	return public_functions;
})();