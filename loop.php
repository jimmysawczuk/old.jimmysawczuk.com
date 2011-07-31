<? if (have_posts()): 
	while (have_posts()): 
		
	the_post(); 
?>
	<div class="post" id="post-<? the_ID(); ?>">
		<div class="post_header">
			<div class="post_info">
				<div class="post_date">
					<big><?=date("j", strtotime(get_the_date())); ?></big>
					<small><?=date("M y", strtotime(get_the_date())); ?></small>
				</div>
				<div class="post_comments">
					<big><a href="<? the_permalink(); ?>#comments"><?=$post->comment_count ?></a></big>
					<small><?=pluralize($post->comment_count, "comment", "comments"); ?></small>
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
			<? the_content('Read more &raquo;'); ?>
		</div>
	</div>
<? 
	endwhile; 
endif; 
?>
