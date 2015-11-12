<?php
/**
 * User: ln1878
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

<?php
//view.php page
$img = $imgRepo->getIMGById($_POST['id']);
//entering the html sections
?>
<style>
.lay_content {

    background-color: black;
 	font-style: oblique;
    padding: 20px;
    margin-left: 10px;
    margin-right: 10px;
    margin-top: 10px;
}
.left_side {
	margin-left: 20px;
	width: 98%;
    border:1px solid black;
}
</style>
<body background = "bg.png">
	
	<div class="lay_content">
		
<h1><font color="pink"> Update IMG</font></h1>
<br><br>
</div>
<div class="left_side">
<form method = "post" action = "edit.php">
	<input type = "hidden" name = "imgId" value = "<?php print $_POST['id'];?>">
	<br><br><br>
	<font color="black"> &nbsp;&nbsp; IMG URL: <input type = "text" name="url" style="color: black; background-color: transparent;" value = "<?php print $img->getU(); ?>"></font>
	<br><br>
	<font color="black"> &nbsp;&nbsp; Author: <input type = "text" name="author_name" style="color: black; background-color: transparent;" value = "<?php print $img->getAuthor_name(); ?>"></font>
	<br><br>
	<br>
    <?php
    /*
     * add the labels for char_count & date_dynamics below
     */

    ?>
    &nbsp;&nbsp; <input type="submit" value="Save"> &nbsp; &nbsp;
    <a href = "Index.php"><font color="pink"> Back to the home page</font> </a>
</form>
<br><br><br><br>
</div>
</body>




<?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['imgId'])): ?> 

	<?php
	//edit function


	/*
	 * shorten the private vars of img.php for local use
	 */

	//subject_line
	$imgUrl = isset($_POST['url'])?($_POST['url']):'';
	//author_name
	$imgAuthor = isset($_POST['author_name'])?($_POST['author_name']):'';
	

  	/*
  	 * validation * form fields
  	 */
  	$formIsValid = true;
	$subjectErr = '';
	$authorErr = '';

	if (empty($imgUrl)){
	$formIsValid = false;
	$subjectErr = 'Please enter the URL';
	}
	if (empty($imgAuthor)){
	$formIsValid = false;
	$authorErr = 'Please enter the author name';

	}

	?>


<?php if ($formIsValid): ?>
	<?php
	// process valid data and save img update
	$aIMG = $imgRepo->getIMGById($_POST['imgId']);
	
	$aIMG->setU($imgUrl);
	$aIMG->setAuthor_name($imgAuthor);
	


	//save obj by calling saveIMG func
	$imgRepo->saveIMG($aIMG);
	?>
 
 	<!DOCTYPE html>
 	<html lang="en">
 	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
		<title> Web Editor</title>
		
	</head>
	<body>
		<div style="text-align: center;">

		<br><br><br>

		<h1><font color = "black"> - IMG updated - </font></h1>

		<br><br><br>
		<p><a href = "Index.php"><font color = "yellow"> Back to the img dashboard</font></a></p>
		<br><br>
	</div>
	</body>
 	</html>


<?php else: ?>

	<!DOCTYPE html>
 	<html lang="en">
 	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
		<title> Web Editor</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css" title="Style">
	</head>
	<body background = "yellow">
		
			<br><br><br> &nbsp;&nbsp;&nbsp; 
		<h1><font color="black"> &nbsp;&nbsp;&nbsp; Some parts are missing ~ </font></h1>
		<br><br>
		<div class="left_side">
		<form action="edit.php" method = "post">
			<br><br><br>
			<input type = "hidden" name = "imgId" value = "<?php print $_POST['imgId'];?>">
			&nbsp;&nbsp;&nbsp; <label><font color = "red">* </font> 
			IMG URL : <input type = "text" name="url" style="color: blue; background-color: transparent;" value ="<?php print $imgUrl ?>">
			</label><font color = red> &nbsp; <?php print $subjectErr; ?> </font>
			<br><br>
			&nbsp;&nbsp;&nbsp;<label><font color = "red">* </font> 
			Author name : <input type = "text" name="author_name" style="color: blue; background-color: transparent;" value ="<?php print $imgAuthor; ?>">
			</label><font color = "red"> &nbsp; <?php print $authorErr; ?> </font>
			<br><br>
    		
			<br><br>

			
			&nbsp;&nbsp;&nbsp;
    		<input type = "submit" value = "Save"> <a href="Index.php"><font color="yellow"> &nbsp;&nbsp;&nbsp; Back Home </font></a>
		<br><br><br><br><br><br><br><br>
	</div>
  		</form>
  	</body>
  	</html>

  <?php endif; ?>

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







