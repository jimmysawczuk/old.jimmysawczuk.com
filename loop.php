<? if (have_posts()): ?>
	<? while (have_posts()): ?>
		<? the_post(); generate_post(); ?>
	<? endwhile; ?>
<? endif; ?>

