<?php

$ballparks = array();

$ballparks []= array(
	'name' => "Progressive Field",
	'team' => "Cleveland Indians",
	'alt_name' => "Jacobs Field",
	'rating' => '9',
	'num_visits' => '50+',
	'visit' => "1995-08-02",
	'game' => "http://www.baseball-reference.com/boxes/CLE/CLE199508020.shtml",
	'article' => "http://www.jimmysawczuk.com/2008/04/my-inaugural-visit-to-progressive-field.html",
	'img' => 'progressive_field.jpg',
);

$ballparks []= array(
	'name' => "Fenway Park",
	'team' => "Boston Red Sox",
	'rating' => '9',
	'num_visits' => '1',
	'visit' => "2003-06-24",
	'game' => "http://www.baseball-reference.com/boxes/BOS/BOS200306240.shtml",
	'img' => "fenway_park.jpg",
	'img_credit' => "http://www.flickr.com/photos/apollo13ma/2338849933/",
);

$ballparks []= array(
	'name' => "Wrigley Field",
	'team' => "Chicago Cubs",
	'rating' => '7',
	'num_visits' => '1',
	'visit' => "2007-07-20",
	'game' => "http://www.baseball-reference.com/boxes/CHN/CHN200707200.shtml",
	'img' => "wrigley_field.jpg",
	'img_credit' => "http://www.flickr.com/photos/oxalis37/2766004119/",
);

$ballparks []= array(
	'name' => "Great American Ballpark",
	'team' => "Cincinatti Reds",
	'rating' => '6',
	'num_visits' => '1',
	'visit' => "2008-05-18",
	'game' => "http://www.baseball-reference.com/boxes/CIN/CIN200805180.shtml",
	'article' => "http://www.jimmysawczuk.com/2008/05/here-i-dreamt-i-was-an-architect.html",
	'img' => "great_american_ballpark.jpg",
);

$ballparks []= array(
	'name' => "Shea Stadium",
	'team' => "New York Mets",
	'rating' => '6',
	'num_visits' => '1',
	'visit' => "2008-07-27",
	'game' => "http://www.baseball-reference.com/boxes/NYN/NYN200807270.shtml",
	'article' => "http://www.jimmysawczuk.com/2008/07/the-stadiums-in-new-york.html",
	'img' => 'shea_stadium.jpg',
);

$ballparks []= array(
	'name' => "Yankee Stadium",
	'alt_name' => "Old Yankee Stadium",
	'team' => "New York Yankees",
	'rating' => '10',
	'num_visits' => '1',
	'visit' => "2008-07-28",
	'game' => "http://www.baseball-reference.com/boxes/NYA/NYA200807280.shtml",
	'article' => "http://www.jimmysawczuk.com/2008/07/the-stadiums-in-new-york.html",
	'img' => "yankee_stadium.jpg",
);

$ballparks []= array(
	'name' => "Camden Yards",
	'team' => "Baltimore Orioles",
	'rating' => '8',
	'num_visits' => '1',
	'visit' => "2009-05-12",
	'game' => "http://www.baseball-reference.com/boxes/BAL/BAL200905120.shtml",
	'article' => "http://www.jimmysawczuk.com/2009/05/the-park-that-started-it-all.html",
	'img' => "camden_yards.jpg",
);

$ballparks []= array(
	'name' => "PNC Park",
	'team' => "Pittsburgh Pirates",
	'rating' => '9',
	'num_visits' => '1',
	'visit' => "2010-05-31",
	'game' => "http://www.baseball-reference.com/boxes/PIT/PIT201005310.shtml",
	'article' => "http://www.jimmysawczuk.com/2010/06/the-best-ballpark-in-america.html",
	'img' => "pnc_park.jpg",
);

$ballparks []= array(
	'name' => "Nationals Park",
	'team' => "Washington Nationals",
	'rating' => '8',
	'num_visits' => "1",
	'visit' => "2011-07-03",
	'game' => "http://www.baseball-reference.com/boxes/WAS/WAS201107030.shtml",
	'article' => "http://www.jimmysawczuk.com/2011/07/oer-the-land-of-the-free-and-the-home-of-the-brave.html",
	'img' => "nationals_park.jpg",
);

$ballparks []= array(
	'name' => "Target Field",
	'team' => "Minnesota Twins",
	'rating' => '9',
	'num_visits' => "3",
	'visit' => "2011-09-16",
	'game' => "http://www.baseball-reference.com/boxes/MIN/MIN201109160.shtml",
	'article' => "http://www.jimmysawczuk.com/2011/09/baseball-in-the-twin-cities.html",
	'img' => "target_field.jpg",
);

$ballparks []= array(
	'name' => "Comerica Park",
	'team' => "Detroit Tigers",
	'rating' => '9',
	'num_visits' => "1",
	'visit' => "2012-05-18",
	'game' => "http://www.baseball-reference.com/boxes/DET/DET201205180.shtml",
	'article' => "http://www.jimmysawczuk.com/2012/05/two-outs-away.html",
	'img' => "comerica_park.jpg",
);

$ballparks []= array(
	'name' => "Rogers Centre",
	'alt_name' => "SkyDome",
	'team' => "Toronto Blue Jays",
	'rating' => '5',
	'num_visits' => "1",
	'visit' => "2012-05-19",
	'game' => "http://www.baseball-reference.com/boxes/TOR/TOR201205190.shtml",
	'article' => "",
	'img' => "rogers_centre.jpg"
);

//////////////////////////////////////

$i = 0;
$cols = array();
foreach ($ballparks as &$ballpark)
{
	$ballpark['full_img'] = get_bloginfo('stylesheet_directory') . '/images/ballparks/' . $ballpark['img'];
	$ballpark['visit'] = strtotime($ballpark['visit']);

	$col = $i++ % 2;

	$cols[$col] []= $ballpark;
}
unset($ballpark);

return array($ballparks, $cols);