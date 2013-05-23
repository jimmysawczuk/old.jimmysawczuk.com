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
			Jimmy is a 2009 graduate of <a href="http://www.case.edu">Case Western Reserve University</a> in Cleveland, OH, currently lives in Columbia, SC, and works as a software engineer for <a href="http://www.louddoor.com" target="_blank">LoudDoor</a> on <a href="http://www.brandsatisfaction.com" target="_blank">Brand Satisfaction</a>, a market research and brand benchmarking system on Facebook. He mostly writes about <a href="/tag/mlb">baseball</a> (particularly the <a href="/tag/indians">Cleveland Indians</a>), <a href="/tag/politics">politics</a>, <a href="/tag/movies">movies</a> and <a href="/tag/programming">programming</a>. He also enjoys a cup of great coffee and a good book.
		</p>

		<ul class="more">
			<li>
				<a href="<?=get_bloginfo('url'); ?>/contact"><i class="icon-info"></i> More</a>  <i class="icon-chevron-right"></i>
			</li>
			<li>
				<a href="http://www.facebook.com/JimmySawczuk" target="_blank"><i class="icon-facebook"></i> Facebook</a> <i class="icon-chevron-right"></i>
			</li>
			<li>
				<a href="http://www.twitter.com/JimmySawczuk" target="_blank"><i class="icon-twitter"></i> Twitter</a> <i class="icon-chevron-right"></i>
			</li>
			<li>
				<a href="http://code.jimmysawczuk.com" target="_blank"><i class="icon-github"></i> GitHub</a> <i class="icon-chevron-right"></i>
			</li>
			<li>
				<a href="http://photos.jimmysawczuk.com" target="_blank"><i class="icon-camera"></i> Photos</a> <i class="icon-chevron-right"></i>
			</li>
		</ul>

	<?=$args['after_widget']; ?>
<?
	}
}

function aboutme_register_widgets() {
	register_widget( 'AboutMeWidget' );
}

add_action( 'widgets_init', 'aboutme_register_widgets' );
