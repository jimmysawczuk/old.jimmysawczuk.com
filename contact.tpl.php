<?php
/*
Template Name: Contact
*/
define('PAGE_TEMPLATE', 'contact');
define('HIDE_SIDEBAR', true);
get_header();
?>

<div id="big_image_container">
	<div id="big_image_padding">
		<div id="right_box">
			<h1>My name is Jimmy Sawczuk.</h1>
			<p>I'm a 2009 graduate of <a href="http://www.case.edu">Case Western Reserve University</a>, with a degree in Computer Science. Even though I'm a <a href="http://www.louddoor.com">web developer by day</a>, I <a href="http://code.jimmysawczuk.com">code on the side</a> and <a href="http://stackoverflow.com/users/350278/jimmy-sawczuk">troll around on Stack Overflow</a> regularly. I'm a diehard Indians fan, a respectable tennis player, and an "enthusiastic" disc golf player. If you’re looking for my resume, it's available as <a href="http://www.jimmysawczuk.com/resume">a printable web page</a>. References available upon request.</p>
		</div>
	
		<div id="left_box"> 
			<ul id="contact_info"> 
				<li class="first">
					<img src="<? bloginfo('stylesheet_directory') ?>/images/email.png" alt="E-mail" />
					me@jimmysawczuk.com
				</li> 
				<li>
					<img src="<? bloginfo('stylesheet_directory') ?>/images/phone.png" alt="Phone" />
					(440) 796-7806
				</li> 
				<li>
					<img src="<? bloginfo('stylesheet_directory') ?>/images/aim.png" alt="AIM" />
					JimmySawczuk
				</li>
				<li>
					<img src="<? bloginfo('stylesheet_directory') ?>/images/gtalk.png" alt="Google Talk" />
					me@jimmysawczuk.com
				</li> 
				<li>
					<img src="<? bloginfo('stylesheet_directory') ?>/images/facebook.jpg" alt="Facebook" />
					<a href="http://www.facebook.com/JimmySawczuk" target="_blank">Facebook</a>
				</li>
				<li>
					<img src="<? bloginfo('stylesheet_directory') ?>/images/linkedin.jpg" alt="LinkedIn" />
					<a href="http://www.linkedin.com/in/jimmysawczuk" target="_blank">LinkedIn</a>
				</li>		
				<li>
					<img src="<? bloginfo('stylesheet_directory') ?>/images/twitter.gif" alt="Twitter" />
					<a href="http://www.twitter.com/JimmySawczuk" target="_blank">Twitter</a>
				</li> 
				<li>
					<img src="<? bloginfo('stylesheet_directory') ?>/images/lastfm.jpg" alt="Last.fm" />
					<a href="http://www.last.fm/user/sniper506th" target="_blank">Last.fm</a>
				</li>
				<li>
					<img src="<? bloginfo('stylesheet_directory') ?>/images/shelfari.gif" alt="Shelfari" />
					<a href="http://www.shelfari.com/jimmysawczuk" target="_blank">Shelfari</a>
				</li>
			</ul>
		
			<p>		
				<a href="http://stackoverflow.com/users/350278/jimmy-sawczuk"><br /> 
					<img src="http://stackoverflow.com/users/flair/350278.png" width="208" height="58" alt="profile for JimmySawczuk at Stack Overflow, Q&#038;A for professional and enthusiast programmers" title="profile for JimmySawczuk at Stack Overflow, Q&#038;A for professional and enthusiast programmers" /><br /> 
				</a>
			</p>
		</div>
	</div>
</div> 

<?
get_footer();
