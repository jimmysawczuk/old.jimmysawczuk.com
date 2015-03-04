<?php

function get_projects()
{
	$projects = array();

	$projects []= array(
		'name' => "jimmysawczuk.com",
		'description' => "The WordPress theme that runs the very blog you're looking at",
		'web' => "http://www.jimmysawczuk.com",
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
		'name' => "dove",
		'description' => "A tool to make web requests from a web interface",
		'github' => "jimmysawczuk/dove",
		'tags' => array("go", "open-source", "development")
	);

	$projects []= array(
		'name' => "scm-status",
		'description' => "A repository status snapshot generator in Go",
		'github' => "jimmysawczuk/scm-status",
		'tags' => array("go", "open-source", "development")
	);

	$projects []= array(
		'name' => "Inline LESS",
		'description' => "A Chrome extension to render LESS-enhanced CSS in <style> tags.",
		'github' => "jimmysawczuk/inline-less",
		'tags' => array("javascript", "chrome-extension", "open-source", "development")
	);

	$projects []= array(
		'name' => 'less-tree',
		'description' => "A batch tool to compile a bunch of LESS files and organize the results",
		'github' => "jimmysawczuk/less-tree",
		'tags' => array("go", "development", "open-source")
	);

	$projects []= array(
		'name' => "pegasus",
		'description' => "A Nike+ API consumer in Go",
		'github' => "jimmysawczuk/pegasus",
		'tags' => array("go", "open-source", "development"),
	);

	$projects []= array(
		'name' => "clippy-jquery",
		'description' => "A jQuery plugin that utilizes the clippy SWF to enable easy copy-and-paste on web content",
		'github' => "jimmysawczuk/clippy-jquery",
		'web' => "http://jimmysawczuk.github.com/clippy-jquery",
		'tags' => array("javascript", "development", "open-source")
	);

	$projects []= array(
		'name' => 'flag.php',
		'description' => "A PHP class to process command line flags",
		'tags' => array("php", "open-source", "development"),
		'github' => "jimmysawczuk/flag.php",
	);

	$projects []= array(
		'name' => 'go-aws',
		'description' => "A Go library for AWS services (particularly S3)",
		'tags' => array("go", "open-source", "development"),
		'github' => "jimmysawczuk/go-aws",
		'travis' => array(
			'path' => "jimmysawczuk/go-aws",
			'branch' => "master",
		),
	);

	$projects []= array(
		'name' => 'go-facebook',
		'description' => "A Go library to access the Facebook Graph API",
		'tags' => array("go", "open-source", "development"),
		'github' => "jimmysawczuk/go-facebook",
		'travis' => array(
			'path' => "jimmysawczuk/go-facebook",
			'branch' => "master",
		),
	);

	$projects []= array(
		'name' => 'go-config',
		'description' => "A Go library to set and retrieve relevant config options in a project",
		'tags' => array("go", "open-source", "development"),
		'github' => "jimmysawczuk/go-config",
		'travis' => array(
			'path' => "jimmysawczuk/go-config",
			'branch' => "master",
		),
	);

	$projects []= array(
		'name' => 'worker',
		'description' => "A Go library that makes it easy to parallelize processes or tasks",
		'tags' => array("go", "open-source", "development"),
		'github' => "jimmysawczuk/worker"
	);

	$projects []= array(
		'name' => "go-binary",
		'description' => "A small program that generates embeddable binary code from static assets",
		'github' => "jimmysawczuk/go-binary",
		'tags' => array("go", "open-source", "development")
	);

	$projects []= array(
		'name' => "Invaders",
		'description' => "An XNA game which was my last homework assignment for my game development class my senior year in college.",
		'tags' => array("xna", "c#", "game", "open-source"),
		'web' => "http://files.jimmysawczuk.com/files/invaders.php",
		'bitbucket' => "jimmysawczuk/invaders",
		'screenshots' => array(
			array('src' => get_bloginfo('stylesheet_directory') . "/images/projects/invaders_ss1.jpg", 'alt' => "Screenshot")
		)
	);

	$projects []= array(
		'name' => "George in Space!",
		'description' => "My first XNA game that was any fun at all. Not as cool as Invaders.",
		'tags' => array("xna", "c#", "game"),
		'web' => "http://files.jimmysawczuk.com/files/georgeinspace.php",
		'screenshots' => array(
			array('src' => get_bloginfo('stylesheet_directory') . "/images/projects/gis_ss1.jpg", 'alt' => "Screenshot")
		)
	);

	$projects []= array(
		'name' => "Sleep Timer",
		'description' => "A little Windows application that performs a variety of operations after a set timer has elapsed.",
		'tags' => array("c#", "utility", "windows", "open-source"),
		'download' => "http://files.jimmysawczuk.com/files/sleeptimer/Setup.msi",
		'screenshots' => array(
			array('src' => get_bloginfo('stylesheet_directory') . "/images/projects/sleeptimer_ss1.jpg", 'alt' => "Screenshot")
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
		'name' => "Scaffolding",
		'description' => "An MVC PHP framework for web applications.",
		'github' => "jimmysawczuk/scaffolding",
		'tags' => array("php", "open-source", "development")
	);

	$projects []= array(
		'name' => "fangate",
		'description' => "An open-source PHP framework for making gated Facebook fan pages.",
		'github' => 'jimmysawczuk/fangate',
		'tags' => array('php', 'facebook', 'open-source')
	);

	$projects []= array(
		'name' => "Real Time Notes",
		'description' => "An online tool that lets users create timed logs or diaries for export later.",
		'web' => "http://realtimenotes.jimmysawczuk.com",
		'tags' => array("php", "website")
	);

	$projects []= array(
		'name' => "Facebook Circles",
		'description' => "A proof-of-concept app demonstrating a better UI to manage Facebook lists",
		'tags' => array("javascript", "facebook", "open-source"),
		'github' =>'jimmysawczuk/facebook-circles',
		'web' => "http://apps.facebook.com/better_lists/",
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

