# Welcome #

This is a repository for the theme that runs my blog, which is located at [jimmysawczuk.com][jimmysawczuk].

![Screenshot](http://i.imgur.com/MAYe510.jpg)

This theme was written from scratch with some inspiration from [Lightword][lightword], [Grantland][grantland], and the [New York Times][nytimes]. My aim was to create a theme that was simple, attractive and clean. I also built it with Facebook integration in mind, and specifically, to respect the [Open Graph protocol][open-graph]. It uses HTML5 and CSS3, with some jQuery, and is now mobile friendly.

## Setting up

Assets are built using [Grunt][grunt], and can be invoked using `make`:

```bash
git clone https://github.com/jimmysawczuk/jimmysawczuk.com.git
cd jimmysawczuk.com
make
```

### Repository Hooks ###

To display the current code revision in the footer, I set up this hook for `post-checkout`, using [scm-status][scm-status]:

```bash
/path/to/scm-status -out="REVISION.json";
```

Additionally, you may find it helpful to truncate the `wp-content/cache/*` directory when you update this theme (I do it in `post-receive`) to make sure all your assets get updated properly:

```bash
#!/bin/sh

echo "Performing post-receive hook";
git checkout -f;
rm -rf /path/to/wordpress/install/wp-content/cache/*;
echo "Done";
```

## Acknowledgements ###

I used all or parts of these open-source projects in this theme:

* [TimeAgo][timeago], for relative timestamps throughout the site
* [FontAwesome][font-awesome] for various icons throughout the site
* [Grunt][grunt] for asset building

The fonts I use, [**Arvo**][arvo] and [**Mako**][mako], are from the [Google Font API][google-fonts].

## License ##

	The MIT License (MIT)
	Copyright (C) 2011-2015 by Jimmy Sawczuk

	Permission is hereby granted, free of charge, to any person obtaining a copy
	of this software and associated documentation files (the "Software"), to deal
	in the Software without restriction, including without limitation the rights
	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
	copies of the Software, and to permit persons to whom the Software is
	furnished to do so, subject to the following conditions:

	The above copyright notice and this permission notice shall be included in
	all copies or substantial portions of the Software.

	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
	THE SOFTWARE.


  [jimmysawczuk]: http://jimmysawczuk.com

  [lightword]: http://wordpress.org/extend/themes/lightword
  [grantland]: http://www.grantland.com
  [nytimes]: http://www.nytimes.com
  [open-graph]: http://ogp.me

  [scm-status]: http://github.com/jimmysawczuk/scm-status

  [timeago]: http://timeago.yarp.com/
  [grunt]: http://gruntjs.com/
  [font-awesome]: http://fortawesome.github.com/Font-Awesome/
  [google-fonts]: http://code.google.com/apis/webfonts/

  [mako]: https://www.google.com/fonts/specimen/Mako
  [arvo]: https://www.google.com/fonts/specimen/Arvo
