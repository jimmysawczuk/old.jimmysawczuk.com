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

		<img src="<?=get_bloginfo('stylesheet_directory') . '/images/about_jimmy_coffee.jpg'; ?>" alt="About Jimmy" />
		<br />
		<p>
			Jimmy is a 2009 graduate of <a href="http://www.case.edu">Case Western Reserve University</a> in Cleveland, OH
			and currently lives in Columbia, SC. He works as a software engineer for
			<a href="http://www.louddoor.com" target="_blank">LoudDoor</a>. He mostly writes about
			<a href="/tag/mlb">baseball</a> (particularly the <a href="/tag/indians">Cleveland Indians</a>),
			<a href="/tag/politics">politics</a>, <a href="/tag/movies">movies</a> and
			<a href="/tag/programming">programming</a>. He also enjoys a cup of great coffee and a good book.
		</p>

		<ul class="more">
			<li class="facebook">
				<a href="http://www.facebook.com/JimmySawczuk" target="_blank">Facebook</a>
			</li>
			<li class="twitter">
				<a href="http://www.twitter.com/JimmySawczuk" target="_blank">Twitter</a>
			</li>
			<li class="instagram">
				<a href="http://www.instagram.com/jimmysawczuk" target="_blank">Instagram</a>
			</li>
			<li class="google-plus">
				<a href="http://plus.google.com/+JimmySawczuk" target="_blank">Google+</a>
			</li>
			<li class="github">
				<a href="http://github.com/jimmysawczuk" target="_blank">GitHub</a>
			</li>
			<li class="camera">
				<a href="http://photos.jimmysawczuk.com" target="_blank">Photos</a>
			</li>
			<li class="info-sign">
				<a href="<?=get_bloginfo('url'); ?>/contact">Contact</a>
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
