<? if (have_posts()):
	$i = 0; while (have_posts()):

	the_post();
?>
	<div class="<?=get_post_type() == 'post'? 'post' : 'post page'; ?> <?=(!is_page() && $paged < 2 && $i == 0 && !is_single())? 'post_first' : '' ?>" id="<?=get_post_type() == 'post'? 'post' : 'page'; ?>-<? the_ID(); ?>" data-permalink="<? the_permalink(); ?>">
		<div class="post_header">
			<div class="post_info">
				<div class="post_date">
					<div class="big"><?=date("j", strtotime(get_the_date())); ?></div>
					<div class="small"><?=date("M Y", strtotime(get_the_date())); ?></div>
				</div>
				<div class="post_hearts">
					<a href="javascript: void(0);" class="toggle_heart">
						<div class="big"><span class="count">&mdash;</span></div>
						<div class="small"><i class="icon-star"></i></div>
					</a>
				</div>
				<div class="post_comments">
					<a href="<? the_permalink(); ?>#comments">
						<div class="big"><span class="fb-comments-count" data-href="<? comments_permalink(); ?>">&mdash;</span></div>
						<div class="small"><i class="icon-comment"></i></div>
					</a>
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

		<div class="post_info_inline">
			<span class="info post_date">
				Published <?=date("F jS, Y", strtotime(get_the_date())); ?>
			</span>
			<span class="info post_hearts">
				<a href="javascript: void(0);" class="toggle_heart">
					<i class="icon-star"></i>
					<span class="count">&mdash;</span>
				</a>
			</span>
			<span class="info post_comments">
				<a href="<? the_permalink(); ?>#comments">
					<i class="icon-comment"></i>
					<span class="count fb-comments-count" data-href="<? comments_permalink(); ?>">&mdash;</span>
				</a>
			</span>
		</div>

		<div class="content">
			<? the_content(''); ?>
			<? if (is_single()): ?>
				<div class="post_info_inline">
					<span class="info info-boxed post_hearts">
						<a href="javascript: void(0);" class="toggle_heart">
							<i class="icon-star"></i>
							<span class="count">&mdash;</span>
						</a>
					</span>
					<span class="info info-boxed post_comments">
						<a href="<? the_permalink(); ?>#comments">
							<i class="icon-comment"></i>
							<span class="count fb-comments-count" data-href="<? comments_permalink(); ?>">&mdash;</span>
						</a>
					</span>
				</div>
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
