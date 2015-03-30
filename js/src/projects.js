var Projects = (function()
{
	var projects = [];

	var GithubConfig = {
		BaseURL: 'https://api.github.com',
		AccessToken: null
	};

	var BitbucketConfig = {
		BaseURL: 'https://api.bitbucket.org/1.0'
	};

	function render()
	{
		var i = 0;
		$('#projects .project').each(function(idx, project)
		{
			if ($(project).data('github'))
			{
				var repo = $(project).data('github');

				var params = {};
				if (GithubConfig.AccessToken !== null)
				{
					params.access_token = GithubConfig.AccessToken;
				}

				$.ajax(GithubConfig.BaseURL + '/repos/' + repo, {
					type: 'GET',
					data: params,
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

				$.ajax(BitbucketConfig.BaseURL + '/repositories/' + repo, {
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
		if (typeof opts.github_access_token != "undefined")
		{
			GithubConfig.AccessToken = opts.github_access_token;
		}

		render();
	}

	var public_functions = {
		init: init
	};

	return public_functions;
})();