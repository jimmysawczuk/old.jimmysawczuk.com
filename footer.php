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
			Theme <a href="http://code.jimmysawczuk.com/blog-wordpress-theme">open-sourced under the MIT license</a>
			&middot;
			Special thanks to <a href="http://timeago.yarp.com/">TimeAgo</a>, <a href="http://code.google.com/p/minify/">Minify</a>, <a href="http://code.google.com/apis/webfonts/">Google Font API</a>
		</div>
		
		<div id="fb-root"></div>
		<script src="//connect.facebook.net/en_US/all.js#appId=193404464015012&amp;xfbml=1" charset="utf-8"></script>
		<script type="text/javascript" src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		<script type="text/javascript" src="<?=get_min_url('js', true); ?>" charset="utf-8"></script>
		<script type="text/javascript">
			var stylesheet_directory = '<? bloginfo("stylesheet_directory"); ?>';
		
			$(document).ready(function()
			{
				is_single = <?=is_single()? 'true' : 'false' ?>;
				is_page = <?=is_page()? 'true' : 'false' ?>;
				
				if (is_single && !is_page)
				{
					(function() {
						$(document).scroll(function()
						{
							$('.post .post_info').stop();
							
							if (window.scrollY > $('#comments').position().top)
							{
								height = $('#comments').position().top;
							}
							else if (window.scrollY > 210)
							{
								height = (window.scrollY - 200) + 'px';
							}
							else
							{
								height = '0px';
							}
							
							$('.post .post_info').animate({'top': height}, 300);
						});
					})();
				}
				
				Search.init();
				
				BitBucket.load('#bitbucket_events', function()
				{
					$("#bitbucket_events .timeago").timeago();
				});
				
				$('.widget_links').each(function(idx, linkset)
				{
					id = $(linkset).attr('id');
					
					even = false;
					$('#' + id + ' ul li').each(function(idx, link)
					{
						if (!even)
						{
							$(link).addClass('odd');
						}
						else
						{
							$(link).addClass('even');
						}
						even = !even;
					});
				});
			});
		</script>
		<? wp_footer(); ?>
	</body>
</html>
