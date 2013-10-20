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
					<span class="big"><a href="<? the_permalink(); ?>#comments"><fb:comments-count href="<? the_permalink(); ?>"></fb:comments-count></a></span>
					<span class="small">Comments</span>
				</div>
				<div class="post_social">
					<div class="aligncenter">
						<a href="https://www.facebook.com/sharer.php?u=<?=urlencode(get_permalink()); ?>" class="share-button share-button-fb" title="Share on Facebook" data-width="650" data-height="450">
							<span class="icon icon-facebook"></span>
							<span class="text">Share</span>
						</a>
						<a href="https://twitter.com/share?url=<?=urlencode(get_permalink()); ?>" class="share-button share-button-twitter" title="Tweet on Twitter">
							<span class="icon icon-twitter"></span>
							<span class="text">Tweet</span>
						</a>
						<a href="https://plus.google.com/share?url=<?=urlencode(get_permalink()); ?>" class="share-button share-button-gplus" title="Share on Google+" data-height="600">
							<span class="icon icon-google-plus"></span>
							<span class="text">Share</span>
						</a>
						<a href="https://www.linkedin.com/cws/share?isFramed=true&lang=en_US&url=<?=urlencode(get_permalink()); ?>" class="share-button share-button-linkedin" title="Share on LinkedIn">
							<span class="icon icon-linkedin"></span>
							<span class="text">Share</span>
						</a>
					</div>
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
				<div class="recommendations">
					<fb:recommendations site="<?=blog_domain(); ?>" width="575" height="300" header="true" font="arial" border_color="" colorscheme="light"></fb:recommendations>
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
							<a href="<? the_permalink(); ?>#comments"><fb:comments-count href="<? the_permalink(); ?>"></fb:comments-count> Comments</a>
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
				<fb:comments href="<? the_permalink(); ?>" num_posts="10" width="575"></fb:comments>
			</div>
		<? endif; ?>
	</div>

	<? if (!is_page() && $paged < 2 && $i == 0 && !is_single()): ?>
		<div id="interstitial_recommendations">
			<div class="container">
				<fb:activity site="<?=blog_domain(); ?>" width="575" height="300" header="true" font="arial" border_color="#aaa" recommendations="false"></fb:activity>
			</div>
		</div>
	<? endif; ?>
<?
	$i++; endwhile;
?>

	<div id="pagination"><? posts_nav_link(' ','<span class="previous">Previous</span>','<span class="next">Next</span>'); ?></div>

<?
else:
	echo '<h1>No posts matched your search.</h1>';
endif;
?>
