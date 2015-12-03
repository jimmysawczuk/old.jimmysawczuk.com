<?php
/*
Template Name: Contact
*/
define('PAGE_TEMPLATE', 'contact');
define('HIDE_SIDEBAR', true);
get_header();
?>
<div id="about_me_container">
	<div class="container">
		<div class="mobile-img">
			<img src="<?=get_bloginfo('stylesheet_directory') . '/images/about_jimmy_widescreen.jpg'; ?>" alt="Hey! My name is Jimmy." />
		</div>

		<div class="bio">
			<div class="padding">
				<h2>Hey! My name is Jimmy.</h2>
				<p>I'm a native Clevelander from Perry, Ohio. After graduating from <a href="http://www.case.edu">Case Western Reserve University</a> with a degree in Computer Science in 2009, I moved to Columbia, South Carolina and started work at <a href="http://www.louddoor.com">LoudDoor</a>, and I've been there ever since. I like to work on <a href="/projects">side projects</a>, and I'm on a mission to see <a href="/ballparks">every Major League Baseball stadium on the planet</a>. I'm a diehard Indians, Steelers and Buckeyes fan, and I play tennis, ping pong, racquetball and disc golf. I also love skiing and running.</p>
				<p>If you’re looking for my resume, it's available as <a href="http://jimmysawczuk.com/resume">a printable web page</a>. References available upon request.</p>
			</div>
		</div>

		<div class="contact_info">
			<ul>
				<li class="first">
					<i class="fa fa-envelope-o fa-fw"></i>
					hello@jimmysawczuk.com
				</li>
				<li>
					<i class="fa fa-phone fa-fw"></i>
					(440) 796-7806
				</li>
				<li>
					<i class="fa fa-comment-o fa-fw"></i>
					XMPP: me@jimmysawczuk.com
				</li>
				<li>&nbsp;</li>
				<li>
					<i class="fa fa-facebook fa-fw"></i>
					<a href="http://www.facebook.com/JimmySawczuk" target="_blank">Facebook</a>
				</li>
				<li>
					<i class="fa fa-twitter fa-fw"></i>
					<a href="http://www.twitter.com/JimmySawczuk" target="_blank">Twitter</a>
				</li>
				<li>
					<i class="fa fa-instagram fa-fw"></i>
					<a href="http://www.instagram.com/jimmysawczuk" target="_blank">Instagram</a>
				</li>
				<li>
					<i class="fa fa-linkedin fa-fw"></i>
					<a href="http://www.linkedin.com/in/jimmysawczuk" target="_blank">LinkedIn</a>
				</li>
				<li>
					<i class="fa fa-google-plus-square fa-fw"></i>
					<a href="https://plus.google.com/+JimmySawczuk" target="_blank">Google+</a>
				</li>
				<li>
					<i class="fa fa-github fa-fw"></i>
					<a href="http://www.github.com/JimmySawczuk" target="_blank">GitHub</a>
				</li>
				<li>
					<i class="fa fa-bitbucket fa-fw"></i>
					<a href="http://bitbucket.org/JimmySawczuk" target="_blank">Bitbucket</a>
				</li>
				<li>
					<i class="fa fa-stack-overflow fa-fw"></i>
					<a href="http://stackoverflow.com/users/350278" target="_blank">Stack Overflow</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<?
get_footer();
