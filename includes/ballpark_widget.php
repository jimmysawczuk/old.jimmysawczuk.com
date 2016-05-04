<?php

class BallparkWidget extends WP_Widget
{
	private $ballparks;

	function __construct()
	{
		// Instantiate the parent object
		parent::__construct(false, 'Ballpark Widget');

		$ballparks = get_ballparks();

		usort($ballparks, function($a1, $a2)
		{
			if ($a1['name'] > $a2['name']) return +1;
			elseif ($a1['name'] < $a2['name']) return -1;
			return 0;
		});

		$this->ballparks = $ballparks;
	}

	function widget( $args, $instance )
	{
	?>
	<?=$args['before_widget']; ?>
		<?=$args['before_title'] ?>Ballparks<?=$args['after_title'] ?>
		<ul id="ballpark_resume">
			<? $even = false; foreach ($this->ballparks as $ballpark): ?>
				<li>
					<div class="rating">
						<?=$ballpark['rating'] ?>
					</div>
					<p class="link">
						<a href="<?=isset($ballpark['article'])? $ballpark['article'] : 'javascript: void(0);' ?>">
							<?=$ballpark['name'] ?>
						</a>
					</p>
					<p class="small">
						Visited on <?=date("F j, Y", $ballpark['visit']); ?>
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
