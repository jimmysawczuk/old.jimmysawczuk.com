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
<h1>Ballpark Resum&eacute;</h1>
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
							<div class="icon-globe"></div>
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
<script src="<?=get_min_url('ballpark_resume', true); ?>" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	$(document).ready(function()
	{
		BallparkResume.init({}, <?=json_encode($ballparks); ?>);
	});
</script>
<?php
get_footer();
