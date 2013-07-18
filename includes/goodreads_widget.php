<?php

class GoodreadsWidget extends WP_Widget {

	function __construct()
	{
		parent::__construct("goodreads", "Goodreads");
	}

	function widget($args, $instance)
	{
?>
	<?=$args['before_widget']; ?>
		<?=$args['before_title']; ?><?=$instance['title']; ?><?=$args['after_title'] ?>
		<div class="goodreads-container" data-shelf="<?=$instance['shelf'] ?>" data-widget-id="<?=$this->number ?>">
			<ul></ul>
		</div>
	<?=$args['after_widget']; ?>
<?
	}

	function form($instance)
	{
		if (!isset($instance['user_id']))
		{
			$instance['user_id'] = "";
		}

		if (!isset($instance['shelf']))
		{
			$instance['shelf'] = "";
		}

		if (!isset($instance['api_key']))
		{
			$instance['api_key'] = "";
		}

		if (!isset($instance['title']))
		{
			$instance['title'] = "";
		}

?>
	<label for="<?= $this->get_field_id('api_key'); ?>"><?= _e("Goodreads API Key:"); ?></label>
	<input class="widefat" id="<?= $this->get_field_id('api_key'); ?>" name="<?=$this->get_field_name('api_key'); ?>" type="text" value="<?= esc_attr($instance['api_key']); ?>" />

	<label for="<?= $this->get_field_id('user_id'); ?>"><?= _e("Goodreads User ID:"); ?></label>
	<input class="widefat" id="<?= $this->get_field_id('user_id'); ?>" name="<?=$this->get_field_name('user_id'); ?>" type="text" value="<?= esc_attr($instance['user_id']); ?>" />

	<hr />

	<label for="<?= $this->get_field_id('shelf'); ?>"><?= _e("Shelf:"); ?></label>
	<input class="widefat" id="<?= $this->get_field_id('shelf'); ?>" name="<?=$this->get_field_name('shelf'); ?>" type="text" value="<?= esc_attr($instance['shelf']); ?>" />

	<label for="<?= $this->get_field_id('title'); ?>"><?= _e("Title:"); ?></label>
	<input class="widefat" id="<?= $this->get_field_id('title'); ?>" name="<?=$this->get_field_name('title'); ?>" type="text" value="<?= esc_attr($instance['title']); ?>" />
<?php
	}

	function update($new_instance, $old_instance)
	{
		$instance = array();
		if (is_numeric($new_instance['user_id']))
		{
			$instance['user_id'] = $new_instance['user_id'];
		}
		else
		{
			$instance['user_id'] = "";
		}

		if (preg_match('#^[\w\-_]+$#', $new_instance['shelf']))
		{
			$instance['shelf'] = $new_instance['shelf'];
		}

		if (preg_match('#^[\w]+$#', $new_instance['api_key']))
		{
			$instance['api_key'] = $new_instance['api_key'];
		}

		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}
}

function goodreads_register_widgets() {
	register_widget( 'GoodreadsWidget' );
}

add_action( 'widgets_init', 'goodreads_register_widgets' );
