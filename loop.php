<? if (have_posts()):
	$i = 0; while (have_posts()):

	the_post();
?>
	<div class="<?=get_post_type() == 'post'? 'post' : 'post page'; ?> <?=(!is_page() && $paged < 2 && $i == 0 && !is_single())? 'post_first' : '' ?>" id="<?=get_post_type() == 'post'? 'post' : 'page'; ?>-<? the_ID(); ?>">
		<div class="post_header">
			<div class="post_info">
				<div class="post_date">
					<span class="big"><?=date("j", strtotime(get_the_date())); ?></span>
					<span class="small"><?=date("M y", strtotime(get_the_date())); ?></span>
				</div>
				<div class="post_comments">
					<span class="big"><a href="<? the_permalink(); ?>#comments"><span class="fb-comments-count" data-href="<? comments_permalink(); ?>"></span></a></span>
					<span class="small">Comments</span>
				</div>
				<div class="top_link">
					<a href="#container">Top</a>
				</div>
			</div>
			<h2><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h2>
			<? $subtitle = get_post_custom_values('Subtitle'); if ($subtitle && !empty($subtitle) && count($subtitle) > 0): ?>
				<h3 class="subtitle"><?=$subtitle[0]; ?></h3>
			<? endif; ?>
		</div>

		<div class="content">
			<? the_content(''); ?>
			<? if (is_single()): ?>
				<hr class="recommendation-divider" />
				<div class="original">
					Originally posted on <a href="<?=bloginfo('url'); ?>"><?=bloginfo('site_name') ?></a> on
					<?=date("F j, Y \a\\t g:i A", strtotime($post->post_date)); ?>. Post text content &copy;
					<?=date("Y", strtotime($post->post_date)); ?> Jimmy Sawczuk. All rights reserved.
				</div>
			<? endif; ?>
			<? if (!is_page()): ?>
				<div class="meta">
					<div class="more-link">
						<? if (has_more_link() && !is_single()): ?>
							<a href="<? the_permalink(); ?>#more-<? the_ID(); ?>">Read more &raquo;</a>
						<? else: ?>
							<a href="<? the_permalink(); ?>#comments"><span class="fb-comments-count" data-href="<? comments_permalink(); ?>"></span> Comments</a>
						<? endif; ?>
					</div>

					<div class="tags">
						<? the_tags("Tags: ", ", "); ?>
					</div>
				</div>
			<? endif; ?>
		</div>

		<? if (is_single() && !is_page()): ?>
			<div id="comments">
				<h4>Comments</h4>
				<div class="fb-comments" data-href="<? comments_permalink(); ?>" data-version="v2.3" data-width="100%" data-numposts="10"></div>
			</div>
		<? endif; ?>
	</div>
<?
	$i++; endwhile;
?>

	<div id="pagination"><? posts_nav_link(' ','<span class="previous">Previous</span>','<span class="next">Next</span>'); ?></div>

<?
else:
	echo '<h1>No posts matched your search.</h1>';
endif;
?>
