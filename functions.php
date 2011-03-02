<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'functions.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');

if ( function_exists('register_sidebar') )
register_sidebar(array(name =>'Sidebar','before_widget' => '<div class="sidebar-box">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));

$themename = "LightWord";
$themeversion = "1.7.5";
$shortname = "lw";

$options = array (

    array(	"name" => "Welcome",
			"type" => "title"),

	array(	"type" => "open"),

	array(  "name" => __('Disable Cufon','lightword'),
			"desc" => __('Check this box if you would like to DISABLE <em>Cufon</em><br/>','lightword'),
            "id" => $shortname."_cufon",
            "type" => "checkbox",
            "std" => "false"),

	array(  "name" => __('Activate Extra Cufon','lightword'),
			"desc" => __('Check this box if you would like to ENABLE <em>Extra Cufon</em> feature.<br/><b>For umlauts (german) and other special characters.</b>','lightword'),

            "id" => $shortname."_cufon_extra",
            "type" => "checkbox",
            "std" => "false"),

    array(  "name" => __('Enjoy this post','lightword'),
			"desc" => __('Check this box if you would like to ACTIVATE <em>Enjoy this post</em> feature','lightword'),
            "id" => $shortname."_enjoy_post",
            "type" => "checkbox",
            "std" => "false"),

    array(  "name" => __('Show categories on top','lightword'),
			"desc" => __('Check this box if you would like to SHOW CATEGORIES instead pages on top bar','lightword'),
            "id" => $shortname."_show_categories",
            "type" => "checkbox",
            "std" => "false"),

    array(  "name" => __('Disable comments on pages','lightword'),
			"desc" => __('Check this box if you would like to DISABLE COMMENTS on pages','lightword'),
            "id" => $shortname."_disable_comments",
            "type" => "checkbox",
            "std" => "false"),

    array(  "name" => __('Image instead text on header','lightword'),
			"desc" => __('Check this box if you would like to SHOW IMAGE instead Cufon text on header.<br/>Image location: <code>lightword/images/header-image.png</code> / Dimensions: <code>600x56px</code>','lightword'),
            "id" => $shortname."_top_header_image",
            "type" => "checkbox",
            "std" => "false"),

    array(  "name" => __('Post author','lightword'),
			"desc" => __('Add information about post author on post footer','lightword'),
            "id" => $shortname."_post_author",
            "type" => "checkbox",
            "std" => "false"),

    array(  "name" => __('Take out tags in posts footer','lightword'),
			"desc" => __('Show only categories in posts footer','lightword'),
            "id" => $shortname."_disable_tags",
            "type" => "checkbox",
            "std" => "false"),

	array(	"type" => "close")


);

/*
function get_quotes()
{

	$quotes = array(
	
		'http://www.imdb.com/title/tt0317705/quotes' => "I never look back, darling, it distracts from the now.",
		'http://www.imdb.com/title/tt0317705/quotes' => "They're penetrating the bureaucracy!",
		'http://www.imdb.com/title/tt1049413/quotes' => "I was hiding under your porch because I love you.",
		'http://www.imdb.com/title/tt0098904/quotes' => "Was that wrong? Should I not have done that?",
		'http://www.imdb.com/title/tt0098904/quotes' => "Do you ever get down on your knees and thank God you know me and have access to my dementia?",
		'http://www.imdb.com/title/tt0098904/quotes' => "Nothing mixes better than vanilla and chocolate. And yet still somehow racial harmony eludes us.",
		'http://www.imdb.com/title/tt0098904/quotes' => "The sea was angry that day, my friends - like an old man trying to send back soup in a deli.",
		'http://www.imdb.com/title/tt0098904/quotes' => "Serenity now. Insanity later.",
		'http://www.imdb.com/title/tt0098904/quotes' => " That means that at a funeral, the average American would rather be in the casket than doing the eulogy.",
		'http://www.imdb.com/title/tt1119646/quotes' => "Not at the table, Carlos!",
		'http://www.imdb.com/title/tt1119646/quotes' => "Tigers love pepper... they hate cinnamon.",
		'http://www.imdb.com/title/tt0377092/quotes' => "One time, she punched me in the face. It was AWESOME.",
		'http://www.imdb.com/title/tt0377092/quotes' => "We should totally just stab Caesar!",
		'http://www.imdb.com/title/tt0371746/quotes' => "I'm sorry. This is the fun-vee. The hum-drum-vee is back there.",
		'http://www.imdb.com/title/tt0898266/quotes' => "BAZINGA!",
		'http://www.imdb.com/title/tt0898266/quotes' => "Hello, Oompa Loompas of science!",
		'http://www.imdb.com/title/tt0460649/quotes' => "Don't say that! You're too liberal with the word \"legendary\"!",
		'http://www.imdb.com/title/tt0460649/quotes' => "I know when you don't phone-five, Ted.",
		'http://www.imdb.com/title/tt0487831/quotes' => "I sort of forget what I was talking about.",
		'' => "Putting 2 and 2 together since 1987."
	
	);
	
	$return_quotes = array();
	foreach ($quotes as $src => $quote)
	{
		$return_quotes []= array('src' => $src, 'quote' => $quote);
	}
	
	return $return_quotes;

}

function get_quote()
{
	$quotes = get_quotes();
	$rand_quote = rand(0, count($quotes) - 1);

	return $quotes[$rand_quote]['quote'];

}
*/


function mytheme_add_admin() {

global $themename, $shortname, $options;

if ( $_GET['page'] == basename(__FILE__) ) {

if ( 'save' == $_REQUEST['action'] ) {

foreach ($options as $value) {
update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

foreach ($options as $value) {
if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

header("Location: themes.php?page=functions.php&saved=true");
die;

} else if( 'reset' == $_REQUEST['action'] ) {
foreach ($options as $value) {
delete_option( $value['id'] ); }
header("Location: themes.php?page=functions.php&reset=true");
die;
}
}
add_theme_page("LightWord Settings", __('LightWord Settings','lightword'), 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_admin() {
global $themename, $themeversion, $shortname, $options;
if ( $_REQUEST['saved'] ) { echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '; _e('settings saved','lightword'); echo '.</strong></p></div>'; }
if ( $_REQUEST['reset'] ) { echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '; _e('settings reset','lightword'); echo '.</strong></p></div>'; }
?>
<div class="wrap">

<h2><?php _e('LightWord Settings','lightword') ?></h2>

<div id="poststuff" class="metabox-holder">
<div class="stuffbox">
<h3><label for="link_url"><?php _e('Support the developer','lightword'); ?></label></h3>
<div class="inside">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="5545477">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</div></div>

<div class="stuffbox">
<h3><label for="link_url"><?php _e('Theme version check','lightword'); ?> (<?php echo $themeversion; ?>)</label></h3>
<div class="inside">
<p>
<?php
$vcheck_url = "http://wp.kis.ro/lightword.txt";
define('REMOTE_VERSION', $vcheck_url);
$remoteVersion = trim(@file_get_contents(REMOTE_VERSION));
$remoteVersion = explode("||", $remoteVersion);
if (!@file_get_contents($vcheck_url)) {
_e('Version check failed.','lightword');
}else{
if(version_compare($themeversion, $remoteVersion[0], '>=')){ _e('Cool! You have the latest version.','lightword');}else{ _e('You have','lightword'); echo ": ".$themeversion."<br/>"; _e('Latest version','lightword'); echo ": <strong>".$remoteVersion[0]."</strong><br/><br/>What's new? ".$remoteVersion[1]."<br/><br/><a style=\"color:red;font-weight:700;\" href=\"http://wordpress.org/extend/themes/download/lightword.$remoteVersion[0].zip\">"; _e('Get the latest version','lightword'); echo "</a>";}
}
?>
</p>
</div></div>

<div class="stuffbox">
<h3><label for="link_url"><?php _e('General settings','lightword'); ?></label></h3>
<div class="inside">
<form method="post">
<?php foreach ($options as $value) { switch ( $value['type'] ) { case "open": ?>
<table width="100%" border="0" style="padding:10px;">
<?php break; case "close": ?>
</table><br />
<?php break; case "checkbox": ?>
<tr>
<td width="25%" rowspan="2" valign="middle"><strong style="font-size:11px;"><?php _e("".$value['name']."","lightword"); ?></strong></td>
<td width="75%"><? if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />   <small><?php _e("".$value['desc']."","lightword"); ?></small>
</td>
</tr>
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px solid #E1E1E1;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
<?php break; } } ?>
</div></div>
<p class="submit" style="margin-top:-2em;">
<input name="save" type="submit" value="<?php _e('Save changes','lightword'); ?>" class="button-primary" />
<input type="hidden" name="action" value="save" />
</p>
</form>

<div class="stuffbox">
<h3><label for="link_url"><?php _e('Search for help','lightword'); ?> (<a href="http://students.info.uaic.ro/~andrei.luca/blog/">blog</a> <?php _e('or','lightword'); ?> <a href="http://twitter.com/andreiluca">twitter</a>)</label></h3>
<div class="inside">
<?php
require_once(ABSPATH . WPINC . '/rss.php');
$rss_blog = fetch_rss('http://feeds2.feedburner.com/lightword');
if ($rss_blog) {
$items_blog = array_slice($rss_blog->items, 0, 4);
foreach( $items_blog as $item_blog ) {
$pubdate = substr($item_blog['pubdate'], 0, 16);
echo '<p><a href="'.$item_blog['guid'].'" title="'.$item_blog['title'].'">'.$item_blog['title'].'</a> / <em>'.$pubdate.'</em></p>';
}
}else {
echo "<p>";
_e('No updates available.','lightword');
echo "</p>";
}
$rss_wp = fetch_rss('http://wordpress.org/support/rss/tags/lightword');
if ($rss_wp) {
$items_wp = array_slice($rss_wp->items, 0, 1);
foreach( $items_wp as $item_wp ) {
$pubdate = substr($item_wp['pubdate'], 0, 16);
$title = explode(' "',$item_wp['title']);
$title = str_replace('"','',$title[1]);
echo '<p><a href="'.$item_wp['link'].'" title="'.$title.'">'.$title.'</a> / <em>'.$pubdate.'</em></p>';
}
}else {
echo "<p>";
_e('No updates available.','lightword');
echo "</p>";
}

?>
</div></div>

<div class="stuffbox">
<h3><label for="link_url"><?php _e('What is Cufon?','lightword'); ?> (<a href="http://cufon.shoqolate.com/generate/">website</a>)</label></h3>
<div class="inside">
<p>&sup1;Cuf&oacute;n is a Javascript Dynamic Text Replacement, like sIFR without flash plugin, just javascript.<br/>
<br/>&sup2;Extra Cuf&oacute;n contains (~<b>300kb js file</b>): Basic latin, uppercase, lowercase, numerals, punctuation, <br/>Latin-1 Supplement, Latin Extended-A, Cyrillic Alphabet, Russian Alphabet, Greek and Coptic; usefull for some accents and special characters.
<br/><br/>Korean characters are not supported (11000+ glyps is a bit too much - enormous file -> slow loading).</p>
</div></div>


<form method="post" style="float:right;">
<input name="reset" type="submit" value="<?php _e('Click here to reset all settings','lightword'); ?>" style="cursor:pointer;" />
<input type="hidden" name="action" value="reset" />
</form>
</div>
<?php
}

/*
Ping/Track/Comment Count
Source URI: http://txfx.net/code/wordpress/ping-track-comment-count/
Description: Provides functions that return or display the number of trackbacks, pingbacks, comments or combined pings recieved by a given post.
Other Authors: Mark Jaquith, Chris J. Davis, Scott "Skippy" Merrill
*/

function get_comment_type_count($type='all', $post_id = 0) {
	global $cjd_comment_count_cache, $id, $post;
	if ( !$post_id )
		$post_id = $post->ID;
	if ( !$post_id )
		return;

	if ( !isset($cjd_comment_count_cache[$post_id]) ) {
		$p = get_post($post_id);
		$p = array($p);
		update_comment_type_cache($p);
	}

	if ( $type == 'pingback' || $type == 'trackback' || $type == 'comment' )
		return $cjd_comment_count_cache[$post_id][$type];
	elseif ( $type == 'ping' )
		return $cjd_comment_count_cache[$post_id]['pingback'] + $cjd_comment_count_cache[$post_id]['trackback'];
	else
		return array_sum((array) $cjd_comment_count_cache[$post_id]);

}

function comment_type_count($type = 'all', $post_id = 0) {
		echo get_comment_type_count($type, $post_id);
}


function update_comment_type_cache(&$queried_posts) {
	global $cjd_comment_count_cache, $wpdb;

	if ( !$queried_posts )
		return $queried_posts;


	foreach ( (array) $queried_posts as $post )
		if ( !isset($cjd_comment_count_cache[$post->ID]) )
			$post_id_list[] = $post->ID;

	if ( $post_id_list ) {
		$post_id_list = implode(',', $post_id_list);

		foreach ( array('', 'pingback', 'trackback') as $type ) {
			$counts = $wpdb->get_results("SELECT ID, COUNT( comment_ID ) AS ccount
			FROM $wpdb->posts
			LEFT JOIN $wpdb->comments ON ( comment_post_ID = ID AND comment_approved = '1' AND comment_type='$type' )
			WHERE post_status = 'publish' AND ID IN ($post_id_list)
			GROUP BY ID");

			if ( $counts ) {
				if ( '' == $type )
					$type = 'comment';
				foreach ( $counts as $count )
					$cjd_comment_count_cache[$count->ID][$type] = $count->ccount;
			}
		}
	}
	return $queried_posts;
}
add_filter('the_posts', 'update_comment_type_cache');

global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}

function wp_list_pages_new(){
global $lw_show_categories;
if ($lw_show_categories == "true") {
$top_list = wp_list_categories('echo=0&depth=1&title_li=');
$top_list = str_replace(array('">','</a>','<span><a','current-cat"><a'),array('"><span>','</span></a>','<a','"><a class="s"'), $top_list);
return $top_list;
}else{
$top_list = wp_list_pages('echo=0&depth=1&title_li=');
$top_list = str_replace(array('">','</a>','<span><a','current_page_item"><a'),array('"><span>','</span></a>','<a','"><a class="s"'), $top_list);
return $top_list;
}
}

function top_header_image(){
global $lw_top_header_image;
if($lw_top_header_image == "false") {
?>
<div id="top"><h1 id="logo"><a name="top" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> <small><? bloginfo('description'); ?></small></h1></div>
<?php }else{ ?>
<div id="top" style="background:url(<?php bloginfo('template_directory'); ?>/images/header-image.png) no-repeat;"><a name="top" class="header_image" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('url'); ?>"></a></div>
<?php
}
}

function comment_tabs(){
if(is_single()||is_page()){
?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/tabs.js"></script>
<script type="text/javascript">jQuery(document).ready(function(){jQuery('tabs').tabs({linkClass : 'tabs',containerClass : 'tab-content',linkSelectedClass : 'selected',containerSelectedClass : 'selected',onComplete : function(){}});});</script>
<?php
}
}

// LOCALIZATION

load_theme_textdomain('lightword', get_template_directory() . '/lang');

// CUFON SETTINGS

if ($lw_cufon == "false") $cufon_enabled = 1; else $cufon_enabled = 0;
if ($lw_cufon_extra == "true") $cufon_extra = 1; else $cufon_extra = 0;

function cufon_header(){
global $cufon_enabled, $cufon_extra;
$cufon_header_script = "<script src=\"".get_bloginfo('template_directory')."/js/cufon.js\" type=\"text/javascript\"></script>\n<script src=\"".get_bloginfo('template_directory')."/js/mp.font.js\" type=\"text/javascript\"></script>";
if($cufon_extra == 1) $cufon_header_script = str_replace("mp.font.js", "extra_mp.font.js", $cufon_header_script);
if($cufon_enabled == 1) echo $cufon_header_script;
}

function cufon_footer(){
global $cufon_enabled;
$cufon_footer_script = "\n<script type=\"text/javascript\">/* <![CDATA[ */ Cufon.now(); /* ]]> */ </script>\n";
if($cufon_enabled == 1) echo $cufon_footer_script;
}

function nested_comments($comment, $args, $depth) { $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>"><div id="comment-<?php comment_ID(); ?>">
<div class="comment_content"><div class="comment-meta commentmetadata">
<div class="alignleft"><?php echo get_avatar($comment,$size='36'); ?></div>
<div class="alignleft" style="padding-top:5px;"><strong class="comment_author"><?php comment_author_link() ?></strong><br/><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date(__('F jS, Y','lightword')) ?></a>  <?php edit_comment_link(__('edit this comment','lightword'),'&nbsp;&nbsp;',''); ?></div><div class="clear"></div></div>

<?php comment_text() ?>
<div class="reply"><?php comment_reply_link(array_merge( $args, array('reply_text' => __('( REPLY )','lightword'), 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
<?php if ($comment->comment_approved == '0') : ?>
<span class="moderation"><?php _e('Your comment is awaiting moderation.','lightword'); ?></span><br />
<?php endif; ?>
</div><div class="clear"></div></div>
<?php
}


// ENABLE FUNCTIONS

add_action('admin_menu', 'mytheme_add_admin');
add_action('wp_head',    'cufon_header');
add_action('wp_footer',  'cufon_footer');
add_action('wp_footer',  'comment_tabs');
?>