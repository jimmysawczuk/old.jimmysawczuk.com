(function($)
{
	$('.post').on('click', '.post_info .post_hearts .toggle_heart', function()
	{
		var $post_hearts = $(this).parents('.post_hearts');

		$post_hearts.toggleClass('hearted');
		$post_hearts.find('.big').html($post_hearts.hasClass('hearted')? "101" : "100");
	});
})(jQuery);
