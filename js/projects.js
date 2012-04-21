var Projects = (function()
{
	var projects = [];

	function render()
	{
		var i = 0;
		$.each(projects, function(idx, project)
		{
			project_id = project.name
							.replace(/\s+/g, '_')
							.replace(/\W+/g, '_')
							.replace(/_+/g, '-')
							.toLowerCase();

			projects[idx] = project_id;

			var div = $('<div />')
							.addClass('project')
							.addClass('project-' + project_id)
							.attr('data-project-id', project_id)

			var container = $('<div />').addClass('container');

			container.append($('<h2 />').html(project.name));
			container.append($('<h3 />').html(htmlEntities(project.description)));

			if (typeof project.screenshots !== "undefined")
			{
				$.each(project.screenshots, function(idx, ss)
				{
					container.append($('<img />').attr(ss).addClass('screenshot'));
				});
			}

			var ul = $('<ul />');
			var updated_on = false;
			if (typeof project.github !== "undefined")
			{
				ul.append($('<li />')
					.addClass('github')
					.html('GitHub: ').append($('<a />')
						.attr({href: 'http://github.com' + project.github})
						.html(project.github)));
			}

			if (typeof project.download !== "undefined")
			{
				ul.append($('<li />')
					.addClass('download')
					.append($('<a />')
						.attr({href: project.download})
						.html("Download")));
			}

			if (typeof project.web !== "undefined")
			{
				ul.append($('<li />')
					.addClass('web')
					.append($('<a />')
						.attr({href: project.web})
						.html("Web")));
			}

			container.append(ul);

			var meta = $('<div />').addClass('meta');

			if (typeof project.tags !== "undefined")
			{
				var tags = $('<div />').addClass('tags');
				$.each(project.tags, function(idx, tag)
				{
					tags.append($('<span />').addClass('tag').html(tag)).append("\n");
				});
				meta.append(tags);
			}

			container.append(meta);

			div.append(container);			

			$('#projects .col-' + (i % 3)).append(div);
			i++;

			if (typeof project.github !== "undefined")
			{
				$.get(Config.stylesheet_directory + '/ajax/github-repo-information.php', 
					{ repo: project.github, class: project_id }, function(response)
				{
					var meta = $('#projects .project-' + response.class).find('.meta');

					meta.prepend($('<div />')
							.addClass('times')
							.append($('<span />')
								.addClass('created_on')
								.html('Created ')
								.append($('<span />')
									.attr({title: response.repo.created_at })
									.addClass('timeago')
								))
							.append("\n" + '&middot;' + "\n")
							.append($('<span />')
								.addClass('updated_on')
								.html('Updated ')
								.append($('<span />')
									.attr({title: response.repo.pushed_at })
									.addClass('timeago')
								))
						);

					if (typeof $.timeago === "function")
					{
						meta.find('.timeago').timeago();	
					}
				}, 'json');
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
		projects = opts.projects;

		render();
	}

	var public_functions = {
		init: init
	};

	return public_functions;
})();