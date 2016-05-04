<?php

class TwitterWidget extends WP_Widget {

	function __construct() {
		parent::__construct( false, 'Twitter Feed' );
	}

	function widget( $args, $instance ) {
?>
	<?=$args['before_widget']; ?>
		<?=$args['before_title']; ?>On Twitter<?=$args['after_title'] ?>
		<div id="twitter_feed">
			<ul></ul>
		</div>
	<?=$args['after_widget']; ?>
<?
	}
}

function twitter_register_widgets() {
	register_widget( 'TwitterWidget' );
}

add_action( 'widgets_init', 'twitter_register_widgets' );
