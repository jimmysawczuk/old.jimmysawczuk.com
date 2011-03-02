<?php if (have_posts()) : while (have_posts()) : the_post(); 

$article = get_the_content();
$matches = array();
$meta_img = preg_match("/<img(?:.*?)src=\"(.*?)\"(?:.*?)\>/si", $article, $matches);
if (isset($matches[1]))
{
	define('META_IMG', $matches[1]); 
}

get_header(); ?>
<div id="content-body">
<div <?php if (function_exists("post_class")) post_class(); else print 'class="post"'; ?> id="post-<?php the_ID(); ?>">
<div class="comm_date"><span class="data"><span class="j"><?php the_time('j'); ?></span><br/><span class="my"><?php the_time('M/y'); ?></span></span><span class="nr_comm"><?php if($dsq_version){ echo '<a class="nr_comm_spot" href="'; echo the_permalink(); echo '">N/A</a>';  }else{ ?><a class="nr_comm_spot" href="<?php the_permalink(); ?>#comments"><?php echo get_comment_type_count('comment');?></a><?php } ?></span></div>
<h2><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<?php edit_post_link(__('Edit this post','lightword'), '', ''); ?>

<iframe src="http://www.facebook.com/plugins/like.php?href=<?=urlencode(the_permalink()); ?>&amp;layout=button_count&amp;show-faces=true&amp;width=80&amp;action=like&amp;colorscheme=light&amp;ref=single_post" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:80px; height: 20px;"></iframe>

<a href="http://twitter.com/share" class="twitter-share-button" data-url="<? the_permalink(); ?>" data-count="horizontal" data-text="<? the_title() ?>" data-via="JimmySawczuk">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<?php
$article = get_the_content();
$matches = array();
$meta_img = preg_match("/<img(?:.*?)src=\"(.*?)\"(?:.*?)\>/si", $article, $matches);
if (isset($matches[1])): ?>
<meta property="og:image" content="<?=$matches[1] ?>" />
<? endif; ?>
<?php the_content(''); ?>

<iframe src="http://www.facebook.com/plugins/recommendations.php?site=jimmysawczuk.com&amp;width=540&amp;height=350&amp;header=true&amp;colorscheme=light&amp;font=lucida+grande" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:540px; height:350px"></iframe>

<?php if ($lw_enjoy_post == "true" && is_attachment() != TRUE) : ?>
<div class="promote clear">
<h3><?php _e('Enjoy this article?','lightword'); ?></h3>
<p><a href="<?php bloginfo('rss2_url'); ?>"><?php  _e('Consider subscribing to our rss feed!','lightword'); ?></a></p>
</div>
<?php endif; ?>

<?php if ($lw_post_author == "true" && is_attachment() != TRUE) : ?>
<div class="about_author clear">
<div class="alignleft">
<?php echo get_avatar( get_the_author_id(), '28' );   ?>
</div>
<div class="alignleft" style="width:470px;">
<h4><?php _e('Author','lightword'); ?>: <a href="<?php the_author_url(); ?> "><?php the_author(); ?></a></h4>
<?php the_author_description(); if(!get_the_author_description()) _e('No description. Please complete your profile.','lightword'); ?></div><div class="clear"></div> </div>
<?php endif; ?>
<div class="cat_tags clear"><div class="category"><?php if($lw_disable_tags == "true" || !get_the_tags()) { _e('Filed under:','lightword'); echo " "; the_category(', ');} else if (get_the_tags() && $lw_disable_tags == "false") { _e('Tagged as:','lightword'); echo " "; the_tags(''); } ?></div>
<div class="continue"><a class="nr_comm_spot" href="<?php the_permalink(); ?>#respond"><?php if(get_comment_type_count('comment')==1) _e('1 Comment','lightword'); elseif(get_comment_type_count('comment')==0) _e('No Comments','lightword'); else echo get_comment_type_count('comment')." ".__('Comments','lightword'); ?></a></div><div class="clear"></div></div><div class="cat_tags_close"></div>
<?php wp_link_pages('before=<div class="nav_link">&after=</div>&next_or_number=number&pagelink=<span class="page_number">%</span>'); ?>
</div>

<?php comments_template(); ?>

<?php endwhile; else: ?>
<?php get_header(); ?>
<div id="content-body">
<h2><?php _e('Not Found','lightword'); ?></h2>
<p><?php  _e("Sorry, but you are looking for something that isn't here.","lightword"); ?></p>

<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>