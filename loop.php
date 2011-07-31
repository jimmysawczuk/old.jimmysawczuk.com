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
					<big><?=$post->comment_count ?></big>
					<small><?=pluralize($post->comment_count, "comment", "comments"); ?></small>
				</div>
				<div class="post_social">
					<div class="aligncenter">
						<fb:like href="<?=$post->guid ?>" send="true" layout="box_count" width="60" show_faces="false"></fb:like>
					</div>
					<div class="aligncenter">
						<a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a>
					</div>
				</div>
			</div>
			<h2><a href="<? the_permalink(); ?>"><?=$post->post_title ?></a></h2>
		</div>
		
		<div class="content">
			<? the_content('Read more &raquo;'); ?>
		</div>
	</div>
<? 
	endwhile; 
endif; 
?>
