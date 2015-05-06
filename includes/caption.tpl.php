<div id="<?=$id ?>" class="wp-caption <?=$align ?>" style="width: <?=$width + 10; ?>px;">
	<div class="wp-caption-container" style="<?=$width; ?>px;">
		<?=$content ?>

		<p class="wp-caption-text" style="width: <?=$width; ?>px;">
			<?=$caption; ?>
		</p>
	</div>
</div>
<div id="<?=$id ?>-mobile" class="wp-caption-mobile <?=$align ?>" style="width: auto; max-width: <?=$width + 10; ?>px;">
	<div class="wp-caption-container">
		<?=$content ?>

		<p class="wp-caption-text">
			<?=$caption; ?>
		</p>
	</div>
</div>
