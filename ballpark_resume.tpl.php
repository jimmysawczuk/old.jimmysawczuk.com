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
				<div class="row-<?=$row ?> ballpark" style="background: url('<?=$ballpark['full_img'] ?>') no-repeat;">
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
<?php
get_footer();
