<?php

class BitBucketWidget extends WP_Widget {

	function BitBucketWidget() {
		// Instantiate the parent object
		parent::WP_Widget( false, 'BitBucket Widget' );
	}

	function widget( $args, $instance ) 
	{
		$events = BitBucket::ActivityFeed(5);
?>
	
	<?=$args['before_widget']; ?>
		<?=$args['before_title'] ?>On BitBucket<?=$args['after_title'] ?>
		
		<ul id="bitbucket_events">
			<? foreach ($events as $event): ?>
				<li>
					<?=$event['story'] ?>		
				</li>	
			<? endforeach; ?>
		</ul>	
			
	<?=$args['after_widget']; ?>
<?
	}
}

function bitbucket_register_widgets() {
	register_widget( 'BitBucketWidget' );
}

add_action( 'widgets_init', 'bitbucket_register_widgets' );
