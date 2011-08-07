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
			<? /* <a href="http://twitter.com/JimmySawczuk" id="twitter-link" style="display:block;text-align:right;">follow me on Twitter</a> */ ?>
		</div>
		<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
		<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/JimmySawczuk.json?callback=twitterCallback2&amp;count=10"></script>	
			
	<?=$args['after_widget']; ?>
<?
	}
}

function twitter_register_widgets() {
	register_widget( 'TwitterWidget' );
}

add_action( 'widgets_init', 'twitter_register_widgets' );
