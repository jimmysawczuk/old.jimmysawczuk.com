<?php
/*
Template Name: Ballpark Resume
*/
define('PAGE_TEMPLATE', 'ballpark_resume');
define('HIDE_SIDEBAR', true);
get_header();
the_post();
list($ballparks, $cols) = get_ballparks();
?>
<div id="ballparks">
	<? foreach (array_keys($cols) as $col): $row = 0; ?>
		<div class="col col-<?=$col ?>">
			<? foreach ($cols[$col] as $ballpark): ?>
				<div class="row-<?=$row ?> ballpark" id="<?=$ballpark['id'] ?>" style="background: url('<?=$ballpark['full_img'] ?>?wide') no-repeat;" data-map-center='<?=json_encode($ballpark['latlong']); ?>'>
					<div class="map"></div>

					<div class="header">
						<? if (isset($ballpark['article'])): ?>
							<h1><a href="<?=$ballpark['article'] ?>"><?=$ballpark['name'] ?></a></h1>
						<? else: ?>
							<h1><?=$ballpark['name'] ?></h1>
						<? endif; ?>
						<h2><?=$ballpark['location']; ?>
							<?=isset($ballpark['alt_name'])? ' &middot; ' . $ballpark['alt_name'] : ""; ?>
							<?=isset($ballpark['active']) && !$ballpark['active']? ' &middot; <b>Inactive</b>' : '' ?></h2>

						<div class="rating rating-<?=$ballpark['rating']; ?>">
							<div>
								<?=$ballpark['rating']; ?>
							</div>
						</div>
					</div>

					<div class="footer">
						<div class="meta">
							<div class="field">
								<div class="name">Hometeam:</div>
								<div class="value"><?=$ballpark['team'] ?></div>
							</div>
							
							<div class="field">
								<div class="name">First visit:</div>
								<div class="value">
									<a href="<?=$ballpark['game'] ?>" target="_blank"><?=date("F j, Y", $ballpark['visit']); ?></a> 
									(<span class="timeago" title="<?=date("c", $ballpark['visit']); ?>"></span>)
								</div>
							</div>
							
							<div class="field">
								<div class="name">Total visits:</div>
								<div class="value"><?=$ballpark['num_visits'] ?></div>
							</div>
						</div>

						<div class="show_location">
							<a href="javascript: void(0);">Show Map</a>
						</div>

						<? if (isset($ballpark['img_credit'])): ?>
							<div class="credit">
								<a href="<?=$ballpark['img_credit']; ?>" target="_blank">Photo credit</a>
							</div>
						<? endif; ?>
					</div>


				</div>
			<? $row++; endforeach; ?>
		</div>
	<? endforeach; ?>
</div>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=<?=GOOGLE_MAPS_API_KEY; ?>&sensor=false"></script>
<script type="text/javascript">
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
					$('.ballpark_engaged').removeClass('ballpark_engaged').find('.map_engaged').removeClass('map_engaged').find('a').html('Show map');
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

			$('.ballpark .show_location a').on('click', function(evt)
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

					$(this).html('Hide map');
				}
				else
				{
					$ballpark_div.find('.credit').show();
					$(this).html('Show map');
				}
			});
		}

		var public_functions = {
			init: init
		};

		return public_functions;
	})();

	$(document).ready(function()
	{
		BallparkResume.init({}, <?=json_encode($ballparks); ?>);
		
	});
</script>
<?php
get_footer();
