<?php

class AboutMeWidget extends WP_Widget {

	function AboutMeWidget() {
		// Instantiate the parent object
		parent::WP_Widget( false, 'About Me' );
	}

	function widget( $args, $instance ) {
?>
	<?=$args['before_widget']; ?>
		<?=$args['before_title']; ?>About Jimmy<?=$args['after_title'] ?>
	
		<img src="<?=get_bloginfo('stylesheet_directory') . '/images/about_jimmy.jpg'; ?>" alt="About Jimmy" />
		<br />
		<p>
			Jimmy is a 2009 graduate of <a href="http://www.case.edu">Case Western Reserve University</a> in 
			Cleveland, OH, and currently works as a software engineer for 
			<a href="http://www.louddoor.com">LoudDoor</a> on a news feed optimization platform called 
			<a href="http://www.socialadvantage.com">Social Advantage</a> in Columbia, SC. He mostly writes 
			about <a href="/tag/mlb">baseball</a> (particularly the <a href="/tag/indians">Cleveland Indians</a>), 
			<a href="/tag/politics">politics</a>, <a href="/tag/movies">movies</a> and 
			<a href="/tag/programming">programming</a>. He also enjoys a cup of great coffee and a good book.
		</p>
		
		<div class="more_link">
			<a href="<?=get_bloginfo('url'); ?>/contact">More &raquo;</a>
		</div>
		
		<br class="clearboth" />
			
	<?=$args['after_widget']; ?>
<?
	}
}

function aboutme_register_widgets() {
	register_widget( 'AboutMeWidget' );
}

add_action( 'widgets_init', 'aboutme_register_widgets' );
