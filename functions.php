<?php

register_sidebars(1, array('name' => 'Right sidebar'));

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
