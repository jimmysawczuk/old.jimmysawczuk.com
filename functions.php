<?php

register_sidebars(1, array('name' => 'Right sidebar'));

require('includes/aboutme_widget.php');
require('includes/likebox_widget.php');

function pluralize($num, $sing, $plu)
{
	if ($num == 1)
	{
		return $sing;
	}
	else
	{
		return $plu;
	}
}
