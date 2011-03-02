<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) {
echo '<p class="nocomments">';
echo _e('This post is password protected. Enter the password to view comments.','lightword');
echo '</p>';
return;
}
$comments_nr = get_comment_type_count('comment');
$trackbacks_nr = get_comment_type_count('ping');
$oddcomment = 'alt ';
?>
<div id="tabsContainer">
<a href="#" class="tabs selected"><span><?php _e('Comments','lightword'); ?> (<?php echo $comments_nr; ?>)</span></a>
<a href="#" class="tabs"><span><?php _e('Trackbacks','lightword'); ?> (<?php echo $trackbacks_nr; ?>)</span></a>  <span class="subscribe_comments"><?php post_comments_feed_link(__('( subscribe to comments on this post )','lightword')); ?></span>
<div class="clear_tab"></div>
<div class="tab-content selected">
<a name="comments"></a>
<?php if ( $comments ) : ?>
<div id="comentarii">
<ol class="commentlist">
<?php wp_list_comments('type=comment&callback=nested_comments'); ?>
</ol>

<div class="alignleft"><?php previous_comments_link(__('&laquo; Older Comments','lightword')); ?></div>
<div class="alignright"><?php next_comments_link(__('Newer Comments &raquo;','lightword')); ?></div>
<div class="clear"></div>
</div>

<?php else : ?>
<?php if ('open' == $post->comment_status) : ?>
<p class="no"><?php _e('No comments yet.','lightword'); ?></p>
<?php else : // comments are closed ?>
<p class="no"><?php _e('Sorry, the comment form is closed at this time.','lightword'); ?></p>
<?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

<div id="respond">
<h2 style="background:transparent;"><?php comment_form_title( __('Leave a comment', 'lightword'), 'Re: %s \'s comment' ); ?></h2>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.','lightword'), get_option('siteurl')."/wp-login.php?redirect_to=".urlencode(get_permalink()));?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>
<p><?php printf(__('Logged in as %s.','lightword'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>'); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account','lightword') ?>"><?php _e('Log out &raquo;','lightword'); ?></a></p>

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><?php _e('Name','lightword'); ?> <?php if ($req) _e('(required)','lightword'); ?></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><?php _e('Mail (will not be published)','lightword');?> <?php if ($req) _e('(required)','lightword'); ?></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><?php _e('Website','lightword'); ?></label></p>

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<?php endif; ?>

<div style="vertical-align: middle">
<input name="submit" type="submit" id="submit" tabindex="5" value="<?php echo attribute_escape(__('Submit','lightword')); ?>" style="margin: 2px" />
<?php cancel_comment_reply_link(__('( Click here to cancel reply )', 'lightword')); ?>  
<br class="clear"/>
</div>
<?php comment_id_fields(); ?>
<?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; ?>
</div>
<?php endif; ?>
</div>

<div class="tab-content">
<?php if($trackbacks_nr == "0") { echo "<p class=\"no\">"; ?><?php _e('No trackbacks yet.','lightword'); ?><?php echo "</p>"; } ?>
<?php foreach ($comments as $comment) : ?>
<?php $comment_type = get_comment_type(); ?>
<?php if($comment_type != 'comment') { ?>
<div class="trackbacks"><?php comment_author_link() ?></div>
<?php } ?>
<?php endforeach; ?>
</div>
</div>