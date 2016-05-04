<?php

class BitBucketWidget extends WP_Widget {

	function __construct() {
		parent::__construct( false, 'BitBucket Widget' );
	}

	function widget( $args, $instance )
	{
?>

	<?=$args['before_widget']; ?>
		<?=$args['before_title'] ?>On BitBucket<?=$args['after_title'] ?>
		<ul id="bitbucket_events"></ul>
	<?=$args['after_widget']; ?>
<?
	}
}

function bitbucket_register_widgets() {
	register_widget( 'BitBucketWidget' );
}

add_action( 'widgets_init', 'bitbucket_register_widgets' );
