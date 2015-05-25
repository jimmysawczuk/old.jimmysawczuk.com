module.exports = function(grunt)
{

	grunt.initConfig({
		concat: {
			jquery: {
				src: [
					'bower_components/jquery/jquery.js',
					'bower_components/jquery-timeago/jquery.timeago.js',
				],
				dest: 'js/bin/jquery.js'
			},

			components: {
				src: [
					'js/src/search.js',
					'js/src/bitbucket.js',
					'js/src/github.js',
					'js/src/goodreads.js',
					'js/src/twitter.js',
					'js/src/hearts.js',
					'js/src/styling.js',
					'js/src/comments.js',
				],
				dest: 'js/bin/components.js'
			},

			ballpark_resume: {
				src: [
					'js/src/ballpark_resume.js',
				],
				dest: 'js/bin/ballpark_resume.js'
			},

			projects: {
				src: [
					'js/src/projects.js',
				],
				dest: 'js/bin/projects.js'
			}
		},

		uglify: {
			jquery: {
				src: ['js/bin/jquery.js'],
				dest: 'js/bin/jquery.min.js'
			},

			components: {
				src: ['js/bin/components.js'],
				dest: 'js/bin/components.min.js'
			},

			ballpark_resume: {
				src: ['js/bin/ballpark_resume.js'],
				dest: 'js/bin/ballpark_resume.min.js'
			},

			projects: {
				src: ['js/bin/projects.js'],
				dest: 'js/bin/projects.min.js'
			},

			less: {
				src: ['node_modules/less/dist/less.js'],
				dest: 'js/bin/less.min.js'
			}
		},

		less: {
			style: {
				src: ['less/style.less'],
				dest: 'css/style.css',
			}
		},

		cssmin: {
			style: {
				src: ['css/style.css'],
				dest: 'css/style.min.css'
			}
		},

		watch: {
			js: {
				tasks: ['concat'],
				files: ["js/src/**/*.js"]
			},

			less: {
				tasks: ['less', 'cssmin'],
				files: ["less/**/*.less"]
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('default', ['less', 'cssmin', 'concat', 'uglify']);
};
