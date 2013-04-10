<?php

class GoodreadsWidget extends WP_Widget {

	function GoodreadsWidget() {
		// Instantiate the parent object
		parent::WP_Widget( false, "GoodReads");
	}

	function widget( $args, $instance ) {
?>
	<?=$args['before_widget']; ?>
		<?=$args['before_title']; ?>What I'm Reading<?=$args['after_title'] ?>
		<div id="twitter_div">
			<ul id="goodreads_books"></ul>
		</div>
	<?=$args['after_widget']; ?>
<?
	}
}

function goodreads_register_widgets() {
	register_widget( 'GoodreadsWidget' );
}

add_action( 'widgets_init', 'goodreads_register_widgets' );
