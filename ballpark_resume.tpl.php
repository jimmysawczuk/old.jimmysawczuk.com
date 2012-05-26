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
						<h2><?=isset($ballpark['alt_name'])? $ballpark['alt_name'] : '&nbsp;'; ?></h2>

						<div class="rating rating-<?=$ballpark['rating']; ?>">
							<div>
								<?=$ballpark['rating']; ?>
							</div>
						</div>
					</div>

					<div class="footer">
						<dl>
							<dt>Hometeam:</dt>
							<dd><?=$ballpark['team'] ?></dd>
							
							<dt>First visit:</dt>
							<dd>
								<a href="<?=$ballpark['game'] ?>" target="_blank"><?=date("F j, Y", $ballpark['visit']); ?></a> 
								(<span class="timeago" title="<?=date("c", $ballpark['visit']); ?>"></span>)
							</dd>
							
							<dt>Total visits:</dt>
							<dd><?=$ballpark['num_visits'] ?></dd>
						</dl>
					</div>
				</div>
			<? $row++; endforeach; ?>
		</div>
	<? endforeach; ?>
</div>
<?php
get_footer();
