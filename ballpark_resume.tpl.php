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
<? /*
<div id="ballparks">
	<? foreach (array_keys($cols) as $col): $row = 0; ?>
		<div class="col col-<?=$col ?>">
			<? foreach ($cols[$col] as $ballpark): ?>
				<div class="row-<?=$row ?> ballpark" style="background: url('<?=$ballpark['full_img'] ?>?wide') no-repeat;">
					<div class="header">
						<? if (isset($ballpark['article'])): ?>
							<h1><a href="<?=$ballpark['article'] ?>"><?=$ballpark['name'] ?></a></h1>
						<? else: ?>
							<h1><?=$ballpark['name'] ?></h1>
						<? endif; ?>
						<h2><?=$ballpark['location']; ?><?=isset($ballpark['alt_name'])? ' &middot; ' . $ballpark['alt_name'] : ""; ?></h2>

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
*/ ?>

<div id="ballpark-map-wrapper">
	<div id="ballpark-map"></div>
</div>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=<?=GOOGLE_MAPS_API_KEY; ?>&sensor=false"></script>
<script type="text/javascript">
	var BallparkResume = (function()
	{
		var map;
		var ballparks;
		var overlay;

		var map_container = '#ballpark-map';
		var map_wrapper = '#ballpark-map-wrapper';

		function init(opts, inc_ballparks)
		{
			var default_opts = {
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};

			var sw = new google.maps.LatLng(25, -130);
			var ne = new google.maps.LatLng(50, -65);

			var center = new google.maps.LatLng((ne.lat() - sw.lat()) / 2.0 + sw.lat(), (ne.lng() - sw.lng()) / 2.0 + sw.lng());

			var styles = [
				{
					featureType: "all",
					elementType: "labels",
					stylers: [
						{ visibility: "off" }
					]
				}
			];

			default_opts = {
				zoom: 4,
				center: center,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				panControl: false,
				mapTypeControl: false,
				zoomControl: false,
				streetViewControl: false,
				disableDefaultUI: true,
				//scrollwheel: false,
				//draggable: false,
				styles: styles
			};

			opts = $.extend(default_opts, opts);

			map = new google.maps.Map($(map_container)[0], opts);

			MyOverlay.prototype = new google.maps.OverlayView();
			MyOverlay.prototype.onAdd = function() { }
			MyOverlay.prototype.onRemove = function() { }
			MyOverlay.prototype.draw = function() { }
			function MyOverlay(map) { this.setMap(map); }
			overlay = new MyOverlay(map);
			// var projection = overlay.getProjection();
			
			// var point = overlay.getProjection().fromLatLngToDivPixel(latLng); 

			ballparks = inc_ballparks;

			var icon = new google.maps.MarkerImage('/wp-content/themes/jimmysawczuk/images/check.png');
			// icon.scaledSize = new google.maps.Size(12, 12, 'px', 'px');
			// icon.anchor = new google.maps.Point(6, 6);

			for (var i in ballparks)
			{
				var ballpark = ballparks[i];

				var id = ballpark.name.toLowerCase();
				id = "infobox-" + (id.replace(/\s+/g, '_').replace(/\W+/, ''))

				ballparks[i].id = id;

				ballparks[i].marker = new google.maps.Marker({
					animation: google.maps.Animation.DROP,
					position: new google.maps.LatLng(ballpark.latlong[0], ballpark.latlong[1]), 
					map: map,
					ballpark: ballpark
					// icon: icon
				});

				(function(marker)
				{
					google.maps.event.addListener(marker, 'mouseover', function(evt)
					{
						fireInfobox(marker, evt.latLng);
					});

					google.maps.event.addListener(marker, 'mouseout', function(evt)
					{
						clearInfobox(marker);
					})
				})(ballparks[i].marker);
			}
		}

		function fireInfobox(marker, latlng)
		{
			var ballpark = marker.ballpark;

			if ($('#' + ballpark.id).length == 0)
			{
				var pixel = overlay.getProjection().fromLatLngToContainerPixel(latlng);

				var div = $('<div />')
					.attr({id: ballpark.id})
					.addClass('infobox')
					.css({position: 'absolute', left: pixel.x + 'px', top: pixel.y + 'px'})
					.append($('<h1 />').html(ballpark.name));

				$(map_wrapper).append(div);	
			}
			else
			{
				$('#' + ballpark.id).removeClass('infobox-hidden');
			}
		}

		function clearInfobox(marker)
		{
			var ballpark = marker.ballpark;

			$('#' + ballpark.id).addClass('infobox-hidden');
		}

		function getMap()
		{
			return map;
		}

		var public_functions = {
			init: init,
			getMap: getMap
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
