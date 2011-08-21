# Welcome #

This is a repository for the theme that runs my blog, which is located at [www.jimmysawczuk.com][1]. 

## Original ##

The theme currently in the `lightword` branch is only slightly modified from an older version of [Andrei Luca's][2] [LightWord][3]. It has served me well for two years, however, I feel it's time for a change.

## In use ##

The theme in use now was written from scratch with some inspiration from [`lightword`][3], [Grantland][6], and the [New York Times][7]. My aim was to create a theme that was simple, attractive and clean. I also built it with Facebook integration in mind, and specifically, to respect the [Open Graph protocol][8]. It uses HTML5 and CSS3, with some jQuery.

### Repository Hooks ###

Using the method from [this answer on Stack Overflow][12], I use the following hook in order to display the revision information in the site footer:

	[hooks]
	post-update = hg id -n -i -b > REVISION

### Acknowledgements ###

I used all or parts of these open-source projects in this theme:

* [TimeAgo][9], for the relative timestamps on the BitBucket widget
* [Minify][10], for the on-the-fly minification of my CSS and JS. There are a couple modifications to this Minify installation. Most notably, [this workaround][13] that enables Minify to run in a subdirectory of the document root. Also, it's configured to use group loading rather than file loading, check `min/groupsConfig.php` for the configuration.
* [Google Font API][11], for the gorgeous fonts, namely: **Arvo** and **Mako**

## License ##

The code in `lightword` is protected under the [GPL license][4], as it is a very slight deviation on the Lightword theme. The `default` and `production` branches are protected under the [MIT License][5], which is repeated below:

	The MIT License (MIT)
	Copyright (C) 2011 by Jimmy Sawczuk

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


  [1]: http://www.jimmysawczuk.com
  [2]: http://wordpress.org/extend/themes/profile/andreiluca
  [3]: http://wordpress.org/extend/themes/lightword
  [4]: http://www.opensource.org/licenses/gpl-license.php
  [5]: http://www.opensource.org/licenses/mit-license.php
  [6]: http://www.grantland.com
  [7]: http://www.nytimes.com
  [8]: http://ogp.me
  [9]: http://timeago.yarp.com/
  [10]: http://code.google.com/p/minify/
  [11]: http://code.google.com/apis/webfonts/
  [12]: http://stackoverflow.com/questions/6005751/how-to-display-current-working-copy-version-of-an-hg-repository-on-a-php-page
  [13]: http://code.google.com/p/minify/wiki/AlternateFileLayouts