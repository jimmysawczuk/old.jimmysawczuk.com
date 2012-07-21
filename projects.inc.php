<?php

function get_projects()
{
	$projects = array();

	$projects []= array(
		'name' => "Scaffolding",
		'description' => "An MVC PHP framework for web applications.",
		'github' => "jimmysawczuk/scaffolding",
		'tags' => array("php", "open-source", "development")
	);

	$projects []= array(
		'name' => "wiki.md",
		'description' => "A PHP-powered Markdown-enabled site framework.",
		'github' => "jimmysawczuk/wiki.md",
		'tags' => array("php", "markdown", "open-source")
	);

	$projects []= array(
		'name' => "Inline LESS",
		'description' => "A Chrome extension to render LESS-enhanced CSS in <style> tags.",
		'github' => "jimmysawczuk/inline-less",
		'tags' => array("javascript", "chrome-extension", "open-source", "development")
	);

	$projects []= array(
		'name' => "scm-status",
		'description' => "A repository status snapshot generator in Go",
		'github' => "jimmysawczuk/scm-status",
		'tags' => array("go", "open-source", "development")
	);

	$projects []= array(
		'name' => "jimmysawczuk.com",
		'description' => "The WordPress theme that runs the very blog you're looking at.",
		'github' => "jimmysawczuk/jimmysawczuk.com",
		'tags' => array("php", "javascript", "wordpress", "open-source")
	);

	$projects []= array(
		'name' => "Resum&eacute;",
		'description' => "My professional resume (or curriculum vitae).",
		'web' => "http://www.jimmysawczuk.com/resume",
		'github' => "jimmysawczuk/resume",
		'tags' => array("php", "html5", "open-source")
	);

	$projects []= array(
		'name' => "clippy-jquery",
		'description' => "A jQuery plugin that utilizes the clippy SWF to enable easy copy-and-paste on web content.",
		'github' => "jimmysawczuk/clippy-jquery",
		'web' => "http://jimmysawczuk.github.com/clippy-jquery",
		'tags' => array("javascript", "development", "open-source")
	);

	$projects []= array(
		'name' => "Real Time Notes",
		'description' => "An online tool that lets users create timed logs or diaries for export later.",
		'web' => "http://www.realtimenotes.com",
		'tags' => array("php", "website")
	);

	$projects []= array(
		'name' => "Too Long For Twitter",
		'description' => "A tool for writing posts that would otherwise be tweets but are too long. Provides an easy way to post to Twitter as well.",
		'web' => "http://www.toolongfortwitter.com",
		'tags' => array("php", "website")
	);

	$projects []= array(
		'name' => "fangate",
		'description' => "An open-source PHP framework for making gated Facebook fan pages.",
		'github' => 'jimmysawczuk/fangate',
		'tags' => array('php', 'facebook', 'open-source')
	);

	$projects []= array(
		'name' => "Invaders",
		'description' => "An XNA game which was my last homework assignment for my game development class my senior year in college.",
		'tags' => array("xna", "c#", "game", "open-source"),
		'web' => "http://files.jimmysawczuk.com/files/invaders.php",
		'bitbucket' => "jimmysawczuk/invaders",
		'screenshots' => array(
			array('src' => "http://files.jimmysawczuk.com/files/images/invaders_ss1.jpg", 'alt' => "Screenshot")
		)
	);

	$projects []= array(
		'name' => "George in Space!",
		'description' => "My first XNA game that was any fun at all. Not as cool as Invaders.",
		'tags' => array("xna", "c#", "game"),
		'web' => "http://files.jimmysawczuk.com/files/georgeinspace.php",
		'screenshots' => array(
			array('src' => "http://files.jimmysawczuk.com/files/images/gis_ss1.jpg", 'alt' => "Screenshot")
		)
	);

	$projects []= array(
		'name' => "Sleep Timer",
		'description' => "A little Windows application that performs a variety of operations after a set timer has elapsed.",
		'tags' => array("c#", "utility", "windows", "open-source"),
		'download' => "http://files.jimmysawczuk.com/files/sleeptimer/Setup.msi",
		'bitbucket' => "jimmysawczuk/sleeptimer",
		'screenshots' => array(
			array('src' => "http://www.jimmysawczuk.com/wp-content/uploads/2011/01/sleeptimer_ss1.jpg", 'alt' => "Screenshot")
		)
	);

	$projects []= array(
		'name' => "FlashCard",
		'description' => "An application I wrote to test myself on German vocabulary words, and since has been requested by many family members.",
		'tags' => array("c#", "utility", "windows", "education", "open-source"),
		'bitbucket' => 'jimmysawczuk/flashcard',
		'download' => "http://files.jimmysawczuk.com/files/flashcard/FlashCardSetup.msi"
	);

	$projects []= array(
		'name' => "Big Prize Giveaways Prizes Tab",
		'description' => "A handy miniature prizes tab (in the form of a Chrome extension) that shows currently-running Big Prize Giveaways sweepstakes.",
		'download' => "https://chrome.google.com/extensions/detail/dehinmdmfgclcpijadomcogabhdceakj",
		'tags' => array("javascript", "chrome-extension", "work")
	);

	$projects []= array(
		'name' => "Facebook Page Lookup",
		'description' => "A Chrome extension to quickly lookup information about Pages on Facebook.",
		'download' => "https://chrome.google.com/webstore/detail/eloopmgpiphiokehjgomphnnlejikbol",
		'bitbucket' => 'jimmysawczuk/facebook-page-finder',
		'tags' => array("javascript", "chrome-extension", "facebook", "open-source")
	);

	/**************************************
	Don't edit past this line
	**************************************/

	$cols = array();
	$i = 0;
	foreach ($projects as $project)
	{
		$id = strtolower($project['name']);
		$id = preg_replace('#\s+#', '_', $id);
		$id = preg_replace('#\W+#', '_', $id);
		$id = preg_replace('#_+#', '_', $id);

		$project['id'] = $id;


		$idx = $i % 3;
		$cols["{$idx}"] []= $project;
		$i++;
	}

	return array($projects, $cols);	
}

