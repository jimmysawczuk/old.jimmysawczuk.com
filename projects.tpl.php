<?php
/*
Template Name: Projects
*/
define('PAGE_TEMPLATE', 'projects');
define('HIDE_SIDEBAR', true);
get_header();
the_post();
list($projects, $cols) = get_projects();
?>
<h1 class="headline">Projects</h1>

<p class="section-description">
	<big>I like to write code.</big><br />
	But I don't work on one big project; instead, I work on a lot of little projects. These are the projects I'm willing to talk about. Some of them are live; some of them are open source; some of them will forever be a work in progress.
</p>

<div id="projects">
	<? foreach ($cols as $i => $prj): ?>
		<div class="col col-<?=$i ?>">
			<? foreach ($prj as $project): ?>
				<div class="project project-<?=$project['id'] ?>" data-project-id="<?=$project['id'] ?>"
					<?=isset($project['github'])? 'data-github="'.$project['github'].'"' : ""; ?>
					<?=isset($project['bitbucket'])? 'data-bitbucket="'.$project['bitbucket'].'"' : ""; ?>>
					<div class="container">
						<h2><?=$project['name'] ?></h2>
						<h3><?=htmlentities($project['description']); ?></h3>
						<? if (isset($project['screenshots'])): foreach ($project['screenshots'] as $screenshot): ?>
							<img src="<?=$screenshot['src'] ?>" alt="<?=$screenshot['alt'] ?>" class="screenshot" />
						<? endforeach; endif; ?>
						<ul>
							<? if (isset($project['github'])): ?>
								<li><a href="http://github.com/<?=$project['github'] ?>">GitHub</a></li>
							<? endif; ?>
							<? if (isset($project['bitbucket'])): ?>
								<li><a href="http://bitbucket.org/<?=$project['bitbucket'] ?>">Bitbucket</a></li>
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

<script src="<?=get_min_url('projects', true); ?>" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	Projects.init({});
</script>
<?
get_footer();
