<?php

class LikeBoxWidget extends WP_Widget {

	function LikeBoxWidget() {
		// Instantiate the parent object
		parent::WP_Widget( false, 'Facebook Like Box' );
	}

	function widget( $args, $instance ) {
?>
	<?=$args['before_widget']; ?>
		<?=$args['before_title'] ?>On Facebook<?=$args['after_title'] ?>
		<div id="fanbox_container">
			<fb:like-box href="http://www.facebook.com/clevelandcurveballsandcommonsense" width="250" height="450" show_faces="true" border_color="#eee" stream="false" header="false"></fb:like-box>
		</div>
			
	<?=$args['after_widget']; ?>
<?
	}
}

function likebox_register_widgets() {
	register_widget( 'LikeBoxWidget' );
}

add_action( 'widgets_init', 'likebox_register_widgets' );
