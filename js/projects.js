var Projects = (function()
{
	var projects = [];
	var GITHUB_BASE = 'https://api.github.com';
	var BITBUCKET_BASE = 'https://api.bitbucket.org/1.0';

	function render()
	{
		var i = 0;
		$('#projects .project').each(function(idx, project)
		{
			if ($(project).data('github'))
			{
				var repo = $(project).data('github');

				$.ajax(GITHUB_BASE + '/repos/' + repo, {
					type: 'GET',
					dataType: 'jsonp',
					success: function(response)
					{
						if (response.data)
						{
							var meta = $(project).find('.meta');

							meta.prepend($('<div />')
									.addClass('times')
									.append($('<span />')
										.addClass('created_on')
										.html('Created ')
										.append($('<span />')
											.attr({title: response.data.created_at })
											.addClass('timeago')
										))
									.append("\n" + '&middot;' + "\n")
									.append($('<span />')
										.addClass('updated_on')
										.html('Updated ')
										.append($('<span />')
											.attr({title: response.data.pushed_at })
											.addClass('timeago')
										))
								);

							if (typeof $.timeago === "function")
							{
								meta.find('.timeago').timeago();
							}
						}
					}
				});
			}
			else if ($(project).data('bitbucket'))
			{
				var repo = $(project).data('bitbucket');

				$.ajax(BITBUCKET_BASE + '/repositories/' + repo, {
					type: 'GET',
					dataType: 'jsonp',
					success: function(response)
					{
						var meta = $(project).find('.meta');

						meta.prepend($('<div />')
								.addClass('times')
								.append($('<span />')
									.addClass('created_on')
									.html('Created ')
									.append($('<span />')
										.attr({title: response.utc_created_on })
										.addClass('timeago')
									))
								.append("\n" + '&middot;' + "\n")
								.append($('<span />')
									.addClass('updated_on')
									.html('Updated ')
									.append($('<span />')
										.attr({title: response.utc_last_updated })
										.addClass('timeago')
									))
							);

						if (typeof $.timeago === "function")
						{
							meta.find('.timeago').timeago();
						}
					}
				});
			}
		});
	}

	// via http://css-tricks.com/snippets/javascript/htmlentities-for-javascript/
	function htmlEntities(str)
	{
		return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
	}

	function init(opts)
	{
		render();
	}

	var public_functions = {
		init: init
	};

	return public_functions;
})();