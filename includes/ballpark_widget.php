<?php

class BallparkWidget extends WP_Widget {

	function BallparkWidget() {
		// Instantiate the parent object
		parent::WP_Widget( false, 'Ballpark Widget' );
	}

	function widget( $args, $instance ) {
	
	$my_query = get_bookmarks(array(
		'category_name' => 'Ballpark Resume',
		'order_by' => 'name'
	));
?>
	<?=$args['before_widget']; ?>
		<?=$args['before_title'] ?>Ballpark Resum&eacute;<?=$args['after_title'] ?>
		<ul id="ballpark_resume">		
			<? $even = false; foreach ($my_query as $link): ?>
				<li class="<?=$even? 'even' : 'odd' ?>">
					<div class="rating">
						<a href="<?=$link->link_url ?>">
							<?=$link->link_rating ?>
						</a>
					</div>
					<a href="<?=$link->link_url ?>">
						<?=$link->link_name ?>
					</a>
				</li>
			<? $even = !$even; endforeach; ?>
		</ul>
			
	<?=$args['after_widget']; ?>
<?
	}
}

function ballpark_register_widgets() {
	register_widget( 'BallparkWidget' );
}

add_action( 'widgets_init', 'ballpark_register_widgets' );
