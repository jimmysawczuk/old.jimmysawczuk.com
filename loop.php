<? if (have_posts()): 
	while (have_posts()): 
		
	the_post(); 
?>
	<div class="post" id="post-<?=$post->ID ?>">
		<div class="post_header">
			<div class="post_info">
				<div class="post_date">
					<big><?=date("j", strtotime($post->post_date)); ?></big>
					<small><?=date("M y", strtotime($post->post_date)); ?></small>
				</div>
				<div class="post_comments">
					<big><?=$post->comment_count ?></big>
					<small><?=pluralize($post->comment_count, "comment", "comments"); ?></small>
				</div>
				<div class="post_social">
					<div class="aligncenter">
						<fb:like href="<?=$post->guid ?>" send="true" layout="box_count" width="50" show_faces="true"></fb:like>
					</div>
					<div class="aligncenter">
						<a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a>
					</div>
				</div>
			</div>
			<h2><?=$post->post_title ?></h2>
		</div>
		
		<div class="content">
			<? the_content('Read more &raquo;'); ?>
		</div>
	</div>
<? 
	endwhile; 
endif; 
?>
