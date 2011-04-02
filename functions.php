<?

function generate_post()
{
?>
<div id="post_<? the_ID(); ?>" class="post">
	<h2 class="post_title"><? the_title(); ?></h2>
	<div class="post_content">
		<? the_content(); ?>
	</div>
</div>
<?
}