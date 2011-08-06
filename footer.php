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
		<script src="http://connect.facebook.net/en_US/all.js#appId=169228513149223&amp;xfbml=1" charset="utf-8"></script>
		<script type="text/javascript" src="http://platform.twitter.com/widgets.js" charset="utf-8"></script>
		<script type="text/javascript">
			$(document).ready(function()
			{
				/*
				$('#header h1 a').mouseover(function()
				{
					$(this).animate({color: '#369'}, 1000);
				}).mouseout(function()
				{
					$(this).animate({color: '#333'}, 1000);
				});
				*/
			});
		</script>
		<? wp_footer(); ?>
	</body>
</html>
