<?php
/*
Template Name: Projects (WIP)
*/
define('PAGE_TEMPLATE', 'projects');
define('HIDE_SIDEBAR', true);
get_header();
?>

<div id="projects">
	<div class="col col-0"></div>
	<div class="col col-1"></div>
	<div class="col col-2"></div>
</div>

<script type="text/javascript">
	var projects = [];

	projects.push({
		name: "Scaffolding",
		description: "An MVC PHP framework for web applications.",
		github: "jimmysawczuk/scaffolding",
		tags: ["php", "open-source", "development"]
	});

	projects.push({
		name: "Inline LESS",
		description: "A Chrome extension to render LESS-enhanced CSS in <style> tags.",
		github: "jimmysawczuk/inline-less",
		tags: ["javascript", "chrome-extension", "open-source", "development"]
	});

	projects.push({
		name: "jimmysawczuk.com",
		description: "The WordPress theme that runs the very blog you're looking at.",
		github: "jimmysawczuk/jimmysawczuk.com",
		tags: ["php", "javascript", "wordpress", "open-source"]
	});

	
	projects.push({
		name: "Invaders",
		description: "An XNA game which was my last homework assignment for my game development class my senior year in college.",
		tags: ["xna", "c#", "game"],
		web: "http://files.jimmysawczuk.com/files/invaders.php",
		screenshots: [{src: "http://files.jimmysawczuk.com/files/images/invaders_ss1.jpg", alt: "Screenshot"}]
	});

	projects.push({
		name: "George in Space!",
		description: "My first XNA game that was any fun at all. Not as cool as Invaders.",
		tags: ["xna", "c#", "game"],
		web: "http://files.jimmysawczuk.com/files/georgeinspace.php",
		screenshots: [{src: "http://files.jimmysawczuk.com/files/images/gis_ss1.jpg", alt: "Screenshot"}]
	});

	projects.push({
		name: "Sleep Timer",
		description: "A little Windows application that performs a variety of operations after a set timer has elapsed.",
		tags: ["c#", "utility", "windows"],
		download: "http://files.jimmysawczuk.com/files/sleeptimer/Setup.msi",
		screenshots: [{src: "http://www.jimmysawczuk.com/wp-content/uploads/2011/01/sleeptimer_ss1.jpg", alt: "Screenshot"}]
	});

	projects.push({
		name: "Big Prize Giveaways Prizes Tab",
		description: "A handy miniature prizes tab that shows currently-running Big Prize Giveaways sweepstakes.",
		download: "https://chrome.google.com/extensions/detail/dehinmdmfgclcpijadomcogabhdceakj",
		tags: ["javascript", "chrome-extension", "work"]
	});

	projects.push({
		name: "wiki.md",
		description: "A PHP-powered Markdown-enabled site framework.",
		github: "jimmysawczuk/wiki.md",
		tags: ["php", "markdown", "open-source"]
	});

	projects.push({
		name: "clippy-jquery",
		description: "A jQuery plugin that utilizes the clippy SWF to enable easy copy-and-paste on web content.",
		github: "jimmysawczuk/clippy-jquery",
		web: "http://files.jimmysawczuk.com/clippy-jquery",
		tags: ["javascript", "development"]
	});
</script>
<script src="<?=get_min_url('projects', true); ?>" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	Projects.init({projects: projects});
</script>
<?
get_footer();
?>
