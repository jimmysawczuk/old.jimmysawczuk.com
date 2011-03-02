<div class="clear"></div>
</div>
<div id="footer">
<span class="text">
<?php
$blog_name = '<a href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a>';
printf(__('Copyright %s %s %s &middot; Powered by %s and developed by %s.', 'lightword'),'&copy;',date('Y'),$blog_name,'<a href="http://www.wordpress.org" title="Wordpress">Wordpress</a>','<a title="Andrei Luca" href="http://students.info.uaic.ro/~andrei.luca/blog/">Andrei Luca</a>');
?>
</span>
<a title="<?php _e('Go to top','lightword'); ?>" class="top" href="#top"><?php _e('Go to top','lightword'); ?> &uarr;</a>
</div>

</div>
<?php wp_footer(); ?>
</body>
</html>