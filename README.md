# Welcome #

This is a repository for the theme that runs my blog, which is located at [jimmysawczuk.com][1].

![Screenshot](http://i.imgur.com/MAYe510.jpg)

This theme was written from scratch with some inspiration from [`lightword`][3], [Grantland][6], and the [New York Times][7]. My aim was to create a theme that was simple, attractive and clean. I also built it with Facebook integration in mind, and specifically, to respect the [Open Graph protocol][8]. It uses HTML5 and CSS3, with some jQuery, and is now mobile friendly.

## Setting up

Assets are built using [Grunt][17], and can be invoked using `make`:

```bash
git clone https://github.com/jimmysawczuk/jimmysawczuk.com.git
cd jimmysawczuk.com
make
```

### Repository Hooks ###

To display the current code revision in the footer, I set up this hook for `post-checkout`, using [scm-status][16]:

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

* [TimeAgo][9], for relative timestamps throughout the site
* [FontAwesome][15] for various icons throughout the site
* [Grunt][17] for asset building

Special thanks also to the [Google Font API][11], for the gorgeous fonts, namely **Arvo** and **Mako**, as well as the [Google Maps API][14] which isn't open source per se, but is still appreciated.

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


  [1]: http://jimmysawczuk.com
  [3]: http://wordpress.org/extend/themes/lightword
  [6]: http://www.grantland.com
  [7]: http://www.nytimes.com
  [8]: http://ogp.me
  [9]: http://timeago.yarp.com/
  [11]: http://code.google.com/apis/webfonts/
  [13]: http://code.google.com/p/minify/wiki/AlternateFileLayouts
  [14]: https://developers.google.com/maps/
  [15]: http://fortawesome.github.com/Font-Awesome/
  [16]: http://github.com/jimmysawczuk/scm-status
  [17]: http://gruntjs.com/
