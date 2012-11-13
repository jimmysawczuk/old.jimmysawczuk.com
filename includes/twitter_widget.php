<?php

class TwitterWidget extends WP_Widget {

	function TwitterWidget() {
		// Instantiate the parent object
		parent::WP_Widget( false, 'Twitter Feed' );
	}

	function widget( $args, $instance ) {
?>
	<?=$args['before_widget']; ?>
		<?=$args['before_title']; ?>On Twitter<?=$args['after_title'] ?>
		<div id="twitter_div">
			<ul id="twitter_update_list"></ul>
		</div>
		<script type="text/javascript" src="https://twitter.com/javascripts/blogger.js"></script>
		<script type="text/javascript" src="https://api.twitter.com/1/statuses/user_timeline/JimmySawczuk.json?callback=twitterCallback2&amp;count=7"></script>
			
	<?=$args['after_widget']; ?>
<?
	}
}

function twitter_register_widgets() {
	register_widget( 'TwitterWidget' );
}

add_action( 'widgets_init', 'twitter_register_widgets' );
