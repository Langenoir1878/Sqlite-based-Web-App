<?php
/**
 * User: ln1878
 * Updated Nov 8, 2015
 * Date: 11/02/2015
 * Time: 17:24:18 pm
 * @ PS 3001-718 
 * Chicago
 */

namespace langenoir1878;

require_once 'IMG.php';
//require_once 'FileIMGRepository.php';
require_once 'SqliteIMGRepository.php';

session_start();
if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit;
}

//$imgRepo = new \langenoir1878\FileIMGRepository();
$imgRepo = new \langenoir1878\SqliteIMGRepository();

?>

<?php if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['id'])): ?>

<?php $imgRepo->deleteIMG($_POST['id']); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
	<title> Delete IMG</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css" title="Style">
</head>
<body>
	<div style="text-align: center"><br><br>
	<h1>IMG swallowed...</h1>
	<br>
	<img src = "hahaDino.png" width="570" height="300">
	<p><a href = "Index.php"> HEE HEE ! Go back and fetch me more ~ </a></p>
</body>
</html>



<?php else: ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
	<title> En? </title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css" title="Style">
</head>
<body>
	<div style="text-align: center">
		<br><br>
	<h1>No IMG Selected</h1>
	<br>
	<img src = "no_dino.png">
	<br><br>
	<p><a href = "Index.php"> Back to the IMG Dashboard </a></p>
</body>
</html>

<?php endif; ?>












