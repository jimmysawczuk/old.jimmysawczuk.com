<?

require '../includes/utility.php';
require '../includes/github.php';

$repo = $_GET['repo'];
$repo = Github::Request("repos/".$repo);

$class = $_GET['class'];

header("Content-type: application/json");

echo json_encode(array(
	'repo' => $repo,
	'class' => $class
));