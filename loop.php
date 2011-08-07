<? if (have_posts()): 
	while (have_posts()): 
		
	the_post();
?>
	<div class="<?=get_post_type() == 'post'? 'post' : 'post page'; ?>" id="<?=get_post_type() == 'post'? 'post' : 'page'; ?>-<? the_ID(); ?>">
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
						<fb:like href="<? the_permalink(); ?>" send="true" layout="box_count" width="60" show_faces="false"></fb:like>
					</div>
					<div class="aligncenter">
						<a href="http://twitter.com/share" class="twitter-share-button" data-url="<? the_permalink(); ?>" data-count="vertical">Tweet</a>
					</div>
				</div>
			</div>
			<h2><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h2>
		</div>
		
		<div class="content">
			<? the_content(''); ?>
			<? if (is_single()): ?>
				<hr class="recommendation-divider" />
				<fb:recommendations site="<?=bloginfo('url'); ?>" width="575" height="300" header="true" font="arial" border_color=""></fb:recommendations>
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
				<h1><fb:comment-count href="<? the_permalink(); ?>"></fb:comment:count></h1>
				<fb:comments href="<? the_permalink(); ?>" num_posts="10" width="575"></fb:comments>
			</div>
		<? endif; ?>
	</div>
<? 
	endwhile; 
else:	
	echo '<h1>No posts matched your search.</h1>';
endif; 
?>
