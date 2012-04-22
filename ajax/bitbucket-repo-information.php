<?

require '../includes/utility.php';
require '../includes/bitbucket.php';

$repo = $_GET['repo'];
$repo = Bitbucket::Request("/repositories/".$repo);

$class = $_GET['class'];

header("Content-type: application/json");

echo json_encode(array(
	'repo' => $repo,
	'class' => $class
));