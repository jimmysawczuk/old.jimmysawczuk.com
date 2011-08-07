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
			&copy; 2008-<?=date("Y"); ?> Jimmy Sawczuk &middot; Theme <a href="http://code.jimmysawczuk.com/blog-wordpress-theme">open-sourced under the MIT license</a>
		</div>
		
		<div id="fb-root"></div>
		<script src="//connect.facebook.net/en_US/all.js#appId=169228513149223&amp;xfbml=1" charset="utf-8"></script>
		<script type="text/javascript" src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		<script type="text/javascript" src="<? bloginfo('stylesheet_directory'); ?>/js/search.js" charset="utf-8"></script>
		<script type="text/javascript" src="<? bloginfo('stylesheet_directory'); ?>/js/timeago.js" charset="utf-8"></script>
		<script type="text/javascript">
			$(document).ready(function()
			{
				<? /*
				$('#header h1 a').mouseover(function()
				{
					$(this).animate({color: '#369'}, 1000);
				}).mouseout(function()
				{
					$(this).animate({color: '#333'}, 1000);
				});
				*/ ?>
				
				is_single = <?=is_single()? 'true' : 'false' ?>;
				is_page = <?=is_page()? 'true' : 'false' ?>;
				
				if (is_single && !is_page)
				{
					(function() {
						$(document).scroll(function()
						{
							if (window.scrollY > 210)
							{
								$('.post .post_info').css({'top': (window.scrollY - 200) + 'px'});
							}
							else
							{
								$('.post .post_info').css({'top': '0px'});
							}
						});
					})();
				}
				
				Search.init();
				
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
				
				$(".timeago").timeago();
			});
		</script>
		<? wp_footer(); ?>
	</body>
</html>
