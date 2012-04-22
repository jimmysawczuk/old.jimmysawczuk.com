<?php
/*
Template Name: Projects
*/
define('PAGE_TEMPLATE', 'projects');
define('HIDE_SIDEBAR', true);
get_header();
the_post();
list($projects, $cols) = (require 'projects.inc.php');
?>
<div id="projects">
	<div class="col col-0"></div>
	<div class="col col-1"></div>
	<div class="col col-2"></div>
</div>

<script src="<?=get_min_url('projects', true); ?>" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	Projects.init({projects: <?=json_encode($projects); ?>});
</script>
<noscript>
	<div id="projects">
		<? foreach ($cols as $i => $prj): ?>
			<div class="col col-<?=$i ?>">
				<? foreach ($prj as $project): ?>
					<div class="project">
						<div class="container">
							<h2><?=$project['name'] ?></h2>
							<h3><?=htmlentities($project['description']); ?></h3>
							<? if (isset($project['screenshots'])): foreach ($project['screenshots'] as $screenshot): ?>
								<img src="<?=$screenshot['src'] ?>" alt="<?=$screenshot['alt'] ?>" class="screenshot" />
							<? endforeach; endif; ?>
							<ul>
								<? if (isset($project['github'])): ?>
									<li><a href="http://github.com/<?=$project['github'] ?>">GitHub repository</a></li>
								<? endif; ?>
								<? if (isset($project['web'])): ?>
									<li><a href="<?=$project['web'] ?>">Web</a></li>
								<? endif; ?>
								<? if (isset($project['download'])): ?>
									<li><a href="<?=$project['download'] ?>">Download</a></li>
								<? endif; ?>
							</ul>
							<div class="meta">
								<div class="tags">
									<? if (isset($project['tags'])): foreach ($project['tags'] as $tag): ?>
										<span class="tag"><?=$tag ?></span>
									<? endforeach; endif; ?>
								</div>
							</div>
						</div>
					</div>
				<? endforeach; ?>
			</div>
		<? endforeach; ?>
	</div>
</noscript>
<?
get_footer();