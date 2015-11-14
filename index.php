<?php
ob_start();
require 'loop.php';
$content = ob_get_clean();
ob_end_clean();

require_partial('layout', [
	'content' => $content,
]);
