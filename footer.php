				</div>
				<? if (!defined('HIDE_SIDEBAR') || !HIDE_SIDEBAR): ?>
					<div id="sidebar">
						<? dynamic_sidebar(1); ?>
					</div>
				<? endif; ?>
				<div id="footer">
				
				</div>
			</div>
		</div>
		<div id="copyright">
			&copy; 2008-<?=date("Y"); ?> Jimmy Sawczuk 
			&middot; 
			<a href="http://github.com/jimmysawczuk/jimmysawczuk.com">Open source</a>; MIT License
			&middot;
			<?
			$fmt = '<a href="http://github.com/jimmysawczuk/jimmysawczuk.com/commit/%R" title="Branch: %b">%r</a>; <span class="timeago" title="%d"></span> &middot;';
			echo GitRevision::format($fmt);
			?>
			Special thanks to <a href="http://timeago.yarp.com/">TimeAgo</a>, <a href="http://code.google.com/p/minify/">Minify</a>, <a href="http://code.google.com/apis/webfonts/">Google Font API</a>
		</div>
		
		<div id="fb-root"></div>
		<script type="text/javascript">
			window.fbAsyncInit = function() {
				FB.init({
					appId: '193404464015012',
					xfbml: true,
					channelUrl: Config.stylesheet_directory + '/channel.html'
				});
			};
			(function() {
				var e = document.createElement('script'); e.async = true;
				e.src = document.location.protocol +
					'//connect.facebook.net/en_US/all.js';
				document.getElementById('fb-root').appendChild(e);
			}());
		</script>
		<script type="text/javascript" src="<?=get_min_url('js', true); ?>" charset="utf-8"></script>
		<? wp_footer(); ?>
	</body>
</html>
