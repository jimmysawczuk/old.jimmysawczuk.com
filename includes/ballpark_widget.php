<?php

class BallparkWidget extends WP_Widget
{
	private $ballparks;

	function BallparkWidget()
	{
		// Instantiate the parent object
		parent::WP_Widget( false, 'Ballpark Widget' );

		list($ballparks, $cols) = get_ballparks();

		$this->ballparks = $ballparks;
	}

	function widget( $args, $instance )
	{
	?>
	<?=$args['before_widget']; ?>
		<?=$args['before_title'] ?>Ballpark Resum&eacute;<?=$args['after_title'] ?>
		<ul id="ballpark_resume">		
			<? $even = false; foreach ($this->ballparks as $ballpark): ?>
				<li class="<?=$even? 'even' : 'odd' ?>">
					<div class="rating">
						<?=$ballpark['rating'] ?>
					</div>
					<p class="link">
						<a href="<?=isset($ballpark['article'])? $ballpark['article'] : 'javascript: void(0);' ?>">
							<?=$ballpark['name'] ?>
						</a>
					</p>
					<p class="small">
						Visited: <?=date("F j, Y", $ballpark['visit']); ?>
					</p>
				</li>
			<? $even = !$even; endforeach; ?>
		</ul>
			
	<?=$args['after_widget']; ?>
	<?
	}
}

function ballpark_register_widgets()
{
	register_widget( 'BallparkWidget' );
}

add_action( 'widgets_init', 'ballpark_register_widgets' );
