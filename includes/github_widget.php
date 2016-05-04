<?php

class GithubWidget extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, 'Github Widget' );
	}

	function widget( $args, $instance )
	{
?>
	<?=$args['before_widget']; ?>
		<?=$args['before_title'] ?>On Github<?=$args['after_title'] ?>
		<ul id="github_events"></ul>
	<?=$args['after_widget']; ?>
<?
	}
}

function github_register_widgets() {
	register_widget( 'GithubWidget' );
}

add_action( 'widgets_init', 'github_register_widgets' );
